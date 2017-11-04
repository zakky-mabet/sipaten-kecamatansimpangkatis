<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/style-kiosk.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/style-antrian.css"); ?>">
 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/ionicons/css/ionicons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/AdminLTE.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/animate.min.css"); ?>">  
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url("public/image/{$this->option->get('small_logo')}"); ?>"/>
    <script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/app/kiosk/main_kiosk.js"); ?>"></script>
    <script src="<?php echo base_url("public/app/kiosk/responsivevoice.js"); ?>"></script>
	<link href="https://fonts.googleapis.com/css?family=Carter+One|Squada+One|Averia%20Sans%20Libre|Viga" rel="stylesheet">

   <script type="text/javascript"> 
      var base_url   = '<?php echo site_url(); ?>';
      var base_path  = '<?php echo base_url('public'); ?>';
      var current_url = '<?php echo current_url(); ?>';
   </script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 pull-right">
				<img src="<?php echo base_url("public/image/teitra.png"); ?>" alt="">
			</div>
			<div class="col-xs-3 pull-right text-center" style="padding-left:45px; border-right: 2px solid #9F9465;">
				<img src="<?php echo base_url("public/image/logo-antrian.png"); ?>" alt="" width="250">
			</div>
			<div class="col-xs-10 top-10 text-center">
				<span class="name-system">Silahkan Ambil Nomor Antrian Anda !</span>
			</div>
			<div class="col-md-6 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
		</div>
	  	<div class="row top-button text-center" style="margin-left: -30px;">
	  		<div class="col-xs-4 col-xs-offset-3">

		       <a href="<?php echo site_url('queue/get'); ?>">
		        <button class="clicky btn-block first animated bounceIn btn-print" onclick="playSound();">
					<i class="fa fa-users" style="font-size: 5em; color:#4D9C56 "></i>
					<p style="font-size: 1.6em; font-family:'Viga',sans-serif; font-weight: 600; color:white ">Ambil Antrian</p>
		        </button>
		       </a>
			
	  		</div>
	  	</div>
	</div>
	
	<footer class="footer navbar-fixed-bottom" style="background-color: #68AC4E; " class="fotter-fixed">
			<marquee class="font">Silahkan Tekan Tombol <b>'Ambil Antrian'</b>, tunggu sampai Struk antrian keluar, ambil dan tunggu sesuai dengan nomor antrian Anda. Terima Kasih !</marquee>
	</footer>

  <audio id="audio" src="<?php echo base_url('public/sound/click.wav'); ?>" autostart="false" ></audio>
  <script>
  	$("button").click(function(){
    	$(".first").addClass("bounceOut");
 
	});
  </script>
		
</body>
</html>
