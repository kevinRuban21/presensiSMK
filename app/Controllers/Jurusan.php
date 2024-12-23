<?php

namespace App\Controllers;
use App\Models\ModelJurusan;


class Jurusan extends BaseController
{

    public function __construct() {
        $this->ModelJurusan = new ModelJurusan();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jurusan',
            'menu' => 'master-data',
            'submenu' => 'Data Jurusan',
            'page' => 'jurusan/v_index',
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jurusan',
            'menu' => 'master-data',
            'submenu' => 'Input Jurusan',
            'page' => 'jurusan/v_input',
        ];
        return view('v_template', $data);
    }

    public function InsertData(){
        $validate = $this->validate([
            'kode_jurusan' =>[
                'label' => 'Kode Jurusan',
                'rules' => 'required|is_unique[tbl_jurusan.kode_jurusan]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} ini Sudah ada !!!',   
                ]
            ],
            'jurusan' =>[
                'label' => 'Jurusan',
                'rules' => 'required|is_unique[tbl_jurusan.jurusan]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} ini Sudah ada !!!',   
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
                'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
        ];
        $this->ModelJurusan->InsertData($data);

    }

    public function Edit($id_jurusan)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Jurusan',
            'menu' => 'master-data',
            'submenu' => 'Edit Jurusan',
            'page' => 'jurusan/v_edit',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
        ];
        return view('v_template', $data);
    }

    public function UpdateData($id_jurusan){
        $validate = $this->validate([
            'kode_jurusan' =>[
                'label' => 'Kode Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',   
                ]
            ],
            'jurusan' =>[
                'label' => 'Jurusan',
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
            'id_jurusan' => $id_jurusan,
            'kode_jurusan' => $this->request->getPost('kode_jurusan'),
            'jurusan' => $this->request->getPost('jurusan'),
        ];
        $this->ModelJurusan->UpdateData($data);
    }

    public function DeleteData($id_jurusan){
        $data = [
            'id_jurusan' => $id_jurusan,
        ];
        $this->ModelJurusan->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('Jurusan');
    }
}
