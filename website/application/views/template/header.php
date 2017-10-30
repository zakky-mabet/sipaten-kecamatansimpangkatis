<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="id">
<head>
  <title><?php echo (isset($title) ? $title.' - '.$this->setting->get('nama-website') : $this->setting->get('nama-website')) ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="<?php echo (isset($title) ? $title.' - '.$this->setting->get('nama-website') : $this->setting->get('nama-website')) ?>" />
  <meta name="description" content="<?php echo (isset($title) ? $title.' - '.$this->setting->get('nama-website') : $this->setting->get('nama-website')) ?>" />
  <meta name="author" content="Teitramega Pangkalpinang Bangka">
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/asset/css/bootstrap.min.css" type="text/css" media="screen">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images') ?>/<?php echo $this->setting->get('logo-favicon'); ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/font-awesome.min.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/slicknav.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/animate.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/css/colors/green.css" title="green" media="screen" />
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.migrate.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/modernizrr.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.appear.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/count-to.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.textillate.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.lettering.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.parallax.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.slicknav.js"></script>
  <style type="text/css" media="screen">
    .pad-header { padding-top: -100px; }
    .border { border: 1pt solid black }
    .footer-foto { font-style: italic; font-weight: 600 }
    .limit-height { min-height: 400px; }
    .kapital { text-transform: capitalize }
    .text-red { color: red } 
  </style> 
</head>
<?php
/* End of file header.php */
/* Location: ./application/views/template/header.php */