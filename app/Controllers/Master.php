<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\JenisModel;
use App\Models\MenuModel;
use App\Models\SupplierModel;

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

    public function update_kategori($id=''){
        $this->data['title'] = 'Ubah Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk',
                'url' => base_url('kategori')
            ),
            array(
                'title' => 'Ubah Kategori Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/kategori');
        }
        $this->data['data'] = $this->category_model->select('*')->where(['id'=>$id])->first();
        return view('master/kategori/edit', $this->data);
    }

    public function submit_changes_kategori(){
        $this->data['request'] = $this->request;
        $post = [
            'kategori' => $this->request->getPost('kategori')
        ];
        if(!empty($this->request->getPost('id'))) {
            $save = $this->category_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->category_model->insert($post);
        }

        if($save){
            return redirect()->to('master/kategori');
        } else {
            return redirect()->to('master/kategori');
        }
    }

    public function delete_kategori($id=''){
        if(empty($id)){
            return redirect()->to('master/kategori');
        }
        $delete = $this->category_model->delete($id);
        if($delete){
            return redirect()->to('master/kategori');
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

    public function update_jenis($id=''){
        $this->data['title'] = 'Ubah Jenis Menu';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Jenis Menu',
                'url' => base_url('jenis')
            ),
            array(
                'title' => 'Ubah Jenis Menu'
            )
        );

        if(empty($id)){
            return redirect()->to('master/jenis');
        }
        $this->data['data'] = $this->jenis_model->select('*')->where(['id'=>$id])->first();
        return view('master/jenis/edit', $this->data);
    }

    public function submit_changes_jenis(){
        $this->data['request'] = $this->request;
        $post = [
            'jenis' => $this->request->getPost('jenis')
        ];
        if(!empty($this->request->getPost('id'))) {
            $save = $this->jenis_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->jenis_model->insert($post);
        }
        
        if($save){
            return redirect()->to('master/jenis');
        } else {
            return redirect()->to('master/jenis');
        }
    }

    public function delete_jenis($id=''){
        if(empty($id)){
            return redirect()->to('master/jenis');
        }
        $delete = $this->jenis_model->delete($id);
        if($delete){
            return redirect()->to('master/jenis');
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
                                          menu.nama_menu, kategori.kategori, 
                                          menu.harga, menu.stok')
                                ->join('kategori', 'kategori.id = menu.id_kategori')
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

    public function read_menu(){
        $this->data['title'] = 'Detail Menu';
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
                'title' => 'Detail Menu'
            )
        );
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

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['jenis'] = $this->jenis_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['data'] = $this->menu_model->select('*')->where(['id'=>$id])->first();

        return view('master/menu/edit', $this->data);
    }

    public function submit_changes_menu(){
        $this->data['request'] = $this->request;
        $post = [
            'kode_menu' => $this->request->getPost('kode_menu'),
            'nama_menu' => $this->request->getPost('nama_menu'),
            'id_kategori' => $this->request->getPost('kategori'),
            'id_jenis'   => $this->request->getPost('jenis'),
            'id_supplier' => $this->request->getPost('supplier'),
            'harga' => $this->request->getPost('harga'),
            'stok'  => $this->request->getPost('stok'),
        ];
        if(!empty($this->request->getPost('id'))) {
            $save = $this->menu_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->menu_model->insert($post);
        }
        
        if($save){
            return redirect()->to('master/menu');
        } else {
            return redirect()->to('master/menu');
        }
    }

    public function delete_menu($id=''){
        if(empty($id)){
            return redirect()->to('master/menu');
        }
        $delete = $this->menu_model->delete($id);
        if($delete){
            return redirect()->to('master/menu');
        }
    }
}