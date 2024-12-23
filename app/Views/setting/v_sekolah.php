<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <?= $subjudul ?>
              </h3>
            </div>

            <form id="update_sekolah_form" action="#" method="post" autocomplete="off">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kepala Sekolah</label>
                    <input name="kepsek" value="<?= $sekolah['kepsek'] ?>" class="form-control">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
        <!-- /.col-->

        <script>
          $(document).ready(function() {
            $('#update_sekolah_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('Setting/UpdateData') ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan:',
                                html: '<div>' +
                                    $.map(response.errors, function(value, index) {
                                        return '<p>' + value + '</p>';
                                    }).join('') +
                                    '</div>'
                            });
                        } else {
                            window.location.href = '<?= base_url('Setting/Sekolah') ?>';
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil disimpan!',
                                timer: 1000,
                            });
                        }
                    }
                });
            });
        });

        
    </script>