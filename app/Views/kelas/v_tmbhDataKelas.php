<div class="row">
        <div class="card">
            <div class="card-header d-flex">
                <div class="card-title"><?= $submenu ?></div>
            </div>
            <form id="input_kelas_form" action="#" method="post">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" class="form-control" placeholder="Kelas">
                </div>
            <div class="card-action">
              <button type="submit" class="btn btn-secondary">Simpan</button>
              <a href="<?= base_url('Kelas/Detail/'. $jurusan['id_jurusan']) ?>" class="btn btn-danger">Kembali</a>
            </div>
            </form>
          </div>
        </div>
        </div>
        

        <script>
          $(document).ready(function() {
            $('#input_kelas_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('Kelas/InsertData/'. $jurusan['id_jurusan']) ?>',
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
                            window.location.href = '<?= base_url('Kelas/Detail/'. $jurusan['id_jurusan']) ?>';
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
