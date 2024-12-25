<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelScanMasuk extends Model
{

    protected $table      = 'presensi';
    protected $primaryKey ="id_presensi";
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;
    protected $returnType = 'array';
    protected $allowedFields = [ 
        'id_siswa',
        'tgl_presensi',
        'jam_masuk',
    ];

    public function saveData($data)
    {
        return $this->save($data);
    }

    public function InsertData($data)
    {
        $this->db->table('presensi')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('presensi')
        ->where('id_siswa', $data['id_siswa'])
        ->where('tgl_presensi', $data['tgl_presensi'])
        ->update($data);
    }

    public function AllDataLimit()
    {
        return $this->db->table('presensi')
            ->limit(3)
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=presensi.id_siswa', 'LEFT')
            ->orderBy('id_presensi', 'DESC')
            ->get()->getResultArray();
    }

    public function AllData()
    {
        return $this->db->table('presensi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = presensi.id_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_jurusan', 'tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan')
            ->orderBy('id_presensi', 'DESC')
            ->get()->getResultArray();
    }

    public function AllDataSiswa($id_siswa)
    {
        return $this->db->table('presensi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = presensi.id_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_jurusan', 'tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan')
            ->where('tbl_siswa.id_siswa', $id_siswa)
            ->get()->getResultArray();
    }

    public function AllDataKelas($id_kelas)
    {
        return $this->db->table('presensi')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = presensi.id_siswa')
            ->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas')
            ->join('tbl_jurusan', 'tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan')
            ->where('tbl_siswa.id_kelas', $id_kelas)
            ->orderBy('id_presensi', 'DESC')
            ->get()->getResultArray();
    }

    public function AllDataLimitPulang()
    {
        return $this->db->table('presensi')
            ->limit(3)
            ->join('tbl_siswa', 'tbl_siswa.id_siswa=presensi.id_siswa', 'LEFT')
            ->orderBy('tgl_presensi', 'DESC')
            ->orderBy('jam_pulang', 'DESC')
            ->get()->getResultArray();
    }

}
