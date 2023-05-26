<?php
 
namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth_Filters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        $except = [
            'login/process',
            'login/index',
        ];

        if (is_null(session()->get('logged_in')) && !in_array($request->uri->getPath(), $except)) {
            return redirect()
                ->to(base_url('/login/index'))
                ->with('message', 'Silakan login terlebih dahulu!')
                ->with('type', 'error');
        }

        if (!is_null(session()->get('logged_in')) && in_array($request->uri->getPath(), $except)) {
            return redirect()
                ->back()
                ->with('message', 'Anda sudah login.')
                ->with('type', 'info');
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    }
}