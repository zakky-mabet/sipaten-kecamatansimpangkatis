<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/style-kiosk.css"); ?>">
  	<link rel="stylesheet" href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css"); ?>">
  	<link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
  	<link rel="stylesheet" href="<?php echo base_url("public/dist/css/animate.css"); ?>">  
  	<link href="https://fonts.googleapis.com/css?family=Carter+One|Squada+One|Averia%20Sans%20Libre|Viga" rel="stylesheet">
  	<script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
  	<script src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>
  	<script src="<?php echo base_url("public/plugins/artyom/artyom.min.js"); ?>"></script>
  	<style>
	h1 { 
		font-family: 'Viga', sans-serif; 
		font-size: 4.5em; 
		color: #F6F3E4; 
		line-height: 1.5em;
	   -webkit-text-stroke: 1px black;
	   color: white;
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
  	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 pull-right">
				<img src="<?php echo base_url("public/image/teitra.png"); ?>" alt="">
			</div>
			<div class="col-xs-3 pull-right text-center" style="padding-left:45px;border-right: 2px solid #9F9465;">
				<img src="<?php echo base_url("public/image/logo-login.png"); ?>" alt="" width="250">
			</div>
			<div class="col-xs-10 top text-center">
				<h1><?php echo $this->option->get('pertanyaan_penilaian'); ?></h1>
			</div>
		</div>
	  	<div class="row top text-center" style="margin-left: -30px;">
	  		<div class="col-xs-12">
	  		<?php  
	  		foreach($this->penilaian->get_answers() as $row) :
	  		?>
		    	<div class="col-xs-2 text-center">
		    		<a href="#" class="get-people-modal" data-answer="<?php echo $row->ID; ?>">
		    			<div class="enjoy-css"><img src="<?php echo base_url("public/image/emoji/{$row->icon}"); ?>" width="100" alt=""></div>
		    		</a>
					<h4><?php echo $row->jawaban; ?></h4>
		    	</div>
		    <?php  
		    endforeach;
		    ?>
	  		</div>
	  	</div>
	</div>
	
	<div class="modal animated fadeIn" id="select-name" data-modal-color="lightgreen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-search"></i> Silahkan pilih nama anda!</h4>
				</div>
				<div class="modal-body">
					<ul id="list-people">
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="modal animated fadeIn" id="modal-confirm" data-modal-color="lightgreen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-question-circle"></i> Konfirmasi!</h4>
					<p>Apakah benar Anda bernama <strong id="name-people"></strong> dan baru saja mengajukan Surat <strong id="name-service"></strong> ?</p>
				</div>
				<div class="modal-footer">
					<a data-dismiss="modal" aria-hidden="true" class="btn btn-lg btn-link pull-left"><i class="fa fa-times"></i> Tidak</a>
					<button class="btn btn-lg btn-link send-feedback"><i class="fa fa-check"></i> Benar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal animated fadeIn" id="modal-thank" data-modal-color="lightblue" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close close-thank" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-smile-o"></i> Terima Kasih!</h4>
					<p>Terima Kasih, telah memberikan penilaian kinerja pada petugas kami, apapun jawaban anda akan kami terima sebagai bahan evaluasi.</p>
				</div>
			</div>
		</div>
	</div>
	<script>
	var base_url = '<?php echo base_url('satisfaction') ?>';
	var base_path = '<?php echo base_url(); ?>';
	var textAudio = '<?php echo $this->option->get('audio_speech'); ?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url("public/app/kiosk/main_kiosk.js"); ?>"></script>
</body>
</html>
