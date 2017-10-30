<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login - Website Administrator Kecamatan Koba Kabupaten Bangka Tengah</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?php echo base_url('assets/public/bootstrap/css/bootstrap.min.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/public/font-awesome/css/font-awesome.min.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/public/ionicons/css/ionicons.min.css'); ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/public/dist/css/AdminLTE.css') ?>">
     
     <link rel="icon" type="png/jpg" href="<?php echo base_url() ?>assets/public/image/favicon-title.png">
      <style>
         .login-page { 
            margin-top: 12%;
         height: auto;  
           background: url(<?php echo base_url('assets/public/image/bg-big-any.jpg'); ?>) no-repeat top fixed; 
           -webkit-background-size: cover;
           -moz-background-size: cover;
           -o-background-size: cover;
           background-size: cover;
         }
         input.form-control { border-radius: 5px; font-size: 1.1em; }
         div.login-box-body { border-radius: 10px;  }
         span.form-control-feedback { background-color: #74BF58; color: white; }
         div.has-feedback > span {  top: 0; left: 0; border-radius: 6px 0px 0px 6px;}
         .padd { padding-left: 40px; }
         .arrow-up {
         width: 0; 
         height: 0; 
         margin:0px 0px 0px 45%; 
         border-left: 10px solid transparent;
         border-right: 10px solid transparent;
         border-bottom: 10px solid white;
         }
         button.btn-login { border-radius: 5px; font-weight:bold; background-color:#74BF58; color: white }
         button.btn-login:hover  { background-color: #EF933E; color: white }
         button.btn-login:focus, button.btn-login:active  { 
         color: white;
         }
         .login-logo { margin-bottom:10px; }
         .lockscreen-footer { font-family: 'Arial', sans-serif; color:#74BF58; }
         span.blue-sipaten { color: #0093DD; }
         .text-red { color: red; }
         .captcha > p { font-size:30px; font-family: 'Arial Narrow'; font-weight: bold; text-align: center; letter-spacing: 30px; color: #74BF58;  }
      </style>
   </head>
   <body class="login-page">
<div class="login-box">
   <div class="login-logo">
      <img src="<?php echo base_url("assets/public/image/logo-login.png"); ?>" alt="Logo Sistem">
   </div>
   <div class="arrow-up"></div>
   <div class="login-box-body">
      <?php echo $this->session->flashdata('alert'); ?>
      <form action="<?php echo site_url('administrator/login'); ?>" method="post">
         <div class="form-group has-feedback">
            <span class="glyphicon glyphicon-user form-control-feedback" style="color: white;"></span>
            <input type="text" name="username" class="form-control padd" placeholder="Masukkan Username" value="<?php echo set_value('username'); ?>">
            <?php echo form_error('username', '<small class="text-red">', '</small>'); ?>
         </div>
         <div class="form-group has-feedback">
            <span class="glyphicon glyphicon-lock form-control-feedback" style="color: white;"></span>
            <input type="password" id="login-password" name="password" class="form-control padd" value="<?php echo set_value('password'); ?>" placeholder="Masukkan Password">
              <div class="checkbox checkbox-primary pull-right">
                  <input id="checkbox2" class="styled" type="checkbox" onclick="showpassword()" />
                  <label for="checkbox2">
                      Tampilkan Password
                  </label>
              </div>
            <?php echo form_error('password', '<small class="text-red">', '</small>'); ?>
         </div>
         <div class="form-group" style="margin-top: 30px;">
            <label for="">Kode Captcha :</label>
            <div class="captcha text-center">
               <p id="text-captcha"><?php echo $captcha['word']; ?></p>
            </div>
            <a href="" id="reload-captcha"><small>Refresh Captcha</small></a>
         </div>
         <div class="form-group has-feedback">
            <input type="text" class="form-control" name="captcha" placeholder="Kode Captcha" value="<?php echo set_value('captcha'); ?>">
            <?php echo form_error('captcha', '<small class="text-red">', '</small>'); ?>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <button type="submit" class="btn-login btn btn-block">Masuk</button>
            </div>
         </div>
      </form>
   </div>
   <div class="lockscreen-footer text-center" style="margin-top: 0px; color: #444">
      <small>Hak Cipta &copy; <?php echo date('Y'); ?> <br> Kec. Koba, Kab. Bangka Tengah. All rights reserved.</small>
   </div>
</div>
      <!-- /.login-box -->
      <!-- jQuery 2.2.3 -->
      <script src="<?php echo base_url('assets/public/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="<?php echo base_url('assets/public/bootstrap/js/bootstrap.min.js'); ?>"></script>
      <script type="text/javascript">
         $(document).ready(function() {
            $("button#reload-captcha").click(function() {
               $.get("<?php echo site_url("administrator/login/captcha_refresh"); ?>", function( data ) 
               {
                  $('#text-captcha').html(data);
               });
            });
         });
         function showpassword() {
            var key_attr = $('#login-password').attr('type');
            if(key_attr != 'text') {
               $('#checkbox2').addClass('show');
               $('#login-password').attr('type', 'text');
            } else {
               $('#checkbox2').removeClass('show');
               $('#login-password').attr('type', 'password');
            }
         };
      </script>
   </body>
</html>

