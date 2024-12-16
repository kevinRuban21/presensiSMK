<?php

namespace App\Controllers;
use App\Models\ModelSekolah;


class Setting extends BaseController
{

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
    }

    public function Sekolah()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Sekolah',
            'menu' => 'setting',
            'submenu' => 'sekolah',
            'page' => 'setting/v_sekolah',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_template', $data);
    }

    
    
}
