<?php
 
namespace App\Controllers;
 
use App\Models\UsersModel;
 
class Login extends BaseController {
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $users;

    public function __construct() {

        $this->users = new UsersModel();

        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index() {
        $this->data['title'] = "Login Form";

        // echo view('templates/header', $this->data);
        echo view('auth/login', $this -> data);
        // echo view('templates/footer');
    }
 
    public function process(){
        // return view('dashboard/index');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $this->users->where(['email' => $email])->first();
        
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            
        ])) {
            session()->setFlashdata('error', 'Email Harus Terisi');
            return redirect()->to(base_url('login'));
        }

        if (!$this->validate([
            'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} tidak boleh kosong'
            ]
        ],
            
        ])) {
            session()->setFlashdata('error', 'password Harus Terisi');
            return redirect()->to(base_url('login'));
        }
        if ($dataUser) {
            $password_check = password_verify($password, $dataUser['password']);
            if ($password_check) {
                session()->set([
                    'name' => $dataUser['nama'],
                    'email' => $dataUser['email'],
                    'role_id' => $dataUser['role_id'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/dashboard');
            } else {        
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Email belum terdaftar');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url(''));
    }
}