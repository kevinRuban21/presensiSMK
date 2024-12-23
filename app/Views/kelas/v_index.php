<div class="row">
        <div class="card">
            <div class="card-header d-flex">
                <div class="card-title"><?= $submenu ?></div>
                <div class="card-tools ms-auto">
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <tr class="text-center bg-light">
                        <th>NO</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                    </tr>
                    <?php $no=1; foreach($jurusan as $key => $d){ ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['jurusan'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Kelas/Detail/' . $d['id_jurusan']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i> Detail Kelas</a>
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