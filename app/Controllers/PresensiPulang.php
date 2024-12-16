<?php

namespace App\Controllers;
use App\Models\ModelScanMasuk;
use App\Models\ModelSekolah;

class PresensiPulang extends BaseController
{
    public function __construct() {
        $this->ModelScanMasuk = new ModelScanMasuk();
        $this->ModelSekolah = new ModelSekolah();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Presensi Pulang',
            'sekolah' => $this->ModelSekolah->DetailData(),
            'presensi_terbaru' => $this->ModelScanMasuk->AllDataLimit(),
        ];
        return view('scan/v_scan_pulang', $data);
    }

    public function PresensiBaru(): string
    {
        $data = [
            'presensi_terbaru' => $this->ModelScanMasuk->AllDataLimitPulang(),
        ];
        return view('scan/v_presensibaru', $data);
    }

    public function UpdateData()
    {
        $id_siswa = $this->request->getPost('id_siswa');
        date_default_timezone_set('Asia/Jayapura');
        $validate = $this->validate([
            'id_siswa' =>[
                'rules' => 'integer|is_not_unique[tbl_siswa.id_siswa]',
                'errors' => [
                    'integer' => 'QR Code tidak Valid !!!',
                    'is_not_unique' => 'QR Code tidak Valid !!!',
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
            'id_siswa' => $id_siswa,
            'tgl_presensi' => date('Y-m-d'),
            'jam_pulang' => date('H:i:s'),
        ]; 
        $this->ModelScanMasuk->UpdateData($data);
        return redirect()->to('PresensiPulang');
        // return redirect()->to('KirimPesan/PesanWaPulang');
    }
}
