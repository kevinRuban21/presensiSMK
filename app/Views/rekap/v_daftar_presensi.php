<div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> <?= $subjudul ?></h3>

                <div class="card-tools">
                    <?php foreach($daftar_presensi as $key => $d){} ?>
                        <a href="<?= base_url('DaftarPresensi/PrintDaftarPresensiKelas/' . $d['id_kelas']) ?>" target="_blank" class="btn btn-info btn-sm">
                            <i class="fas fa-print"></i> Print Presensi
                        </a>   
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="5px">NO</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas / Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1; foreach($daftar_presensi as $key => $d){
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $d['tgl_presensi'] ?></td>
                                <td class="text-center"><?= $d['jam_masuk'] ?></td>
                                <td class="text-center"><?= $d['jam_pulang'] ?></td>
                                <td class="text-center"><?= $d['nipd'] ?></td>
                                <td class="text-center"><?= $d['nisn'] ?></td>
                                <td><?= $d['nama_siswa'] ?></td>
                                <td><?= $d['kelas'] ?> / <?= $d['jurusan'] ?></td>
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
                $("#example1").DataTable({
                "paging": true,
                "searching": true,
                "responsive": true, 
                "lengthChange": true, 
                "autoWidth": false,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>