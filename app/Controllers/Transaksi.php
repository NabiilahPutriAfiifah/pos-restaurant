<?php 

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\PelangganModel;
use App\Models\PembelianModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Transaksi extends BaseController{

    protected $data;
    protected $dataArray;

    protected $menu_model;
    protected $customer_model;
    protected $buying_model;
    protected $transaksi_model;
    protected $detail_transac_model;

    public function __construct(){

        $this->menu_model = New MenuModel();
        $this->customer_model = New PelangganModel();
        $this->buying_model = New PembelianModel();
        $this->transaksi_model = New TransaksiModel();
        $this->detail_transac_model = New DetailTransaksiModel();
    }

    public function index(){

        $this->data['title'] = "Transaksi";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Transaksi'
            )
        );

        $this->data['menu']    = $this->menu_model->select('id, nama_menu, kode_menu')->get()->getResult();
        $this->data['pelanggan'] = $this->customer_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['transaksi'] = $this->buying_model->select('*, (menu.harga * jumlah) As Total')->join('menu', 'menu.id = transaksi.menu_id')
                                                      ->join('pelanggan', 'pelanggan.id = transaksi.customer_id')
                                                      ->get()->getResult();

        $this->data['total'] = 0;
        foreach ($this->data['transaksi'] as $buy) {
            $this->data['total'] += $buy->Total;
        }
        
        return view('transaksi/index', $this->data);
    }

    public function addMenu(){

        $id_menu     = $this->request->getVar('menu');
        $id_pelanggan   = $this->request->getVar('pelanggan');
        $jumlah         = $this->request->getVar('jumlah');

        $post = [
            'menu_id'       => $id_menu,
            'customer_id'   => $id_pelanggan,
            'jumlah'        => $jumlah
        ];

        if($this->buying_model->select('*')->countAll() > 0){
            if($this->buying_model->select('*')->where(['menu_id'=>$post['menu_id']])->first()){
                return redirect()->to('transaksi')->with('error', 'Menu telah dipilih');
            } else if(!$this->buying_model->select('*')->where(['customer_id'=>$post['customer_id']])->first()) {
                return redirect()->to('transaksi')->with('error', 'Tipe pelanggan berubah');
            }
        }

        $this->buying_model->insert($post);
        return redirect()->to('transaksi')->withInput()->with('success', 'produk berhasil ditambahkan');
    }

    

    public function delete_transaksi($id=''){
        if(empty($id)){
            return redirect()->to('transaksi')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->buying_model->Where(['menu_id' => $id])->delete();
        if($delete){
            return redirect()->to('transaksi')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function emptyTable(){
        $this->buying_model->emptyTable();
        return redirect()->to('transaksi')->with('success','Data berhasil di reset');
    }

    // public function getDataTransaksi(){
    //     var_dump($this->request->getPost('transaksiData'));
    //     // return view('pembayaran/invoice_template', ['transaksiData' => $transaksiData]);

    //     // if (!empty($transaksiData)) {
    //     //     
    //     // } else {
    //     //     return redirect()->back()->with('error', 'Data transaksi kosong.');
    //     // }
    // }

    public function invoice(){
        $this->data['sub_total'] = $this->request->getVar('sub_total');
        $this->data['diskon'] = $this->request->getVar('diskon');
        $this->data['total_akhir'] = $this->request->getVar('total_akhir');
        $this->data['tunai'] = $this->request->getVar('tunai');
        $this->data['kembalian'] = $this->request->getVar('kembalian');




        $this->data['transaksi'] = $this->buying_model->select('*, (menu.harga * jumlah) As Total')
                                                        ->join('menu', 'menu.id = transaksi.menu_id')
                                                        ->join('pelanggan', 'pelanggan.id = transaksi.customer_id')
                                                        ->get()->getResult();
        
        foreach ($this->data['transaksi'] as $buy){
            $this->menu_model->set('stok', 'stok-'.$buy->jumlah, false)->where('id', $buy->menu_id)->update();
        }

        $data_transac = [
            'tanggal_penjualan' => $this->request->getVar('tanggal'),
            'nama_kasir'    => $this->request->getVar('user'),
            'sub_total'     => $this->data['sub_total'],
            'diskon'        => $this->data['diskon'], 
            'total_akhir'   => $this->data['total_akhir'],
            'tunai'         => $this->data['tunai'],
            'kembalian'     => $this->data['tunai'] - $this->data['total_akhir']
        ];

        $save_transac = $this->transaksi_model->insert($data_transac);

        if($save_transac){
            $transaction_id = $this->transaksi_model->insertID();
            $items = $this->buying_model->getDataItem();
            foreach ($items as $item) {
                $data_detail_transac = [
                    'id_penjualan' => $transaction_id,
                    'nama_produk' => $item->nama_menu,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->harga,
                    'total_harga' => $item->total
                ];
                $this->detail_transac_model->insert($data_detail_transac);
            }
        }


        $this->buying_model->emptyTable();

        return view('transaksi/invoice_template', $this->data);
    }
}