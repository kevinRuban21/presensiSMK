<div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">
                    <?= $subjudul ?><br>
                    <small><span class="text-bold">Jurusan</span> : <?= $jurusan['jurusan'] ?></small>
                </h3>

                <div class="card-tools ms-auto">
                    <a href="<?= base_url('Kelas/TmbhKelas/' . $jurusan['id_jurusan']) ?>" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
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
                <table class="display table table-striped table-hover" id="basic-datatables">
                    <thead>
                        <tr class="text-center bg-light">
                            <th>NO</th>
                            <th>Kelas</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect(); 
                        $no=1; 
                        foreach($kelas as $key => $d){ 
                            $jmlh = $db->table('tbl_siswa')
                                ->where('id_kelas', $d['id_kelas'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['kelas'] ?></td>
                                <td class="text-center">
                                    <span class="badge bg-secondary"><?= $jmlh ?></span><br>
                                    <small><a href="<?= base_url('Kelas/RincianKelas/' . $d['id_kelas']) ?>" class="text-reset">Siswa</a></small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Kelas/EditKelas/' . $jurusan['id_jurusan'] . '/'. $d['id_kelas']) ?>" class="btn btn-warning btn-sm me-2"><i class="icon-pencil"></i></a>
                                        <a href="<?= base_url('Kelas/DeleteData/' . $jurusan['id_jurusan'].'/'. $d['id_kelas']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
    $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });
    });
</script>
        