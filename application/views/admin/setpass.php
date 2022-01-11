<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IKPI BALI Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css')?>">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
   <b>IKPI </b>BALI
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Reset Password</p>

      <form action="<?= site_url('anggota/updatepass')?>" method="post" enctype='multipart/form-data'>
      <input type="hidden" value="<?= $anggota->nra?>" name="nra">
      <input type="hidden" value="<?= $anggota->nama?>" name="nama">
      <input type="hidden" value="<?= $anggota->brevet?>" name="brevet">
      <input type="hidden" value="<?= $anggota->sk?>" name="sk">
      <input type="hidden" value="<?= $anggota->kip?>" name="kip">
      <input type="hidden" value="<?= $anggota->alamat?>" name="alamat">
      <input type="hidden" value="<?= $anggota->email?>" name="email">
      <input type="hidden" value="<?= $anggota->notelp?>" name="notelp">
      <input type="hidden" value="<?= $anggota->tampilkanhp?>" name="tampilkanhp">
      <input type="hidden" value="<?= $anggota->profile?>" name="profile">
      <input type="hidden" value="<?= $anggota->created_at?>" name="created_at">
      <input type="hidden" value="<?= $anggota->updated_at?>" name="updated_at">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="row">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Save Password</button>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
