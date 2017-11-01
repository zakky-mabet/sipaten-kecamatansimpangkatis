<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php echo (isset($data['title']) ? $data['title']." - SIMKIS Simpangkatis District Information And Service Center" : "SIMKIS - Kecamatan Simpangkatis Kabupaten Bangka Tengah") ?>
  </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="png/jpg" href="<?php echo base_url() ?>assets/img/favicon-title.png">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/ionicons/css/ionicons.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/skins/tempayan-admin-skin.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-checkbox/awesome-bootstrap-checkbox.min.css ">
  <link rel="stylesheet" href="<?php echo base_url('assets/light-box/ekko-lightbox.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
  <script src="<?php echo base_url('assets') ?>/plugins/heightchart/highcharts.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/heightchart/modules/exporting.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/heightchart/modules/data.js"></script>
  <script src="<?php echo base_url('assets') ?>/plugins/heightchart/modules/drilldown.js"></script>

  <style>
    .content-wrapper { background: #F4F5F7 }
    li > a > i.ion { font-size: 18px; }
    a.link { color:blue; }
    a.link:hover { color:#00C0EF; }
    .mini-font { font-size:0.9em; }
    a.active { font-weight: bold; }
    a { cursor: pointer; }
    div.checkbox, label.checkbox { padding-top:0px; padding-bottom: 0px; }
    .bg-silver { background:rgb(249,250,252); border:#444; }
    .icon-button { font-size: 1.1em; margin: 5px 6px 0px 0px; }
    .text-line { text-decoration: line-through; color: rgb(173,0,0); }
    .kapital { text-transform: capitalize; }
  </style>
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
    <?php date_default_timezone_set("Asia/Bangkok"); ?>
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url('administrator/home'); ?>" class="logo">
      <span class="logo-mini">Admin</span>
      <span class="logo-lg"><b>Administrator</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <?php  if ($this->agent->is_mobile()) :  ?>
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php endif; ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php if($this->db->get_where('epengaduan', array('status_pesan' => 'no'))->num_rows()) : ?>
              <span class="label label-danger"><?php echo $this->db->get_where('epengaduan', array('status_pesan' => 'no'))->num_rows() ?></span>
              <?php endif; ?>
            </a>
            <?php if($this->db->get_where('epengaduan', array('status_pesan' => 'no'))->num_rows()) : ?>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu">
              <?php 
              /**
               * Loop pengaduan beum terbaca
               *
               * @return Loop
               **/
              foreach( $this->db->get_where('epengaduan', array('status_pesan' => 'no'))->result() as $row ) : 
              ?>
                  <li>
                    <a href="<?php echo site_url("administrator/pengaduan/get/{$row->ID}") ?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url("assets/img/epengaduan/{$row->photo}"); ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4><?php echo $row->ID_pengaduan ?>
                        <small>
                          <i class="fa fa-clock-o"></i> 
                          <time class="timeago" datetime="<?php echo $row->create_tgl ?>" title=""><?php echo $row->create_tgl ?></time>
                        </small>
                      </h4>
                      <p><?php echo word_limiter($row->judul, 20) ?></p>
                    </a>
                  </li>
              <?php  
              endforeach;
              ?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo site_url('administrator/pengaduan') ?>">Lihat Semuanya...</a></li>
            </ul>
            <?php  
            endif;
            ?>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" <?php 
                if ($this->user->my_account()->photo == NULL) { ?>
                 <?php echo base_url('assets/img/img-admin/avatar.jpg'); ?>
               <?php }else { 
                 ?>
                 <?php echo base_url('assets/img/img-admin/'.$this->user->my_account()->photo); ?>
                 <?php } ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucfirst($this->user->my_account()->username); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="
                <?php 
                if ($this->user->my_account()->photo == NULL) { ?>
                 <?php echo base_url('assets/img/img-admin/avatar.jpg'); ?>
               <?php }else { 
                 ?>
                 <?php echo base_url('assets/img/img-admin/'.$this->user->my_account()->photo); ?>
                 <?php } ?>
                " class="img-circle" alt="User Image">
                <p>
                  <?php echo ucfirst($this->user->my_account()->username)." <br> ".ucfirst($this->user->my_account()->hak_akses); ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('administrator/login/signout') ?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel" style="background-image:url(<?php echo base_url('assets/img/polygonal1.jpg'); ?>)">
        <div class="pull-left image">
          <img src="<?php 
                if ($this->user->my_account()->photo == NULL) { ?>
                 <?php echo base_url('assets/img/img-admin/avatar.jpg'); ?>
               <?php }else { 
                 ?>
                 <?php echo base_url('assets/img/img-admin/'.$this->user->my_account()->photo); ?>
                 <?php } ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->user->my_account()->username); ?></p>
          <small><?php echo ucfirst($this->user->my_account()->hak_akses); ?></small>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url('administrator/home'); ?>"><i class="fa fa-dashboard"></i> Dashboard </a>
        </li>
        <li>
          <a href="<?php echo site_url('administrator/pengaduan') ?>"><i class="fa fa-bullhorn"></i> Pengaduan 
              <?php if($this->db->get_where('epengaduan', array('status_pesan' => 'no'))->num_rows()) : ?>
              <span class="pull-right-container">
                <span class="label label-danger pull-right">
                  <?php echo $this->db->get_where('epengaduan', array('status_pesan' => 'no'))->num_rows() ?>
                </span>
              </span>
              <?php endif; ?>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('administrator/penduduk') ?>"><i class="fa fa-users"></i> Penduduk </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('administrator/pengaturan') ?>"><i class="fa fa-circle-o"></i> Penguna Sistem</a></li>
          <!--   <li><a href="<?php echo site_url('administrator/pengaturan/widget_pelayanan') ?>"><i class="fa fa-circle-o"></i> Widget Pelayanan</a></li> -->
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
      <section class="content-header">
        <?php 
        /**
         * Generated Page Title
         *
         * @return string
         **/
          echo $this->page_title->show();

        /**
         * Generate Breadcrumbs from library
         *
         * @var string
         **/
          echo $this->breadcrumbs->show(); 
        ?>
      </section>
      <section class="content">
        <?php 
        /**
         * Load dynamic template
         *
         * @return string
         **/
        $this->load->view($view, $this->data); 
        ?>
      </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versi</b>  1.0.0 (Pre Release)
    </div>
    <small>
      Hak Cipta &copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Kec. Simpangkatis, Kab. Simpangkatis All rights reserved. Develop By <a href="http://teitramega.co.id" target="_blank">Teitra Mega</a>.
    <small>
  </footer>

</div>
  <script>
    var base_url = '<?php echo site_url('administrator') ?>';
  </script>
  <script src="<?php echo base_url('assets'); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url('assets'); ?>/plugins/fastclick/fastclick.js"></script>
  <script src="<?php echo base_url('assets'); ?>/dist/js/app.min.js"></script> 
  <script src="<?php echo base_url('assets'); ?>/dist/js/jquery.tableCheckbox.js"></script>
  <script src="<?php echo base_url('assets/light-box/ekko-lightbox.min.js'); ?>"></script>
  <script src="<?php echo base_url("assets/dist/js/jquery.timeago.js") ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/app/administrator.js'); ?>"></script>
  <script src="<?php echo base_url('assets/app/pengatur.js'); ?>"></script>
  

 <script type="text/javascript">
      $(document).ready(function() {
        
        $("a#reload-captcha").click(function() {
          $.get(<?php echo site_url("login/captcha_refresh") ?>, function(data) 
          {
            $('p#text-captcha').html(data);
          });
        });
      });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
     $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
      $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
      $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
     $(".timepicker").timepicker({
       showInputs: false,
      showSeconds: true,
      showMeridian: false,
      defaultTime: false
    }); 
      $(".timepicker-sampai").timepicker({
      showInputs: false,
      showSeconds: true,
      showMeridian: false,
      defaultTime: false
    }); 

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 

     setTimeout(function () {
     $('.alert').remove();
     }, 6900);
    });

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-orange',
      radioClass: 'iradio_minimal-orange'
    });
    $('input[type="checkbox"].minimal-orange, input[type="radio"].minimal-orange').iCheck({
      checkboxClass: 'icheckbox_minimal-orange',
      radioClass: 'iradio_minimal-orange'
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
    });

  $("#fixed").sticky({topSpacing:100});
 function previewFile() {
 var preview = document.querySelector('img#p');
 var file  = document.querySelector('input[type=file]').files[0];
 var reader = new FileReader();
 reader.addEventListener("load", function () {
  preview.src = reader.result;
 }, false);
 if (file) {
  reader.readAsDataURL(file);
 }
}

</script>

</body>
</html>
