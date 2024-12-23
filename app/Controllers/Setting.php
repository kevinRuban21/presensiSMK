<?php

namespace App\Controllers;
use App\Models\ModelSekolah;


class Setting extends BaseController
{

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
    }

    public function Sekolah()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sekolah',
            'menu' => 'setting',
            'submenu' => 'sekolah',
            'page' => 'setting/v_sekolah',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function UpdateData(){
        $validate = $this->validate([
            'nama_sekolah' =>[
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',   
                ]
            ],
            'kepsek' =>[
                'label' => 'Kepala Sekolah',
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
            'id' => 1,
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'kepsek' => $this->request->getPost('kepsek'),
        ];
        $this->ModelSekolah->UpdateData($data);
    }

    
    
}
