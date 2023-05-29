<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\SupplierModel;
use App\Models\PelangganModel;
use App\Models\UsersModel;

class Dashboard extends BaseController {

    protected $data;
    protected $session;

    protected $menu_model;
    protected $supplier_model;
    protected $pelanggan_model;
    protected $users_model;

     // Initialize Objects
     public function __construct()
     {
         $this->menu_model = new MenuModel();
         $this->supplier_model = new SupplierModel();
         $this->pelanggan_model = new PelangganModel();
         $this->users_model = new UsersModel();

         $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
     }

    public function index() {

        $this->data['title'] = "Dashboard";
        $this->data['breadcrumbs'] = array(
            array(
                'title'     => 'Dashboard'
            )
        );
        $this->data['menu'] = $this->menu_model->select('*')->countAll();
        $this->data['supplier'] = $this->supplier_model->select('*')->countAll();
        $this->data['pelanggan'] = $this->pelanggan_model->select('*')->countAll();
        $this->data['users'] = $this->users_model->select('*')->countAll();

        return view('dashboard/index', $this->data);
    }
}