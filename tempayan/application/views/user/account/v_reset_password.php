<html>
<head>
  <title>Reset Password</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
    <style type="text/css">
    .turun {margin-top: 10%;}
    </style>
</head>
<body>
<section class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default turun">
        <div class="panel-heading">
          <img src="<?php echo base_url("public/image/logo/{$this->option->get('logo_login')}"); ?>" class="pull-right" width="200">
          <h3 class="text-danger"><i class="fa fa-key"></i> Reset Password</h3>
        </div>
        <?php echo form_open(current_url()); ?>
        <div class="panel-body">
          <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="">Password :</label>
              <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>">
              <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label for="">Ulangi Password :</label>
              <input type="password" class="form-control" name="passconf" value="<?php echo set_value('passconf') ?>">
              <?php echo form_error('passconf', '<small class="text-danger">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-warning btn-block">Reset Password</button>
          </div>
        </div>
        <?php echo form_close(); ?>
        <div class="panel-footer">
          <small>Powered By :</small>
          <img src="<?php echo base_url("public/image/teitralogo.png") ?>" width="250">
          <a href="http://127.0.0.1/bpn/" class="btn btn-default pull-right"><i class="fa fa-sign-out"></i> Back to application</a>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>