<div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">
                    <?= $submenu ?>
                </h3>

                <div class="card-tools ms-auto">
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">

                <table>
                    <tr>
                        <th width='150px'>Kelas</th>
                        <td width='10px'>:</td>
                        <td><?= $kelas['kelas'] ?></td>   
                    </tr>
                    <tr>
                        <th  width='150px'>Jumlah Siswa</th>
                        <td>:</td>
                        <td><?= $jmlh ?></td>
                    </tr>
                </table><br>
                <?php

                    use CodeIgniter\Database\BaseUtils;

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

                <?php if ($siswa_blm == true) { ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center bg-info">
                                <th>NO</th>
                                <th>NIPD</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($siswa_blm as $key => $d){ ?>
                                <?php if ($kelas['id_jurusan'] == $d['id_jurusan']){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $d['nipd'] ?></td>
                                    <td class="text-center">
                                        <?= $d['nisn'] ?>
                                    </td>
                                    <td><?= $d['nama_siswa'] ?></td>
                                    <td><?= $d['jurusan'] ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="<?= base_url('Kelas/TmbhSiswa/' . $d['id_siswa'].'/'. $kelas['id_kelas']) ?>" class="btn btn-success btn-sm mr-2 ml-2"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </td>

                                </tr>
                                <?php }?>
                            <?php } ?>
                        </tbody>
                    </table> <br>
                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <tr class="text-center bg-light">
                            <th>#</th>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th> 
                            <th>Aksi</th>
                        </tr>
                        <?php $no=1; foreach($siswa as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $d['nipd'] ?></td>
                                <td><?= $d['nisn'] ?></td>
                                <td><?= $d['nama_siswa'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Kelas/HpsSiswa/' . $d['id_siswa'].'/'. $kelas['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } else { ?>
                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <tr class="text-center bg-light">
                            <th>#</th>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th> 
                            <th>Aksi</th>
                        </tr>
                        <?php $no=1; foreach($siswa as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $d['nipd'] ?></td>
                                <td><?= $d['nisn'] ?></td>
                                <td><?= $d['nama_siswa'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Kelas/HpsSiswa/' . $d['id_siswa'].'/'. $kelas['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
               
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

        

    