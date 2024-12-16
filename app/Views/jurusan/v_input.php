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

            <?php echo form_open_multipart('Jurusan/InsertData') ?>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input name="kode_jurusan" class="form-control" placeholder="Kode Jurusan">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input name="jurusan" class="form-control" placeholder="Jurusan">
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('Jurusan') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        </div>
        <!-- /.col-->
