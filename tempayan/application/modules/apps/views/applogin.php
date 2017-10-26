<!DOCTYPE html>
<html lang="id_ID">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#ef6c00">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo $title; ?> | Aplikasi Verifikator Tempayan Koba</title>
	<link rel="stylesheet" href="<?php echo base_url("public/android/css/materialize.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/android/css/login-mobile.css") ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 	<link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
 	<link rel="stylesheet" href="<?php echo base_url("public/ionicons/css/ionicons.min.css"); ?>">
 	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/animate.min.css"); ?>">
</head>
<body>
    <section class="content">
 	<div class="row">
    <form class="col s12" action="<?php echo current_url() ?>" style="margin-top: 15%;" method="post">
    	<div class="row center-align">
			<img src="<?php echo base_url("public/android/images/logo-login.png"); ?>" alt="logo Tempayan">
    	</div>
      	<div class="row">
            <?php if($this->session->flashdata('andlogin')) : ?>
            <div class="input-field col s12 ">
                <div class="card-panel red darken-3">
                    <span class="white-text">Maaf! Kombinasi NIK dan Password tidak cocok. </span>
                </div>
            </div>
            <?php endif; ?>
        	<div class="input-field col s12 ">
          		<i class="material-icons prefix white-text">account_circle</i>
          		<input name="nik" id="icon_prefix" type="text" class="white-text">
                   <label for="icon_prefix">NIK</label>
                   <?php echo form_error('nik', '<small class="white-text">', '</small>'); ?>
        	</div>
        	<div class="input-field col s12 ">
          		<i class="material-icons prefix white-text">vpn_key</i>
          		<input name="password" id="icon_telephone" type="password" class="white-text">
          		<label for="icon_telephone">Password</label>
                <?php echo form_error('password', '<small class="white-text">', '</small>'); ?>
        	</div>
        	<div class="input-field col s12">
		  		<button id="cek-login" class="btn waves-effect btn-large orange accent-2 waves-light" type="submit" name="action">
		  			MASUK
		  		</button>
        	</div>
      	</div>
    	</form>
    	<div class="col s12 box-footer">
            <p>Hak Cipta &copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Koba, Kab. Bangka Tengah <br>All rights reserved <br> Develop By <a class="white-text" href="http://teitramega.co.id" target="_blank">Teitra Mega</a>.<p>
    	</div>
  	</div>
    </section>
	<script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
	<script src="<?php echo base_url("public/android/js/materialize.min.js"); ?>"></script>
</body>
</html>