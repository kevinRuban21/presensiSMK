<?php

namespace App\Controllers;
use App\Models\ModelJurusan;
use App\Models\ModelScanMasuk;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;


class DaftarPresensi extends BaseController
{

    public function __construct() {
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelScanMasuk = new ModelScanMasuk();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Daftar Presensi',
            'menu' => 'master-data',
            'submenu' => 'daftar-presensi',
            'page' => 'rekap/v_jurusan',
            'daftar_presensi' => $this->ModelScanMasuk->AllData(),
            'jurusan' => $this->ModelJurusan->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'siswa' => $this->ModelSiswa->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Kelas($id_jurusan)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Daftar Presensi',
            'menu' => 'master-data',
            'submenu' => 'daftar-presensi',
            'page' => 'rekap/v_kelas',
            'jurusan' => $this->ModelJurusan->DetailData($id_jurusan),
            'kelas' => $this->ModelKelas->AllDataKelas($id_jurusan),
            'siswa_blm' => $this->ModelKelas->SiswaBelum(),
        ];
        return view('v_template', $data);
    }

    public function Presensi($id_kelas)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Daftar Presensi',
            'menu' => 'master-data',
            'submenu' => 'daftar-presensi',
            'page' => 'rekap/v_daftar_presensi',
            'daftar_presensi' => $this->ModelScanMasuk->AllDataKelas($id_kelas),
        ];
        return view('v_template', $data);
    }

    public function PrintDaftarPresensi()
    {
        $data = [
            'judul' => 'Print Daftar Presensi',
            'subjudul' => 'Daftar Presensi',
            'daftar_presensi' => $this->ModelScanMasuk->AllData(),
        ];
        return view('rekap/v_print_presensi', $data);
    }

    public function PrintDaftarPresensiKelas($id_kelas)
    {
        $data = [
            'judul' => 'Print Daftar Presensi',
            'subjudul' => 'Daftar Presensi',
            'daftar_presensi' => $this->ModelScanMasuk->AllDataKelas($id_kelas),
        ];
        return view('rekap/v_print_presensi_kelas', $data);
    }

    
}
