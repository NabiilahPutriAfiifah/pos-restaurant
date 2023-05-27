<?php 

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\PelangganModel;

class Transaksi extends BaseController{

    protected $data;
    protected $menu_model;
    protected $customer_model;

    public function __construct(){

        $this->menu_model = New MenuModel();
        $this->customer_model = New PelangganModel();
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

        $this->data['menu'] = $this->menu_model->select('*')->get()->getResult();
        $this->data['pelanggan'] = $this->customer_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('transaksi/index', $this->data);
    }
}