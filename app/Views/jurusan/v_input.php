<div class="row">
        <div class="card">
            <div class="card-header d-flex">
                <div class="card-title"><?= $submenu ?></div>
            </div>
            <form id="input_jurusan_form" action="#" method="post" autocomplete="off">
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
            <div class="card-action">
              <button type="submit" class="btn btn-secondary">Simpan</button>
              <a href="<?= base_url('Jurusan') ?>" class="btn btn-danger">Kembali</a>
            </div>
            </form>
          </div>
        </div>
        </div>
        

        <script>
          $(document).ready(function() {
            $('#input_jurusan_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('Jurusan/InsertData') ?>',
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
                            window.location.href = '<?= base_url('Jurusan') ?>';
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
