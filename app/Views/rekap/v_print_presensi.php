
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presensi | <?= $judul ?></title>

    <?php 
        $db = \Config\Database::connect();
        $web = $db->table('tbl_sekolah')->where('id', 1)->get()->getRowArray();

    ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url() ?>/logo2.png" type="image/gif">
</head>
<body>
    <div class="container">
    <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
        <div class="col-sm-1 invoice-col"></div>
            <div class="col-sm-2 invoice-col">
                <img src="<?= base_url() ?>/logo2.png" width="120px">
            </div>
            <div class="col-sm-6 invoice-col">
            <table>
                <thead>
                    <tr>
                        <td rowspan="4"></td>
                        <td class="text-uppercase text-bold text-center" style="font-family: Arial, sans-serif; font-size: 18px">YAYASAN KASIH ANTONIUS MALUKU TENGGARA</td>
                        <td rowspan="4"></td>
                    </tr>
                    <tr>
                        <td class="text-uppercase text-bold text-center" style="font-family: Cambria; font-size: 20px"></td>
                    </tr>
                    <tr>
                        <td class="text-uppercase text-center" style="font-family: Arial; font-size: 12px">Alamat : Desa Bombay, Kec. Kei Besar, Kab. Maluku Tenggara</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-family: Arial; font-size: 12px"> Tlp : 081240997799; Email : <a href=""><u>smkkasihtheresia@gmail.com</u></a></td>
                    </tr>
                </thead>
                </table>
            </div>
            <div class="col-sm-2 invoice-col mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-bold">NPSN : 70011890</td>
                    </tr>
                </thead>
            </table>
            </div>
            <div class="col-sm-1 invoice-col mt-5 pt-5"></div>

        </div><hr>
        <!-- /.row -->

        <div class="row">
            <div class="col-12 text-bold text-uppercase text-center h4">
                <?= $subjudul ?>
            </div>
        </div>

        <!-- Table row -->
        <div class="row">
        <div class="col-12 table-responsive">
        <table id="example1" class="table table-bordered table-striped">
                        <thead> 
                            <tr class="text-center">
                                <th width="30px">NO</th>
                                <th>Tanggal Presensi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>NISN</th>
                                <th>NIPD</th>
                                <th>Nama Siswa</th>
                                <th>Kelas/Jurusan</th>
                            </tr>  
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($daftar_presensi as $key => $d){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['tgl_presensi'] ?></td>
                                <td><?= $d['jam_masuk'] ?></td>
                                <td><?= $d['jam_pulang'] ?></td>
                                <td><?= $d['nisn'] ?></td>
                                <td><?= $d['nipd'] ?></td>
                                <td><?= $d['nama_siswa'] ?></td>
                                <td><?= $d['kelas'] ?>/<?= $d['jurusan'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3 pt-5 mt-5">
                <table>
                    <tr>
                        <td class="text_center">Mengetahui</td>
                    </tr>
                    <tr>
                        <td class="text_center">Kepala Sekolah</td>
                    </tr>
                    <tr>
                        <td><br><br><br><br></td>
                    </tr>
                    <tr>
                        <td class="text_center">( __________________ )</td>
                    </tr>
                    <tr>
                        <td class="text_center"><?= $web['kepsek'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
    window.addEventListener("load", window.print());
    </script>
    </div>
</body>
</html>
