<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/style-kiosk.css"); ?>">
 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/ionicons/css/ionicons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/AdminLTE.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/animate.min.css"); ?>">  
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url("public/image/{$this->option->get('small_logo')}"); ?>"/>
    <script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>
	<link href="https://fonts.googleapis.com/css?family=Carter+One|Squada+One|Averia%20Sans%20Libre|Viga" rel="stylesheet">

   <script type="text/javascript"> 
      var base_url   = '<?php echo site_url(); ?>';
      var base_path  = '<?php echo base_url('public'); ?>';
      var current_url = '<?php echo current_url(); ?>';

   </script>
  	<style>
	.name-system { 
		font-family: 'Viga', sans-serif; 
		font-size: 4em; 
		line-height: 1.5em;
	    -webkit-text-stroke: 1px black;
	    color: #BBF1B4;
	    text-shadow:
        3px 3px 0 #686551,
        -1px -1px 0 #686551,  
        1px -1px 0 #686551,
        -1px 1px 0 #686551,
        1px 1px 0 #686551; 
	}
	div.col-xs-2 > h4 { 
		font-family: 'Squada One', cursive; color: white; font-size: 2.2em; 
	   color: white;
	   text-shadow:
       2px 2px 0 #000,
      -1px -1px 0 #000,  
      1px -1px 0 #000,
      -1px 1px 0 #000,
       1px 1px 0 #000; 
	}
	div.col-xs-2 > a:focus { outline:none !important; } 
	.top-10 {
		margin-top: 50px;
	}
	/** CSS **/

	.clicky {
	  /** Offset the Position **/
	  position: relative;
	  top: 0;
	  margin-top: 0;
	  margin-bottom: 10px;
		margin-top: -40px;
	  /** 3D Block Effect **/
	  box-shadow: 0 10px 0 0 #57AB58;

	  /** Make it look pretty **/
	  display: block;
	  background: #98E070;
	  color: #eee;
	  padding: 1em 2em;
	  border: 0;
	  cursor: pointer;
	  font-size: 1.2em;
	  opacity: 0.9;
	  height: 350px;
	  border-radius: 100%;
	}

	.clicky:active {
	  /** Remove 3D Block Effect on Click **/
	  box-shadow: none;
	  top: 10px;
	  margin-bottom: 0;
	}

	.clicky:hover {
	  opacity: 1;
	 
	}

	.clicky:active,
	.clicky:focus {
	  /** Remove Chrome's Ugly Yellow Outline **/
	  outline: 0;
	}

  	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 pull-right">
				<img src="<?php echo base_url("public/image/teitra.png"); ?>" alt="">
			</div>
			<div class="col-xs-3 pull-right text-center" style="padding-left:45px;border-right: 2px solid #9F9465;">
				<img src="<?php echo base_url("public/image/logo-antrian.png"); ?>" alt="" width="250">
			</div>
			<div class="col-xs-10 top-10 text-center">
				<span class="name-system">Silahkan Ambil Nomor Antrian Anda !</span>
			</div>
			<div class="col-md-6 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
		</div>
	  	<div class="row top text-center" style="margin-left: -30px;">
	  		<div class="col-xs-4 col-xs-offset-3">

		       <a href="<?php echo site_url('queue/get/'); ?>">
		        <button class="clicky btn-block ">
					<i class="fa fa-users" style="font-size: 5em; color:#4D9C56 "></i>
					<p style="font-size: 1.6em; font-family:sans-serif; font-weight: 600; color:white ">Ambil Antrian</p>
		        </button>
		       </a>
	  		</div>
	  	</div>
	</div>
	
<script>
	 setTimeout(function () {
     $('.alert').remove();
 	}, 5500);
</script>
</body>
</html>
