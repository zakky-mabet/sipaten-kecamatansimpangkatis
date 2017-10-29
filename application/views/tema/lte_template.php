<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>  <?php echo (isset($data['title']) ? $data['title'] : "SIMKIS Kecamatan Simpangkatis Kabupaten Bangka Tengah") ?></title>
  <meta name="author" content="Cv. Teitra Mega">
  <meta name="theme-color" content="#0AA658">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="png/jpg" href="<?php echo base_url() ?>assets/img/favicon-title.png">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/animate.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/stule.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/tempayan_skin.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/morris/morris.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/light-box/ekko-lightbox.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/light-box/ekko-lightbox.min.css.map'); ?>">
  <style type="text/css" media="screen">
    .border { border: 1pt solid #000; }
    .top-mar { margin-top:20px;  }
  </style>
  <?php  if ($this->agent->is_mobile()) {  ?>
    <style type="text/css">
       body { 
      background-image: url('<?php echo base_url() ?>assets/img/bg-big-mobile.jpg') ;
      background-attachment: fixed;
      background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
     } 
    </style>
  <?php } else { ?>
      <style type="text/css">
     body { 
    background-image: url('<?php echo base_url() ?>assets/img/bg-big-any.jpg') ;
    background-attachment: fixed;
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
   } 
  </style>
  <?php } ?>
</head>
<body  class=" hold-transition narrow primary-tempayan   <?php echo ($this->agent->is_mobile()) ? '' :'';?>  layout-top-nav">
<div class="wrapper">
  <?php  if ($this->agent->is_mobile()) {  ?>
  <header class="main-header" >
 <nav class="navbar  navbar-fixed-top pad10 gradient" style="border-bottom: 1.2pt solid yellow; box-shadow: 5px 0px 5px">
      <div class="container">
        <div class="navbar-header">
          <div>
          <a href="<?php echo base_url(); ?>"><div style="float: left; margin-top: 3px;">
            <img  src="<?php echo base_url()?>assets/img/color-logo.png" alt="Logo Bangka Tengah">
          </div></a>
          <div style="float: left; margin-top: 3px;">  
              <b class="sim" style="letter-spacing: 5px;  
              -webkit-text-stroke-width: 1px;
              -webkit-text-stroke-color: green;">&nbsp;SIMKIS</b>
              <br> 
              <div style="margin-top: -10px; font-size: 0.8em;" class="white">&nbsp;&nbsp;&nbsp;&nbsp; Simpangkatis District Information  <!--And  Service Center  --></div>
          </div>

          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
             <li class="color-black " ><a href="<?php echo base_url()?>" class=" fontmenu "><span class="fa fa-home "></span> Beranda</a></li>
                <?php  
              if ( $this->session->userdata('user_login') == FALSE ) : ?>
               <li><a href="<?php echo base_url()?>login" class=" fontmenu "><span class="fa fa-sign-in"></span> Login</a></li>
                <li><a href="<?php echo base_url()?>daftar" class=" fontmenu "><span class="fa fa-plus-circle"></span> Daftar</a></li>
             <?php endif;
             ?>
                 <?php 
              if ( $this->session->userdata('user_login') == TRUE ) : ?>
            <li><a href="<?php echo base_url('epelayanan')?>" class=" fontmenu "><span class="fa fa-internet-explorer"></span> - Pelayanan</a></li>
            <li><a href="<?php echo base_url('epengaduan')?>" class=" fontmenu "><span class="fa fa-internet-explorer"></span> - Pengaduan</a></li>
            <li><a href="<?php echo base_url('epenilaian')?>" class=" fontmenu "><span class="fa fa-internet-explorer"></span> - Penilaian</a></li>
            <li class="dropdown">
                <a href="#" class=" fontmenu dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-history"></span> Riwayat <span class="caret"></span></a>
                <ul class="dropdown-menu white"  style="padding: 10px;  border: none; background: #149848; ">
                  <li style="padding: 5px; color: white;"><a href="<?php echo base_url('epengaduan/histori')?>" class="white fontmenu "></span><span style="color: white">Pengaduan</span></a></li>
                  <li style="padding: 5px;"><a href="<?php echo base_url('epelayanan/histori')?>" class="white fontmenu "><span style="color: white">Pelayanan</span></a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class=" fontmenu dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> Akun <span class="caret"></span></a>
                <ul class="dropdown-menu white"  style="padding: 10px;  border: none; ">
                  <li style="padding: 5px;" class="white"><a href="<?php echo base_url('profil')?>" class="white fontmenu "><span class="fa fa-user"></span> Profil</a></li>
                  <li style="padding: 5px;"><a href="<?php echo base_url()?>login/signout" class="white fontmenu "><span class="fa fa-sign-out"></span>Keluar</a></li>
                </ul>
              </li>



             <?php endif;
             ?> 

          </ul>
        </div>
         <?php 
        if ( $this->session->userdata('user_login') == TRUE ) : ?>
        <div class="navbar-custom-menu pad10  ">
          <ul class="nav navbar-nav">
          <?php 
          $id = $this->session->userdata('akun_id');
          $query2 = $this->db->query("SELECT * FROM epengaduan WHERE ID_users='$id' AND status_pesan='yes'  ORDER BY approve_tgl DESC");
          $num = $query2->num_rows();
          $result = $query2->result()
           ?>
           <?php if ($num == 0) {} else {?>

            <!-- Messages pengaduan-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                <i class="white fa fa-bullhorn"></i>
                <span class=" label label-success"><?php echo $num ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"><?php echo $num ?> pesan pengaduan terverifikasi </li>
                <li>
                <?php foreach ($result as $value) { ?>

                  <ul class="menu">
                    <li>
                      <a href="<?php echo base_url('epengaduan/see/'.$value->ID); ?>">
                        <div class="pull-left">
                         
                        </div>
                        <h4 class="text-orange">
                          <?php echo $value->ID_pengaduan ?>
                        </h4>
                        <p><?php echo substr($value->judul, 0,29).'...'  ?></p>
                      </a>
                    </li>
                  </ul>
                  <?php } ?>
                </li>
                <li class="footer"><a href="<?php echo base_url('epengaduan/histori/') ?>">Lihat semua pesan</a></li>
              </ul>
            </li>
            <?php } ?>

            <?php 
          $id = $this->session->userdata('akun_id');
          $surat = $this->db->query("SELECT * FROM surat WHERE ID_users='$id' AND status='yes'  ORDER BY waktu_selesai DESC");
          $total = $surat->num_rows();
          $result = $surat->result()
           ?>
           <?php if ($total == 0) {} else {?>

            <!-- Messages surat-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                <i class="white fa fa-envelope"></i>
                <span class=" label label-success"><?php echo $total ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"><?php echo $total ?> pesan pengaduan terverifikasi </li>
                <li>
                <?php foreach ($result as $value) { ?>

                  <ul class="menu">
                    <li>
                      <a href="<?php echo base_url('epelayanan/see/'.$value->ID); ?>">
                        <div class="pull-left">
                         
                        </div>
                        <h4 class="text-orange">
                          <?php echo $value->ID_pelayanan ?>
                        </h4>
                      </a>
                    </li>
                  </ul>
                  <?php } ?>
                </li>
                <li class="footer"><a href="<?php echo base_url('epelayanan/histori/') ?>">Lihat semua pesan</a></li>
              </ul>
            </li>
            <?php } ?>

           <?php 
              $param = $this->session->userdata('akun_id'); 
              $CI =&get_instance();
              $CI->load->model('makun');
              $res=$CI->makun->getAll($param)->result_array();  
              foreach ($res as $get) { }          
             ?>
            <!-- User Account Menu -->
            <li class="dropdown  user-menu ">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url()?>assets/img/img-user/<?php if ($get['photo']==NULL) { echo "avatar.jpg"; } else { echo $get['photo']; } ?> " class="user-image" alt="User Image">
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header biru">
                  <img src="<?php echo base_url()?>assets/img/img-user/<?php if ($get['photo']==NULL) { echo "avatar.jpg"; } else { echo $get['photo']; } ?>" class="img-circle" alt="User Image">
                  <p class="kapital">
                    <?php echo $get['nama_lengkap'] ?>  
                    <small><?php echo $get['email'] ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo site_url('profil') ?>" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo site_url('login/signout') ?>" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </nav>
  </header> 
 <?php } else { ?> 
     <header class="main-header  " >
    <nav class="navbar navbar-fixed-top gradient" style="border-bottom: 1.2pt solid yellow; box-shadow: 5px 0px 5px" >
      <div class="container">
        <div class="navbar-header">
          <div>
          <a href="<?php echo base_url(); ?>"><div style="float: left; margin-top: 3px;">
            <img  src="<?php echo base_url()?>assets/img/color-logo.png" alt="Logo Bangka Tengah">
          </div></a>
          <div style="float: left; margin-top: 3px;">  
              <b class="sim" style="letter-spacing: 4px;  
              -webkit-text-stroke-width: 1px;
              -webkit-text-stroke-color: green;">&nbsp;SIMKIS</b>
              <br> 
              <div style="margin-top: -10px; font-size: 0.9em;" class="white">&nbsp;&nbsp;&nbsp;&nbsp; Simpangkatis District Information  And Service Center</div>
          </div>  
          </div>
        </div>
       <div class="navbar navbar-btn ">
              <ul class="nav navbar-nav navbar-right" style="background-color:; border-radius: 5px 5px 5px 5px;">
                <li class="color-black " ><a href="<?php echo base_url()?>" class=" fontmenu "><span class="fa fa-home "></span> Beranda</a></li>
                <?php  
              if ( $this->session->userdata('user_login') == FALSE ) : ?>
               <li><a href="<?php echo base_url()?>login" class=" fontmenu "><span class="fa fa-sign-in"></span> Login</a></li>
                <li><a href="<?php echo base_url()?>daftar" class=" fontmenu "><span class="fa fa-plus-circle"></span> Daftar</a></li>
             <?php endif;
             ?>
                 <?php 
              if ( $this->session->userdata('user_login') == TRUE ) : ?>
            <li><a href="<?php echo base_url('epelayanan')?>" class=" fontmenu "><span class="fa fa-internet-explorer"></span> - Pelayanan</a></li>
            <li><a href="<?php echo base_url('epengaduan')?>" class=" fontmenu "><span class="fa fa-internet-explorer"></span> - Pengaduan</a></li>
            <li><a href="<?php echo base_url('epenilaian')?>" class=" fontmenu "><span class="fa fa-internet-explorer"></span> - Penilaian</a></li>
            <li class="dropdown">
                <a href="#" class=" fontmenu dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-history"></span> Riwayat <span class="caret"></span></a>
                <ul class="dropdown-menu white"  style="padding: 10px;  border: none; background: #149848; ">
                  <li style="padding: 5px; color: white;"><a href="<?php echo base_url('epengaduan/histori')?>" class="white fontmenu "></span><span style="color: white">Pengaduan</span></a></li>
                  <li style="padding: 5px;"><a href="<?php echo base_url('epelayanan/histori')?>" class="white fontmenu "><span style="color: white">Pelayanan</span></a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class=" fontmenu dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> Akun <span class="caret"></span></a>
                <ul class="dropdown-menu white"  style="padding: 10px;  border: none; ">
                  <li style="padding: 5px;" class="white"><a href="<?php echo base_url('profil')?>" class="white fontmenu "><span class="fa fa-user"></span> Profil</a></li>
                  <li style="padding: 5px;"><a href="<?php echo base_url()?>login/signout" class="white fontmenu "><span class="fa fa-sign-out"></span>Keluar</a></li>
                </ul>
              </li>

              <?php 
          $id = $this->session->userdata('akun_id');
          $query2 = $this->db->query("SELECT * FROM epengaduan WHERE ID_users='$id' AND status_pesan='yes'  ORDER BY approve_tgl DESC");
          $num = $query2->num_rows();
          $result = $query2->result()
           ?>
           <?php if ($num == 0) {} else {?>

            <!-- Messages pengaduan-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                <i class="white fa fa-bullhorn"></i>
                <span class=" label label-success"><?php echo $num ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"><?php echo $num ?> pesan pengaduan terverifikasi </li>
                <li>
                <?php foreach ($result as $value) { ?>

                  <ul class="menu">
                    <li>
                      <a href="<?php echo base_url('epengaduan/see/'.$value->ID); ?>">
                        <div class="pull-left">
                         
                        </div>
                        <h4 class="text-orange">
                          <?php echo $value->ID_pengaduan ?>
                        </h4>
                        <p><?php echo substr($value->judul, 0,29).'...'  ?></p>
                      </a>
                    </li>
                  </ul>
                  <?php } ?>
                </li>
                <li class="footer"><a href="<?php echo base_url('epengaduan/histori/') ?>">Lihat semua pesan</a></li>
              </ul>
            </li>
            <?php } ?>

            <?php 
          $id = $this->session->userdata('akun_id');
          $surat = $this->db->query("SELECT * FROM surat WHERE ID_users='$id' AND status='yes'  ORDER BY waktu_selesai DESC");
          $total = $surat->num_rows();
          $result = $surat->result()
           ?>
           <?php if ($total == 0) {} else {?>

            <!-- Messages surat-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                <i class="white fa fa-envelope"></i>
                <span class=" label label-success"><?php echo $total ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header"><?php echo $total ?> pesan pengaduan terverifikasi </li>
                <li>
                <?php foreach ($result as $value) { ?>

                  <ul class="menu">
                    <li>
                      <a href="<?php echo base_url('epelayanan/see/'.$value->ID); ?>">
                        <div class="pull-left">
                         
                        </div>
                        <h4 class="text-orange">
                          <?php echo $value->ID_pelayanan ?>
                        </h4>
                      </a>
                    </li>
                  </ul>
                  <?php } ?>
                </li>
                <li class="footer"><a href="<?php echo base_url('epelayanan/histori/') ?>">Lihat semua pesan</a></li>
              </ul>
            </li>
            <?php } ?>

             <?php endif;
             ?>
              </ul>
        </div> 
      </div>
    </nav>
  </header> 
 <?php } ?>
  <div class="content-wrapper ">
    <section class="content ">
      <?php $this->load->view($view, $data); ?>
    </section>
  </div>
  <footer class="main-footer pading clearfix ">
    <div class="container color-black padbottom">
        <div class="col-md-6">   
        <?php date_default_timezone_set("Asia/Bangkok"); ?>
       Copyright <?php $thn = ( date('Y') == 2017 ) ? date('Y') : '2017-'.date('Y'); echo '&copy; '.$thn; ?> <span>Kec.Simpangkatis Bangka Tengah</span> 
        <br>
          <p style="margin:-6px; font-size:0.8em; line-height: 20px">&nbsp;&nbsp;<?php echo ($this->agent->is_mobile()) ? '' :'Developed by : <a href="https://www.facebook.com/teitramega">CV. Teitra Mega</a>';?></p>
          <p style="margin:-6px; font-size:0.8em; line-height: 20px">&nbsp;&nbsp;<?php echo ($this->agent->is_mobile()) ? 'Developed by : <a href="https://www.facebook.com/teitramega"> CV. Teitra Mega</a>' :'';?></p>
            <p class="footer" style="margin:-6px; font-size:0.8em; line-height: 20px">&nbsp;&nbsp;Halaman diberikan dalam <strong>{elapsed_time}</strong> detik. </p>
        </div>  
        <div class="col-md-6">
             <div class="text-right <?php echo ($this->agent->is_mobile()) ? 'pull-left top-mar' : '';?>">
                <a class="btn btn-social-icon btn-facebook btn-circle"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-instagram "><i class="fa fa-instagram"></i></a>
                <a class="btn btn-social-icon btn-twitter "><i class="fa fa-twitter"></i></a>
              </div>
        </div>
    </div>   
  </footer>
</div>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/daterangepicker/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sticky/jquery.sticky.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/light-box/ekko-lightbox.min.js'); ?>"></script>
    <script>
      var base_url = '<?php echo site_url(); ?>';
    </script>
   
    <script type="text/javascript">
      $(document).ready(function() {
        
        $("a#reload-captcha").click(function() {
          $.get("<?php echo base_url("login/captcha_refresh"); ?>", function(data) 
          {
            $('p#text-captcha').html(data);
          });
        });
        
    $('#table-histori').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
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


  

function myneed() {
    var x = document.getElementById("need").value;
    document.getElementById("needed").innerHTML = x;
}
function myneedtanggal() {
    var x = document.getElementById("needtanggal").value;
    document.getElementById("neededtanggal").innerHTML = x;
}
function myneedtanggal1() {
    var x = document.getElementById("needtanggal1").value;
    document.getElementById("neededtanggal1").innerHTML = x;
}
function myneeddesa() {
    var x = document.getElementById("needdesa").value;
    document.getElementById("neededdesa").innerHTML = x;
}
function myneedalamat() {
    var x = document.getElementById("needalamat").value;
    document.getElementById("neededalamat").innerHTML = x;
}

function myneedno_surat() {
    var x = document.getElementById("needno_surat").value;
    document.getElementById("neededno_surat").innerHTML = x;
}
</script>
<!-- light box -->


</body>
</html>
