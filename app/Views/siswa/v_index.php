<div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> <?= $subjudul ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('Siswa/Input') ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
              <?php

                    use CodeIgniter\Database\BaseUtils;

                    if(session()->get('insert')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('insert');
                        echo '</div>';
                        echo '<script>
                            $(document).ready(function(){
                            $(".alert").fadeIn();
                            setTimeout(function(){
                                $(".alert").fadeOut();
                            }, 3000);
                            });
                        </script>';
                    }
                    if(session()->get('update')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('update');
                        echo '</div>';
                        echo '<script>
                        $(document).ready(function(){
                            $(".alert").fadeIn();
                            setTimeout(function(){
                                $(".alert").fadeOut();
                            }, 3000);
                            });
                        </script>';
                    }
                    if(session()->get('delete')){
                        echo '<div class="alert alert-danger">';
                        echo session()->get('delete');
                        echo '</div>';
                        echo '<script>
                        $(document).ready(function(){
                            $(".alert").fadeIn();
                            setTimeout(function(){
                                $(".alert").fadeOut();
                            }, 3000);
                            });
                        </script>';
                    }
                ?>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="5px">NO</th>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas / Jurusan</th>
                            <th>QR Code</th>
                            <th width="20px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($siswa as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['nipd'] ?></td>
                                <td class="text-center"><?= $d['nisn'] ?></td>
                                <td><?= $d['nama_siswa'] ?></td>
                                <td><?= $d['kelas'] ?> / <?= $d['jurusan'] ?></td>
                                <td class="text-center">
                                    <?php if ($d['qr'] == '') { ?>
                                       <a href="<?= base_url('Siswa/GenerateQr/' . $d['id_siswa']) ?>" class="btn btn-success btn-sm mr-2 ml-2"><i class="fas fa-qrcode"></i> Generate QR Code</a>
                                    <?php } else { ?>
                                        <img src="<?= $d['qr'] ?>" width="100px">
                                    <?php } ?>  
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Siswa/Edit/' . $d['id_siswa']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?= base_url('Siswa/DeleteData/' . $d['id_siswa']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>

                            </tr>  
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


        <script>
            $(function () {
                $("#example2").DataTable({
                "paging": true,
                "searching": true,
                "responsive": true, 
                "lengthChange": true, 
                "autoWidth": true,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>