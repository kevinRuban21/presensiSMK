<div class="row">
<div class="col-md-6">
          <div class="card">
            <?php
                session();
                $validasi = \Config\Services::validation(); 
            ?>

            <?php echo form_open_multipart('ProfileAdmin/UpdateFoto') ?>
            <!-- /.card-header -->
            <div class="card-body">
            <?php

                use CodeIgniter\Database\BaseUtils;

                if(session()->get('pesan')){
                echo '<div class="alert alert-primary">';
                echo session()->get('pesan');
                echo '</div>';
                echo '<script>
                    $(document).ready(function(){
                        $(".alert").fadeIn();
                        setTimeout(function(){
                            $(".alert").fadeOut();
                        }, 2000);
                        });
                    </script>';
                }

            ?>
                <div class="form-group">
                    <label>Foto Profil</label><br>
                    <img src="<?= base_url('foto_profil/' . $admin['foto']) ?>" alt="Foto Profil" width="200vh">
                </div>
                <div class="form-group">
                    <label>Ganti Foto Profil</label>
                    <input type="file" accept=".png" name="foto" class="form-control">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
        <!-- /.col-->

        <div class="col-md-6">
          <div class="card">

            <form id="profil_admin_form" action="#" method="post" autocomplete="off">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?= $admin['username'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" value="<?= $admin['password'] ?>" class="form-control">
                    <label for="show_password" class="mt-2">
                        <input type="checkbox" id="show_password">
                        Tampilkan Password
                    </label>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
</div>

        <script>
          $(document).ready(function() {
            $('#profil_admin_form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('ProfileAdmin/UpdateData') ?>',
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
                            window.location.href = '<?= base_url('ProfileAdmin') ?>';
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

    <script>
        const inputPassword = document.getElementById("password")
        const showPassword = document.getElementById("show_password")

        showPassword.addEventListener("input", (e) => {
            if(e.target.checked){
                inputPassword.setAttribute("type", "text");
            }else{
                inputPassword.setAttribute("type", "password");
            };
        })
    </script>