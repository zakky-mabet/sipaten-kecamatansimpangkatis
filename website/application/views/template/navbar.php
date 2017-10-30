<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<body >

  <!-- Container -->
  <div id="container" >

    <!-- Start Header -->
    <div class="hidden-header"></div>
    <header class="clearfix">

      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <!-- Start Contact Info -->
              <ul class="contact-details">
                <li><a href="#" class="show-info-kecamatan" data-toggle="tooltip" data-placement="top" title="Alamat"><i class="fa fa-map-marker"></i> <?php echo $this->setting->get('alamat'); ?></a>
                </li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> <?php echo $this->setting->get('email'); ?></a>
                </li>
                <li><a href="#"><i class="fa fa-phone"></i> <?php echo $this->setting->get('telepon'); ?></a>
                </li>
              </ul>
              <!-- End Contact Info -->
            </div>
           
          </div>
        </div>
      </div>
      <!-- End Top Bar -->

      <!-- Start Header ( Logo & Naviagtion ) -->
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a  class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-responsive pad-header" alt="logo website kec.koba" width="160"  src="<?php echo base_url('assets') ?>/images/<?php echo $this->setting->get('logo-header'); ?>"></a>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Stat Search -->
            <div class="search-side">
              <a class="show-search"><i class="fa fa-search"></i></a>
              <div class="search-form">
                <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                  <input type="text" value="" name="s" id="s" placeholder="Search the site...">
                </form>
              </div>
            </div>
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url() ?>">Beranda</a></li>
              <li>
                <a href="<?php echo base_url('#') ?>">Profil</a>
                <ul class="dropdown">
                <?php foreach ($this->setting->menu_tentang_kami() as $key => $value): ?>
                   <li><a href="<?php echo base_url('profil/get/'.$value->slug) ?>"><?php echo $value->title ?></a></li>
                <?php endforeach ?>
                  
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Kelurahan/Desa</a>
                <ul class="dropdown">
                  
                  <?php foreach ($this->setting->menu_kelurahan_desa() as $key => $value): ?>
                       <li><a href="<?php echo base_url('kelurahan-desa/get/'.$value->slug) ?>"><?php echo $value->nama_desa ?></a></li>
                  <?php endforeach ?>

                </ul>

              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Organisasi Kemasyarakat</a>
                <ul class="dropdown">
                <?php foreach ($this->setting->menu_organisasi_kemasyarakatan() as $key => $value): ?>
                   <li><a href="<?php echo base_url('organisasi-kemasyarakatan/get/'.$value->slug) ?>"><?php echo $value->title ?></a></li>
                <?php endforeach ?>
                  
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Publikasi</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('berita') ?>">Berita</a></li>
                  <li><a href="<?php echo base_url('events') ?>">Events</a></li>
                  <li><a href="<?php echo base_url('album') ?>">Album Galeri</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Data</a>
                <ul class="dropdown">
                 <?php foreach ($this->setting->menu_data() as $key => $value): ?>
                       <li><a href="<?php echo base_url('data/get/'.$value->slug) ?>"><?php echo $value->title ?></a></li>
                  <?php endforeach ?>
                   <li><a href="<?php echo base_url('data-pembangunan') ?>">Pembangunan</a></li>
                </ul>
              </li>
                <li>
                <a href="<?php echo base_url('download') ?>">Download</a>
                <ul class="dropdown">

                  <?php foreach ($this->setting->menu_download() as $key => $value): ?>
                  
                       <li><a href="<?php echo base_url('download/?kategori='.$value->slug) ?>"><?php echo $value->nama_kategori ?></a></li>
                  
                  <?php endforeach ?>
                
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Layanan</a>
                <ul class="dropdown">
                  <li><a target="_blank" href="http://kecamatansimpangkatis.com">Sistem SIMKIS</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
          <li><a href="<?php echo base_url() ?>">Beranda</a></li>
              <li>
                <a href="<?php echo base_url('#') ?>">Profil</a>
                <ul class="dropdown">
                <?php foreach ($this->setting->menu_tentang_kami() as $key => $value): ?>
                   <li><a href="<?php echo base_url('profil/get/'.$value->slug) ?>"><?php echo $value->title ?></a></li>
                <?php endforeach ?>
                  
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Kelurahan/Desa</a>
                <ul class="dropdown">
                  
                  <?php foreach ($this->setting->menu_kelurahan_desa() as $key => $value): ?>
                       <li><a href="<?php echo base_url('kelurahan-desa/get/'.$value->slug) ?>"><?php echo $value->nama_desa ?></a></li>
                  <?php endforeach ?>

                </ul>

              </li>
               <li>
                <a href="<?php echo base_url('#') ?>">Organisasi Kemasyarakat</a>
                <ul class="dropdown">
                <?php foreach ($this->setting->menu_organisasi_kemasyarakatan() as $key => $value): ?>
                   <li><a href="<?php echo base_url('organisasi-kemasyarakatan/get/'.$value->slug) ?>"><?php echo $value->title ?></a></li>
                <?php endforeach ?>
                  
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Publikasi</a>
                <ul class="dropdown">
                  <li><a href="<?php echo base_url('berita') ?>">Berita</a></li>
                  <li><a href="<?php echo base_url('events') ?>">Events</a></li>
                  <li><a href="<?php echo base_url('album') ?>">Album Galeri</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Data</a>
                <ul class="dropdown">
                   
                 <?php foreach ($this->setting->menu_data() as $key => $value): ?>
                       <li><a href="<?php echo base_url('data/get/'.$value->slug) ?>"><?php echo $value->title ?></a></li>
                  <?php endforeach ?>
                  
                </ul>
              </li>
                <li>
                <a href="<?php echo base_url('download') ?>">Download</a>
                <ul class="dropdown">

                  <?php foreach ($this->setting->menu_download() as $key => $value): ?>
                  
                       <li><a href="<?php echo base_url('download/?kategori='.$value->slug) ?>"><?php echo $value->nama_kategori ?></a></li>
                  
                  <?php endforeach ?>
                
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('#') ?>">Layanan</a>
                <ul class="dropdown">
                  <li><a target="_blank" href="http://kecamatankoba.net">Sistem KISS</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header ( Logo & Naviagtion ) -->

    </header>
    <!-- End Header -->
<?php  
/* End of file navbar.php */
/* Location: ./application/modules/Akademik/views/template/navbar.php */
?>

