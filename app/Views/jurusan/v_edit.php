<div class="row">
        <div class="card">
            <div class="card-header d-flex">
                <div class="card-title"><?= $submenu ?></div>
            </div>
            <form id="edit_jurusan_form" action="#" method="post" autocomplete="off">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input name="kode_jurusan" value="<?= $jurusan['kode_jurusan'] ?>"  class="form-control">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input name="jurusan" value="<?= $jurusan['jurusan'] ?>" class="form-control">
                </div>
            <div class="card-action">
              <button type="submit" class="btn btn-secondary">Simpan</button>
              <a href="<?= base_url('jurusan') ?>" class="btn btn-danger">Kembali</a>
            </div>
            </form>
          </div>
        </div>
        
        <script>
          $(document).ready(function() {
            $('#edit_jurusan_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('Jurusan/UpdateData/' . $jurusan['id_jurusan']) ?>',
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

        