<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSekolah;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'subjudul' => '',
            'web' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_login', $data);
    }

    public function CekLogin(){
        if($this->validate([
            'username' =>[
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' =>[
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ]
        ])){
            // jika Valid
            $username = $this->request->getPost('username');
            $level =    1;
            $password= $this->request->getPost('password');

            if($level == 1){
                $cek = $this->ModelAuth->LoginAdmin($username, $password);
                if($cek){
                    session()->set('id_admin', $cek['id_admin']);
                    session()->set('level', $level);
                    session()->set('foto', $cek['foto']);
                    return redirect()->to('/');
                }else{
                    session()->setFlashdata('pesan', 'Username atau Password Salah !!!');
                    return redirect()->to('Auth');
                }
            }else{
                return redirect()->to('Auth');
            }

        }else{
            return redirect()->to('Auth')->withInput();
        }
        
    }

    public function Logout(){
        session()->destroy();
        return redirect()->to('Auth');

        
    }
}
