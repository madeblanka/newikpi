<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Notifikasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
</head>
<?php $this->load->view('admin/_partials/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Cover</h3>
            </div>
            <form action="<?= site_url('anggota/adddcover') ?>" method="post" enctype='multipart/form-data'>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cover</label>
                    <input type="file" name="c1">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php $this->load->view('admin/_partials/copyright');?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('admin/dist/js/demo.js') ?>"></script>
<!-- Page specific script -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
</body>

</html>