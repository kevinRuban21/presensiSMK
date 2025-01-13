
<div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-warning bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Siswa</p>
                          <h4 class="card-title"><?= $jmlh_siswa ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-danger bubble-shadow-small"
                        >
                          <i class="fas fa-university"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jurusan</p>
                          <h4 class="card-title"><?= $jmlh_jurusan ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="fas fa-school"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Kelas</p>
                          <h4 class="card-title"><?= $jmlh_kelas ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col">
                      <h3 class="card-title">Data Presensi</h3>
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
</div>
            