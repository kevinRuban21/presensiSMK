<?php

namespace App\Controllers;
use App\Models\ModelSekolah;

class Home extends BaseController
{

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_beranda',
            'sekolah' => $this->ModelSekolah->DetailData(),
        ];
        return view('v_front-end', $data);
    }
}
