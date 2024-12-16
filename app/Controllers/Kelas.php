<?php

namespace App\Controllers;
use App\Models\ModelJurusan;
use App\Models\ModelKelas;


class Kelas extends BaseController
{

    public function __construct() {
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelKelas = new ModelKelas();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kelas',
            'menu' => 'master-data',
            'submenu' => 'kelas',
            'page' => 'kelas/v_index',
            'jurusan' => $this->ModelJurusan->AllData(),
        ];
        return view('v_template', $data);
    }


    public function Detail($id_jurusan)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Detail Kelas',
            'menu' => 'master-data',
            'submenu' => 'kelas',
            'page' => 'kelas/v_detail_kelas',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
            'kelas' => $this->ModelKelas->AllDataKelas($id_jurusan),
        ];
        return view('v_template', $data);
    }

    public function InsertData($id_jurusan){
        $data = [
            'kelas' => $this->request->getPost('kelas'),
            'id_jurusan' => $id_jurusan,
        ];
        $this->ModelKelas->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to('Kelas/Detail/' . $id_jurusan);

    }

    public function UpdateData($id_jurusan, $id_kelas){
        $data = [
            'id_kelas' => $id_kelas,
            'kelas' => $this->request->getPost('kelas'),
            'id_jurusan' => $id_jurusan,
        ];
        $this->ModelKelas->UpdateData($data);
        session()->setFlashdata('insert', 'Data Berhasil Diubah !!!');
        return redirect()->to('Kelas/Detail/' . $id_jurusan);

    }

    public function DeleteData($id_jurusan, $id_kelas){
        $data = [
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !!!');
        return redirect()->to('Kelas/Detail/' . $id_jurusan);

    }

    public function RincianKelas($id_kelas)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Rincian Kelas',
            'menu' => 'master-data',
            'submenu' => 'kelas',
            'page' => 'kelas/v_rincian_kelas',
            'kelas' => $this->ModelKelas->DetailKelas($id_kelas),
            'siswa' => $this->ModelKelas->DataSiswa($id_kelas),
            'siswa_blm' => $this->ModelKelas->SiswaBelum(),
            'jmlh' => $this->ModelKelas->JmlhSiswa($id_kelas),
        ];
        return view('v_template', $data);
    }

    public function TmbhSiswa($id_siswa, $id_kelas){
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => $id_kelas,
        ];
        $this->ModelKelas->UpdateSiswa($data);
        session()->setFlashdata('update', 'Siswa Berhasil Ditambahkan ke Kelas !!!');
        return redirect()->to('Kelas/RincianKelas/' . $id_kelas);

    }

    public function HpsSiswa($id_siswa, $id_kelas){
        $data = [
            'id_siswa' => $id_siswa,
            'id_kelas' => 0,
        ];
        $this->ModelKelas->UpdateSiswa($data);
        session()->setFlashdata('delete', 'Siswa Berhasil Dihapus dari Kelas !!!');
        return redirect()->to('Kelas/RincianKelas/' . $id_kelas);

    }
}
