
<div class="row">
        <div class="card">
            <div class="card-header d-flex">
                <div class="card-title"><?= $submenu ?></div>
                <div class="card-tools ms-auto">
                    <a href="<?= base_url('Siswa/Input') ?>" class="btn btn-secondary btn-sm">
                        <span class="btn-label">
                          <i class="fa fa-plus"></i>
                        </span>
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
            <?php

                use CodeIgniter\Database\BaseUtils;

                if(session()->get('insert')){
                  echo '<div class="alert alert-primary">';
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
                  echo '<div class="alert alert-primary">';
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
                        <tr>
                          <th width="5px">#</th>
                          <th>NISN</th>
                          <th>NIPD</th>
                          <th>Nama Siswa</th>
                          <th>Kelas / Jurusan</th>
                          <th>QR Code </th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($siswa as $key => $d){ ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nisn'] ?></td>
                            <td><?= $d['nipd'] ?></td>
                            <td><?= $d['nama_siswa'] ?></td>
                            <td><?= $d['kelas'] ?> / <?= $d['jurusan'] ?></td>
                            <?php if($d['qr'] == '') { ?>
                                <td class="text-center">
                                    <a href="<?= base_url('Siswa/GenerateQr/' . $d['id_siswa']) ?>" class="btn btn-secondary btn-sm"><i class="fas fa-qrcode"></i> Generate QR Code</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('Siswa/Edit/' . $d['id_siswa']) ?>" class="btn btn-warning btn-sm my-2"><i class="icon-pencil"></i> Edit</a>
                                    <a href="<?= base_url('Siswa/DeleteData/' . $d['id_siswa']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Hapus</a>
                                </td>
                            <?php } else{ ?>
                                <td class="text-center">
                                    <img src="<?= $d['qr'] ?>" alt="QR Code" width="100">
                                </td>
                                <td>
                                    <a href="<?= base_url('Siswa/KartuSiswa/' . $d['id_siswa']) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-download"></i> Kartu Siswa</a>
                                    <a href="<?= base_url('Siswa/Edit/' . $d['id_siswa']) ?>" class="btn btn-warning btn-sm my-2"><i class="icon-pencil"></i> Edit</a>
                                    <a href="<?= base_url('Siswa/DeleteData/' . $d['id_siswa']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
            