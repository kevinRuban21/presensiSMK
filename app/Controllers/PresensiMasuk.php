<?php

namespace App\Controllers;
use App\Models\ModelScanMasuk;
use App\Models\ModelSekolah;
use App\Models\ModelSiswa;
use App\Models\ModelJurusan;
use App\Models\ModelKelas;

class PresensiMasuk extends BaseController
{
    public function __construct() {
        $this->ModelScanMasuk = new ModelScanMasuk();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelKelas = new ModelKelas();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Presensi Masuk',
            'sekolah' => $this->ModelSekolah->DetailData(),
            'presensi_terbaru' => $this->ModelScanMasuk->AllDataLimit(),
        ];
        return view('scan/v_scan_masuk', $data);
    }

    public function PresensiBaru(): string
    {
        $data = [
            'presensi_terbaru' => $this->ModelScanMasuk->AllDataLimit(),
        ];
        return view('scan/v_presensibaru', $data);
    }

    public function SimpanData()
    {
        $id_siswa = $this->request->getPost('id_siswa');
        date_default_timezone_set('Asia/Jayapura');
        $validate = $this->validate([
            'id_siswa' =>[
                'rules' => 'integer|is_not_unique[tbl_siswa.id_siswa]',
                'errors' => [
                    'integer' => 'QR Code tidak Valid !!!',
                    'is_not_unique' => 'QR Code tidak Valid !!!',
                ],
            ],
        ]);

        if(!$validate){
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }
        $data = [
            'id_siswa' => $id_siswa,
            'tgl_presensi' => date('Y-m-d'),
            'jam_masuk' => date('H:i:s'),
        ]; 
        $this->ModelScanMasuk->InsertData($data);
        return redirect()->to('PresensiMasuk');
        // return redirect()->to('KirimPesan/PesanWa');
    }
}
