<?php
 
namespace App\Controllers;
 
use App\Models\UserModel;
 
class Kasir extends BaseController {
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $users;

    public function __construct() {

        $this->users = new UserModel();

        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index(){
        return view('dashboard');
    }

}