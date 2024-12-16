<?php

namespace App\Controllers;
use App\Models\ModelAdmin;

class Dashboard extends BaseController
{
    public function __construct() {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard',
            'jmlh_siswa' => $this->ModelAdmin->JmlhSiswa(),
            'jmlh_jurusan' => $this->ModelAdmin->JmlhJurusan(),
            'jmlh_kelas' => $this->ModelAdmin->JmlhKelas(),

        ];
        return view('v_template', $data);
    }
}
