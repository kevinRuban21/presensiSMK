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

            <?php echo form_open('Jurusan/UpdateData/' . $jurusan['id_jurusan']) ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input name="kode_jurusan" value="<?= $jurusan['kode_jurusan'] ?>"  class="form-control">
                    <p class="text-danger"><?= $validasi->getError('kode_jurusan') ?></p>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input name="jurusan" value="<?= $jurusan['jurusan'] ?>" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('jurusan') ?></p>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('jurusan') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

        