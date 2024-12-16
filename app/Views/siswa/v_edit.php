<div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>

            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <?php echo form_open_multipart('Siswa/UpdateData/' . $siswa['id_siswa']) ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>NIPD</label>
                    <input name="nipd" value="<?= $siswa['nipd'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nipd') ?></p>
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <input name="nisn" value="<?= $siswa['nisn'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nisn') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_siswa') ?></p>
                </div>
                <div class="form-group">
                    <label>Nama Orang Tua</label>
                    <input name="nama_ortu" value="<?= $siswa['nama_ortu'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('nama_ortu') ?></p>
                </div>
                <div class="form-group">
                    <label>No Telepon Orang Tua</label>
                    <input name="telp_ortu" value="<?= $siswa['telp_ortu'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('telp_ortu') ?></p>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('Siswa') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

       