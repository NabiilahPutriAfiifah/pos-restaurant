<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\JenisModel;
use App\Models\MenuModel;
use App\Models\SupplierModel;
// use Dompdf\Dompdf;

class Master extends BaseController{

    protected $data;

    protected $category_model;
    protected $jenis_model;
    protected $menu_model;
    protected $supplier_model;

    public function __construct() {

        $this->category_model = New KategoriModel();
        $this->jenis_model = New JenisModel();
        $this->menu_model = New MenuModel();
        $this->supplier_model = New SupplierModel();
    }
    
    //-------------------------------------------- Kategori Makanan -----------------------------------------------------//

    public function kategori(){
        $this->data['title'] = 'Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk'
            )
        );

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('master/kategori/index', $this->data);
    }

    public function edit_kategori($id=''){

        $this->data['title'] = 'Ubah Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk',
                'url' => base_url('master/kategori')
            ),
            array(
                'title' => 'Ubah Kategori Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/kategori')->with('error', 'Data Tidak Ditemukan');
        }

        $this->data['data'] = $this->category_model->select('*')->where(['id'=>$id])->first();
        return view('master/kategori/edit', $this->data);
    }

    public function create_kategori(){
        $data = [
            'kategori' => $this->request->getVar('kategori')
        ];

        if($this->category_model->where(['kategori' => $data['kategori']])->first()){
            return redirect()->back()->withInput()->with('error', 'Kategori telah ada');
        } 

        $this->category_model->insert($data);
        return redirect()->to('master/kategori')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update_kategori($id=''){
        $data = [
            'kategori' => $this->request->getVar('kategori')
        ];

        if($this->category_model->where(['kategori' => $data['kategori']])->first()){
            return redirect()->back()->withInput()->with('error', 'Kategori telah ada');
        } 
        $this->category_model->where(['id'=>$id])->set($data)->update();
        return redirect()->to('master/kategori')->with('success', 'Berhasil Memperbaharui Data');
    }

    public function delete_kategori($id=''){
        if(empty($id)){
            return redirect()->to('master/kategori')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->category_model->delete($id);
        if($delete){
            return redirect()->to('master/kategori')->with('success', 'Berhasil Menghapus Data');
        }
    }




    //-------------------------------------------- Jenis Makanan -----------------------------------------------------//

    public function jenis(){
        $this->data['title'] = 'Jenis Makanan';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Jenis Makanan'
            )
        );

        $this->data['jenis'] = $this->jenis_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('master/jenis/index', $this->data);
    }

    public function edit_jenis($id=''){
        $this->data['title'] = 'Ubah Jenis Makanan';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Jenis Makanan',
                'url' => base_url('master/jenis')
            ),
            array(
                'title' => 'Ubah Jenis Makanan'
            )
        );

        if(empty($id)){
            return redirect()->to('master/jenis')->with('error', 'Data Tidak Ditemukan');
        }
        $this->data['data'] = $this->jenis_model->select('*')->where(['id'=>$id])->first();
        return view('master/jenis/edit', $this->data);
    }

    public function create_jenis(){
        $data = [
            'jenis' => $this->request->getVar('jenis')
        ];

        if($this->jenis_model->where(['jenis' => $data['jenis']])->first()){
            return redirect()->back()->withInput()->with('error', 'Jenis telah ada');
        } 

        $this->jenis_model->insert($data);
        return redirect()->to('master/jenis')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update_jenis($id=''){
        $data = [
            'jenis' => $this->request->getVar('jenis')
        ];

        if($this->jenis_model->where(['jenis' => $data['jenis']])->first()){
            return redirect()->back()->withInput()->with('error', 'Jenis telah ada');
        } 
        $this->jenis_model->where(['id'=>$id])->set($data)->update();
        return redirect()->to('master/jenis')->with('success', 'Berhasil Memperbaharui Data');
    }

   
    
    public function delete_jenis($id=''){
        if(empty($id)){
            return redirect()->to('master/jenis')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->jenis_model->delete($id);
        if($delete){
            return redirect()->to('master/jenis')->with('success', 'Berhasil Menghapus Data');
        }
    }

    //-------------------------------------------- Menu -----------------------------------------------------//

    public function menu(){
        $this->data['title'] = 'Menu';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Menu'
            )
        );

        $this->data['menu'] = $this->menu_model
                                ->orderBy('id ASC')
                                ->select('menu.id, menu.kode_menu, 
                                          menu.nama_menu, kategori.kategori, jenis.jenis,
                                          menu.harga, menu.stok')
                                ->join('kategori', 'kategori.id = menu.id_kategori' )
                                ->join('jenis', 'jenis.id = menu.id_jenis')
                                ->get()->getResult();

        return view('master/menu/index', $this->data);
    }

    public function create_menu(){
        $this->data['title'] = 'Tambah Data Menu';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Menu',
                'url'   => base_url('master/menu')
            ),
            array(
                'title' => 'Tambah Data Menu'
            )
        );

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['jenis'] = $this->jenis_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('master/menu/create', $this->data);
    }


    public function update_menu($id=''){
        $this->data['title'] = 'Ubah Data Menu';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Menu',
                'url'   => base_url('master/menu')
            ),
            array(
                'title' => 'Ubah Data Menu'
            )
        );
        if(empty($id)){
            return redirect()->to('master/menu')->with('error', 'Data Tidak di Temukan');
        }

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['jenis'] = $this->jenis_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['data'] = $this->menu_model->select('*')->where(['id'=>$id])->first();

        return view('master/menu/edit', $this->data);
    }

    public function submit_changes_menu(){
        $this->data['request'] = $this->request;
        $data = [
            'kode_menu' => $this->request->getPost('kode_menu'),
            'nama_menu' => $this->request->getPost('nama_menu'),
            'id_kategori' => $this->request->getPost('kategori'),
            'id_jenis'   => $this->request->getPost('jenis'),
            'id_supplier' => $this->request->getPost('supplier'),
            'harga' => $this->request->getPost('harga'),
            'stok'  => $this->request->getPost('stok'),
        ];
        if(!empty($this->request->getPost('id'))) {
            $this->menu_model->where(['id'=>$this->request->getPost('id')])->set($data)->update();
            return redirect()->to('master/menu')->with('success', 'Berhasil Memperbaharui Data');
        } else {
            $this->menu_model->insert($data);
            return redirect()->to('master/menu')->with('success', 'Berhasil Menambahkan Data');
        }
    }

    public function delete_menu($id=''){
        if(empty($id)){
            return redirect()->to('master/menu')->with('error', 'Data Tidak di Temukan');
        }
        $delete = $this->menu_model->delete($id);
        if($delete){
            return redirect()->to('master/menu')->with('success', 'Data Berhasil di Hapus');
        }
    }

    // public function cetak(){
    //     $data = [
    //         'data' => $this->menu_model->getMenu()
    //     ];
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml(view('/master/cetakLaporan', $data));
    //     $dompdf->setPaper('A4', 'landscape');
    //     $dompdf->render();
    //     $dompdf->stream('Laporan_Pengeluaran_' . date('d-M-y'), ['Attachment' => 0]);
    // }
}