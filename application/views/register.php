<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PERTANIAN</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box" style="width: 40%;">
  <div class="card card-outline card-default">
    <div class="card-header text-center">
      <a class="h1"><b>PERTANIAN</b></a>
    </div>
    <div class="card-body">
      <?php if($this->session->flashdata('message') == 'Email Sudah Terdaftar'){ ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i><?php echo $this->session->flashdata('message');?></h5>
        </div>
      <?php }elseif($this->session->flashdata('message') == 'Email Berhasil Terdaftar'){ ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i><?php echo $this->session->flashdata('message');?></h5>
        </div>
      <?php } ?>
      <form action="<?=site_url('auth/register')?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="koperasi" class="form-control" required placeholder="Nama Koperasi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="ketua" class="form-control" required placeholder="Ketua Koperasi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="alamat" class="form-control" required placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-flag"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="telpon" class="form-control" required placeholder="Kontak">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" minlength="5" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a href="<?php echo base_url('auth/login')?>" class="text-center">Login</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" value="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
