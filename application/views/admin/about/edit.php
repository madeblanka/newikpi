<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit About</title>

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
              <h3 class="card-title">Form About</h3>
            </div>
            <form action="<?php echo site_url('anggota/updateabout') ?>" method="post" enctype="multipart/form-data">
                <?php foreach($about as $a):?>
                    <input type="hidden" value="<?= $a->id?>" name="id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Visi</label>
                    <textarea name="visi" value="<?= $a->visi?>" placeholder="<?= $a->visi?>" class="form-control" id="exampleInputPassword1"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Misi</label>
                    <textarea name="misi" class="form-control" value="<?= $a->misi?>" placeholder="<?= $a->misi?>" id="exampleInputPassword1"></textarea>
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sejarah</label>
                    <textarea name="sejarah" class="form-control" value="<?= $a->sejarah?>" placeholder="<?= $a->sejarah?>" id="exampleInputPassword1"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Lainnya *dapat dikosongkan</label>
                    <textarea name="lainnya" value="<?= $a->lainnya?>" placeholder="<?= $a->lainnya?>" class="form-control" id="exampleInputPassword1"></textarea>
                  </div>
                </div>
                <?php endforeach?>
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