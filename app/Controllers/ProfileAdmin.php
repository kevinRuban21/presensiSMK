<?php

namespace App\Controllers;
use App\Models\ModelSekolah;
use App\Models\ModelAdmin;

class ProfileAdmin extends BaseController
{

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Admin',
            'subjudul' => 'Admin',
            'menu' => 'profile-admin',
            'submenu' => 'Profile Admin',
            'page' => 'v_profil_admin',
            'sekolah' => $this->ModelSekolah->DetailData(),
            'admin' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function UpdateData(){
        $validate = $this->validate([
            'username' =>[
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',   
                ]
            ],
            'password' =>[
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',   
                ]
            ],
        ]);
        
        if(!$validate){
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $data = [
            'id_admin' => 1,
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];
        $this->ModelAdmin->UpdateData($data);
    }

    public function UpdateFoto(){
        $foto = $this->request->getFile('foto');
        $nama_file = $foto->getName();
        $data = [
            'id_admin' => 1,
            'foto' => $nama_file,
        ];
        $foto->move('foto_profil', $nama_file);
        $this->ModelAdmin->UpdateData($data);
        session()->setFlashdata('pesan', 'Foto Berhasil Diubah');
        return redirect()->to('ProfileAdmin');
    }
}
