<!DOCTYPE html>
<html lang="en">
<head>
  	<meta name="robots" content="index, follow"/>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=7">
    
    <title><?php echo $title ?></title>

  	<meta name="language" content="en-EN"/>
  	<meta name="author" content="Vicky Nitinegoro"/>

  	<meta name="description" content="Aplikasi Sistem Informasi Pelayanan Terpadu Kecamatan Koba" />
  	<meta name="keywords" content="aplikasi pelayanan, paten koba"/>

  	<meta property="og:url" content="<?php echo current_url() ?>">
  	<meta property="og:title" content="Tempayan">
  	<meta property="og:site_name" content="Tempayan"/>
  	<meta property="og:type" content="website">
  	<meta property="og:image" content="<?php echo base_url("public/android/images/icon/android-icon-192x192.png") ?>">
  	<meta property="og:description" content="Aplikasi Sistem Informasi Pelayanan Terpadu Kecamatan Koba" />

  	<meta name="twitter:card" content="summary_large_image"/>
  	<meta name="twitter:image" content="<?php echo base_url("public/android/images/icon/android-icon-192x192.png") ?>">
  	<meta name="twitter:site" content="@pecqy"/>
  	<meta name="twitter:creator" content="@pecqy"/>
  	<meta name="twitter:title" content="Tempayan">
  	<meta name="twitter:description" content="Aplikasi Sistem Informasi Pelayanan Terpadu Kecamatan Koba" />

  	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url("public/android/images/icon/apple-icon-57x57.png"); ?>">
  	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url("public/android/images/icon/apple-icon-60x60.png"); ?>">
  	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("public/android/images/icon/apple-icon-72x72.png"); ?>">
  	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("public/android/images/icon/apple-icon-76x76.png"); ?>">
  	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url("public/android/images/icon/apple-icon-114x114.png"); ?>">
  	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("public/android/images/icon/apple-icon-120x120.png"); ?>">
  	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url("public/android/images/icon/apple-icon-144x144.png"); ?>">
  	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url("public/android/images/icon/android-icon-192x192.png"); ?>">
  	<link rel="icon" type="image/png" sizes="80x80" href="<?php echo base_url("public/android/images/icon/favicon-80x80.png"); ?>">
  	<meta name="msapplication-TileColor" content="#ef6c00">
  	<meta name="msapplication-TileImage" content="<?php echo base_url("public/android/images/icon/"); ?>ms-icon-144x144.png">
  	<meta name="theme-color" content="#ef6c00">

  	<link rel="apple-touch-startup-image" href="<?php echo base_url("public/android/images/icon/apple-icon-57x57.png"); ?>">
  
  	<meta name="mobile-web-app-capable" content="yes">
  	<meta name="apple-mobile-web-app-capable" content="yes">
  	<meta name="apple-mobile-web-app-title" content="Tempayan">
  	<meta name="apple-mobile-web-app-status-bar-style" content="black">  
  	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  	<meta name="HandheldFriendly" content="true">

    <link href="<?php echo base_url("public/android/css/style.css"); ?>" type="text/css" rel="stylesheet"/>
    <link href="<?php echo base_url("public/android/css/materialize.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="<?php echo base_url("public/font-awesome/css/font-awesome.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("public/dist/css/animate.min.css"); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="<?php echo base_url("public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
    <script src="<?php echo base_url("public/android/js/materialize.js"); ?>"></script>
    <script src="<?php echo base_url("public/android/js/init.js"); ?>"></script>
    <script type="text/javascript">
        var base_url = '<?php echo site_url('apps/'); ?>',
            base_path  = '<?php echo base_url('public'); ?>';
            current_url = '<?php echo current_url(); ?>';
            my_channel = 'channel-<?php echo $this->session->userdata('account')->nip; ?>'; 
    </script>
    <?php 

    /**
     * Load js from loader core
      *
     * @return CI_OUTPUT
     **/
    if($this->load->get_js_files() != FALSE) : 
        foreach($this->load->get_js_files() as $file) :  
    ?>
    <script src="<?php echo $file; ?>"></script>
    <?php 
        endforeach; 
    endif; 
    ?>
</head>