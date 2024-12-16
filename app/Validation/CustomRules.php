<?php

namespace App\Validation;

class CustomRules{

    public function uniquePresence(string $str, string $field, array $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->where('id_siswa', $data['id_siswa']);
        $builder->where('tgl_presensi', $data['tgl_presensi']);
        $count = $builder->countAllResults();

        return $count === 0;
    }
}