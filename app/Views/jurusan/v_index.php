<div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('Jurusan/Input') ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                                use CodeIgniter\Database\BaseUtils;

                    if(session()->get('insert')){
                        echo '<div class="alert alert-info">';
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
                        echo '<div class="alert alert-info">';
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
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-light">
                        <th>NO</th>
                        <th>Kode</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no=1; foreach($jurusan as $key => $d){ ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $d['kode_jurusan'] ?></td>
                            <td><?= $d['jurusan'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Jurusan/Edit/' . $d['id_jurusan']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('Jurusan/DeleteData/' . $d['id_jurusan']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>

                        </tr>

                    <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->