<?php 

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Penjualan extends BaseController{

    protected $data;

    protected $transaksi_model;
    protected $detail_transac_model;

    public function __construct() {

        $this->transaksi_model = New TransaksiModel();
        $this->detail_transac_model = New DetailTransaksiModel();
    }

    public function riwayat(){

        $this->data['title'] = "Riwayat Penjualan";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Riwayat Penjualan'
            )
        );

        $this->data['penjualan'] = $this->transaksi_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('penjualan/riwayat_transaksi', $this->data);
    }

    public function cetak($id=''){
        $this->data['penjualan'] = $this->transaksi_model->select('*')->where(['id' => $id])->first();
        $this->data['detail'] = $this->detail_transac_model ->select('*')->where(['penjualan.id' => $id])
                                                            ->join('penjualan', 'penjualan.id = detail_transaksi.id_penjualan')
                                                            ->get()->getResult();
        
        if(empty($id)){
            return redirect()->to('penjualan/riwayat_transaksi')->with('error', 'Data Tidak Ditemukan');
        }
                                                            
        return view ('penjualan/riwayat_invoice', $this->data);
    }
}