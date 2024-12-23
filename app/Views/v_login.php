
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presensi | <?= $judul?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('AdminLTE')?>/dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url() ?>/logo2.png" type="image/gif">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-indigo">
    <div class="card-header text-center">
      <img src="<?= base_url('logo2.png') ?>" alt="" width="150"><br>
      <a href="#" class="h1 text-reset text-success"><b>E-Presensi</b></a>
    </div>
    <div class="card-body">

      <?php
      session();
      $validasi = \Config\Services::validation();
      if(session()->get('pesan')){
        echo '<div class="alert alert-danger">';
        echo session()->get('pesan');
        echo '</div>';
      }
      ?>

      <?php echo form_open('Auth/CekLogin') ?>
        <div class="input-group mb-3">
          <input name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <p class="text-danger"><?= $validasi->getError('username') ?></p>
        </div>
        <div class="input-group mb-3">
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <p class="text-danger"><?= $validasi->getError('password') ?></p>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn" style="background-color: #6861ce; color: #fff; width: 500% !important;">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>
  </div>
  <!-- /.card -->
  <div class="card-footer">
    <div class="row">
      <!-- /.col -->
      <div class="col-12 text-center text-secondary">
        <strong>Copyright &copy; 2024 <a href="<?= base_url() ?>" class="text-reset" style="color: #6861ce !important;">SMK Kasih Theresia</a>.</strong> All rights reserved.
      </div>
      <!-- /.col -->
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('AdminLTE')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('AdminLTE')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('AdminLTE')?>/dist/js/adminlte.min.js"></script>
</body>
</html>
