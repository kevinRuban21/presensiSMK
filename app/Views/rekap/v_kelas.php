<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <?= $subjudul ?>
                </h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <h5><?= $jurusan['jurusan'] ?></h5>
                <table class="table table-bordered table-sm">
                    <tr class="text-center bg-light">
                        <th>NO</th>
                        <th>Kelas</th>
                        <th>Daftar Presensi</th>
                    </tr>
                    <?php $no=1; foreach($kelas as $key => $d){ 
                      $db = \Config\Database::connect(); 
                      $jmlh = $db->table('tbl_siswa')
                        ->where('id_kelas', $d['id_kelas'])
                        ->countAllResults();
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $d['kelas'] ?></td>
                            <td class="text-center">
                              <?php if ($jmlh == 0) {
                                
                              } else { ?>
                                <div class="btn-group">
                                    <a href="<?= base_url('DaftarPresensi/Presensi/' . $d['id_kelas']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-table"></i> Lihat Daftar Presensi</a>
                                </div>
                              <?php } ?>            
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