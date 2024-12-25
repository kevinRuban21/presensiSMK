<?php

namespace App\Controllers;
use App\Models\ModelSekolah;
use App\Models\ModelSiswa;
use App\Models\ModelScanMasuk;


class KirimPesan extends BaseController
{

    public function __construct() {
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelScanMasuk = new ModelScanMasuk();
    }

    public function PesanWa($id_siswa)
    {
        $siswa = $this->ModelScanMasuk->AllDataSiswa($id_siswa);
        foreach($siswa as $s){
            $pesan = 'Selamat Pagi Bpk/Ibu '. $s['nama_ortu'] . ' Anak anda ' . $s['nama_siswa'] . ' Telah sampai di sekolah pada ' . $s['jam_masuk'] . ' Terimah Kasih';
            $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $s['telp_ortu'],
                    'message' => $pesan,
                    'delay' => '2',
                    'countryCode' => '62',
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: iecAvJaJFr9jSaywLQQK'
                ),
                ));
        }
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;
                
        return redirect()->to('PresensiMasuk');
    }

    public function PesanWaPulang()
    {
        $siswa = $this->ModelScanMasuk->AllData();
        foreach($siswa as $siswa){
            $pesan = 'Selamat Sore Bpk/Ibu '. $siswa['nama_ortu'] . ' Anak anda ' . $siswa['nama_siswa'] . ' Telah pulang dari sekolah pada ' . $siswa['jam_pulang'] . ' Terimah Kasih';
            $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                'target' => $siswa['telp_ortu'],
                'message' => $pesan,
                'delay' => '2',
                'countryCode' => '62',
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: iecAvJaJFr9jSaywLQQK'
                ),
                ));
        }
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;
                
        return redirect()->to('PresensiPulang');
    }

    
    
}
