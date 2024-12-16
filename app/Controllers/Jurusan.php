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
            'submenu' => 'jurusan',
            'page' => 'jurusan/v_index',
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Input Data Jurusan',
            'menu' => 'master-data',
            'submenu' => 'jurusan',
            'page' => 'jurusan/v_input',
        ];
        return view('v_template', $data);
    }

    public function InsertData(){
        if($this->validate([
            'kode_jurusan' =>[
                'label' => 'Kode Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jurusan' =>[
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ]
        ])){
            // jika Valid
            $data = [
                'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
            ];
            $this->ModelJurusan->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Jurusan');

        }else{
            return redirect()->to('Jurusan/Input')->withInput();
        }
    }

    public function Edit($id_jurusan)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Edit Data Jurusan',
            'menu' => 'master-data',
            'submenu' => 'jurusan',
            'page' => 'jurusan/v_edit',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
        ];
        return view('v_template', $data);
    }

    public function UpdateData($id_jurusan){
        if($this->validate([
            'kode_jurusan' =>[
                'label' => 'Kode Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jurusan' =>[
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ]
        ])){
            // jika Valid
            $data = [
                'id_jurusan' => $id_jurusan,
                'kode_jurusan' => $this->request->getPost('kode_jurusan'),
                'jurusan' => $this->request->getPost('jurusan'),
            ];
            $this->ModelJurusan->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Jurusan');

        }else{
            return redirect()->to('Jurusan/Input')->withInput();
        }
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
