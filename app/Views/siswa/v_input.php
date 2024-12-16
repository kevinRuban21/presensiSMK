<div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>
            <div class="card-body">
            <?php
              if(session()->get('error')){
                echo '<div class="alert alert-info" role="alert">';
                echo session()->get('error');
                echo '</div>';
              }
           ?>
            <form id="input_siswa_form" action="#" method="post">
                <div class="form-group">
                    <label>NIPD</label>
                    <input name="nipd" class="form-control" placeholder="NIPD">
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <input name="nisn" class="form-control" placeholder="NISN">
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input name="nama_siswa" class="form-control" placeholder="Nama Siswa">
                </div>
                <div class="form-group">
                        <label>Jurusan</label>
                        <select name="id_jurusan" class="form-control">
                            <option value="">--Pilih jurusan--</option>
                            <?php foreach ($jurusan as $key => $k) { ?>
                                <option value="<?= $k['id_jurusan'] ?>"><?= $k['jurusan'] ?></option>
                            <?php }  ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Nama Orang Tua</label>
                    <input name="nama_ortu" class="form-control" placeholder="Nama Orang Tua">
                </div>
                <div class="form-group">
                    <label>No Telepon Orang Tua</label>
                    <input name="telp_ortu" class="form-control" placeholder="No Telepon Orang Tua">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
                <a href="<?= base_url('Siswa') ?>" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-->

        <script>
          $(document).ready(function() {
            $('#input_siswa_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('Siswa/InsertData') ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan:',
                                html: '<ul>' +
                                    $.map(response.errors, function(value, index) {
                                        return '<li>' + value + '</li>';
                                    }).join('') +
                                    '</ul>'
                            });
                        } else {
                            window.location.href = '<?= base_url('Siswa') ?>';
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil disimpan!',
                                timer: 700,
                            });
                        }
                    }
                });
            });
        });

        
    </script>
