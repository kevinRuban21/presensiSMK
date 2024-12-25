<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JmlhJurusan(){
        return $this->db->table('tbl_jurusan')->countAll();
    }

    public function JmlhSiswa(){
        return $this->db->table('tbl_siswa')->countAll();
    }
    
    public function JmlhKelas(){
        return $this->db->table('tbl_kelas')->countAll();
    }

    public function DetailData()
    {
        return $this->db->table('tbl_admin')->where('id_admin', 1)->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_admin')->where('id_admin', $data['id_admin'])->update($data);
    }
}