<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rekap Presensi</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-sm">
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
                                    <a href="<?= base_url('DaftarPresensi/Kelas/' . $d['id_jurusan']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i> Kelas</a>
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


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title"><?= $subjudul ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mt-2">
                        <form action="<?= base_url('DaftarPresensi/FilterData') ?>" method="post">
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Filter Data</button>
                        </form>   
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-2 mt-2">
                        <div class="card-tools ms-auto">
                            <a href="<?= base_url('DaftarPresensi/PrintDaftarPresensi') ?>" target="_blank" class="btn btn-secondary btn-sm">
                                <i class="fas fa-print"></i> Print Presensi
                            </a>
                        </div>
                    </div>
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
                            $tglpresensi = date('d F Y', strtotime($d['tgl_presensi']));
                            $angka = date('l', strtotime($d['tgl_presensi']));
                            $hari = [
                                'Monday' => 'Senin',
                                'Tuesday' => 'Selasa',
                                'Wednesday' => 'Rabu',
                                'Thursday' => 'Kamis',
                                'Friday' => 'Jumat',
                                'Saturday' => 'Sabtu',
                                'Sunday' => 'Minggu',
                            ];
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $hari[$angka] ?>, <?= $tglpresensi ?></td>
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