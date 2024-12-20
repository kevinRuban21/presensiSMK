<?php

namespace App\Controllers;
use App\Models\ModelSiswa;
use App\Models\ModelJurusan;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;


class Siswa extends BaseController
{
    protected $validation;

    public function __construct() {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJurusan = new ModelJurusan();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'page' => 'siswa/v_index',
            'siswa' => $this->ModelSiswa->AllData(),
        ];
        return view('v_template', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Input Data Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'page' => 'siswa/v_input',
            'jurusan' => $this->ModelJurusan->AllData(),
            'siswa' => $this->ModelSiswa->AllData(),
        ];
        return view('v_template', $data);
    }


    public function InsertData()
    {
        $nisn = $this->request->getPost('nisn');
        $nama_siswa = $this->request->getPost('nama_siswa');
        $nama_ortu = $this->request->getPost('nama_ortu');
        $telp_ortu = $this->request->getPost('telp_ortu');
        $nipd = $this->request->getPost('nipd');

        $validate = $this->validate([
            'nipd' =>[
                'label' => 'NIPD',
                'rules' => 'required|is_unique[tbl_siswa.nipd]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} ini Sudah ada !!!',   
                ]
            ],
            'nisn' =>[
                'label' => 'NISN',
                'rules' => 'required|is_unique[tbl_siswa.nisn]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',
                    'is_unique' => '{field} ini Sudah ada !!!',   
                ]
            ],
            'nama_siswa' =>[
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'id_jurusan' =>[
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'nama_ortu' =>[
                'label' => 'Nama Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'telp_ortu' =>[
                'label' => 'No Telpon Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
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
            'nipd' => $nipd,
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'nama_ortu' => $nama_ortu,
            'telp_ortu' => $telp_ortu,
            'id_jurusan' => $this->request->getPost('id_jurusan'),
        ];
        $this->ModelSiswa->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
        return redirect()->to('Siswa');

    }

    public function GenerateQr($id_siswa){
        $writer = new PngWriter();
        // Create QR code
        $qrCode = QrCode::create($id_siswa)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(base_url('logo.jpeg'))
            ->setResizeToWidth(50);

        $result = $writer->write($qrCode, $logo);

        $qr = $result->getDataUri();

        $data = [
            'id_siswa' => $id_siswa,
            'qr' => $qr,
        ];
        $this->ModelSiswa->UpdateData($data);
        session()->setFlashdata('update', 'QR Code Berhasil di Generate');
        return redirect()->to('Siswa');
    }

    public function Edit($id_siswa)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Edit Data Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'page' => 'siswa/v_edit',
            'siswa' => $this->ModelSiswa->DetailData($id_siswa),
        ];
        return view('v_template', $data);
    }

    public function UpdateData($id_siswa)
    {
        $nisn = $this->request->getPost('nisn');
        $nama_siswa = $this->request->getPost('nama_siswa');
        $nama_ortu = $this->request->getPost('nama_ortu');
        $telp_ortu = $this->request->getPost('telp_ortu');
        $nipd = $this->request->getPost('nipd');
        
        if($this->validate([
            'nipd' =>[
                'label' => 'NIPD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'nisn' =>[
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!',  
                ]
            ],
            'nama_siswa' =>[
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'nama_ortu' =>[
                'label' => 'Nama Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'telp_ortu' =>[
                'label' => 'No Telepon Orang Tua',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])){
            $data = [
                'id_siswa' => $id_siswa,
                'nipd' => $nipd,
                'nisn' => $nisn,
                'nama_siswa' => $nama_siswa,
                'nama_ortu' => $nama_ortu,
                'telp_ortu' => $telp_ortu,
            ];
            
            $this->ModelSiswa->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diubah');
            return redirect()->to('Siswa');

        }else{
            return redirect()->to('Siswa/Edit/' . $id_siswa)->withInput();
        }
    }

    public function DeleteData($id_siswa){
        $data = [
            'id_siswa' => $id_siswa,
        ];
        $this->ModelSiswa->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('siswa');
    }

    public function KartuSiswa($id_siswa)
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kartu Siswa',
            'menu' => 'master-data',
            'submenu' => 'siswa',
            'siswa' => $this->ModelSiswa->DetailData($id_siswa),
        ];
        return view('siswa/v_kartuSiswa', $data);
    }
}
