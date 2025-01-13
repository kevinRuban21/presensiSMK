<?php

namespace App\Controllers;
use App\Models\ModelAdmin;
use App\Models\ModelScanMasuk;

class Dashboard extends BaseController
{
    public function __construct() {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelScanMasuk = new ModelScanMasuk();
    }

    public function index(): string
    {
        $tgl_presensi = date('Y-m-d');
        $data_filter = $this->ModelScanMasuk->DataFilter($tgl_presensi);
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard',
            'daftar_presensi' => $data_filter,
            'jmlh_siswa' => $this->ModelAdmin->JmlhSiswa(),
            'jmlh_jurusan' => $this->ModelAdmin->JmlhJurusan(),
            'jmlh_kelas' => $this->ModelAdmin->JmlhKelas(),

        ];
        return view('v_template', $data);
    }
}
