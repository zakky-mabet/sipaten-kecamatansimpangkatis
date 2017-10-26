<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?php echo (!$this->setting->get_admin()->photo) ? base_url("assets/public/image/avatar.jpg") : base_url("assets/public/image/{$this->setting->get_admin()->photo}"); ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p><?php echo $this->session->userdata('account_admin')->nama_lengkap ?></p>
            <small style="text-transform: capitalize;"><?php echo $this->session->userdata('account_admin')->hak_akses ?></small>
         </div>
      </div>
      <ul class="sidebar-menu">
        <li class="<?php echo active_link_controller('home'); ?>">
            <a href="<?php echo site_url('administrator/home') ?>">
               <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
          <?php if ($this->session->userdata('akun_hak_admin') == 'khusus_pembangunan'): ?>
        <li class="<?php echo active_link_controller('data_pembangunan'); ?>">
            <a href="<?php echo site_url('administrator/data_pembangunan') ?>">
               <i class="fa fa-building"></i> <span> Data Pembangunan</span>
            </a>
        </li>

        <?php endif ?>
        <?php if ($this->session->userdata('akun_hak_admin') != 'khusus_pembangunan'): ?>
          
        
        <li class="<?php echo active_link_controller('slider'); ?>">
            <a href="<?php echo site_url('administrator/slider') ?>">
               <i class="fa fa-credit-card"></i> <span> Slider</span>
            </a>
        </li>
        <li class="<?php echo active_link_controller('profil'); ?>">
            <a href="<?php echo site_url('administrator/profil') ?>">
               <i class="fa fa-vcard"></i> <span> Profil</span>
            </a>
        </li>
        <li class="<?php echo active_link_controller('kelurahan'); ?>">
            <a href="<?php echo site_url('administrator/kelurahan-desa') ?>">
               <i class="fa fa-building"></i> <span> Kelurahan/Desa</span>
            </a>
        </li>
         <li class="<?php echo active_link_controller('organisasi'); ?>">
            <a href="<?php echo site_url('administrator/organisasi') ?>">
               <i class="fa fa-building"></i> <span> Organisasi Kemasyarakatan</span>
            </a>
        </li>
        <li class="treeview <?php echo active_link_multiple(array('struktur','pimpinan','aparatur')); ?>">
            <a href="#">
               <i class="fa fa-users"></i> <span> Organisasi</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
        <ul class="treeview-menu">
           <li class="<?php echo active_link_controller('struktur') ?>">
              <a href="<?php echo site_url('administrator/struktur') ?>"><i class="fa fa-angle-double-right"></i> Struktur Organisasi</a>
            </li>
            <li class="<?php echo active_link_controller('pimpinan') ?>">
              <a href="<?php echo site_url('administrator/pimpinan') ?>"><i class="fa fa-angle-double-right"></i> Pimpinan</a>
            </li>
            <li class="<?php echo active_link_controller('aparatur') ?>">
              <a href="<?php echo site_url('administrator/aparatur') ?>"><i class="fa fa-angle-double-right"></i> Aparatur</a>
            </li>
        </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('berita','events','galeri')); ?>">
            <a href="#">
               <i class="fa fa-window-restore"></i> <span> Publikasi</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
        <ul class="treeview-menu">
           <li class="<?php echo active_link_controller('berita') ?>">
              <a href="<?php echo site_url('administrator/berita') ?>"><i class="fa fa-angle-double-right"></i> Berita</a>
            </li>
            <li class="<?php echo active_link_controller('events') ?>">
              <a href="<?php echo site_url('administrator/events') ?>"><i class="fa fa-angle-double-right"></i> Events</a>
            </li>
            <li class="<?php echo active_link_controller('galeri') ?>">
              <a href="<?php echo site_url('administrator/galeri') ?>"><i class="fa fa-angle-double-right"></i> Galeri</a>
            </li>
        </ul>
        </li>

         <li class="treeview <?php echo active_link_multiple(array('album','kategori_berita','tags')); ?>">
            <a href="#">
               <i class="fa fa-cubes"></i> <span> Master Data</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
        <ul class="treeview-menu">
           <li class="<?php echo active_link_controller('album') ?>">
              <a href="<?php echo site_url('administrator/album') ?>"><i class="fa fa-angle-double-right"></i> Album Galeri</a>
            </li>
            <li class="<?php echo active_link_controller('kategori_berita') ?>">
              <a href="<?php echo site_url('administrator/kategori_berita') ?>"><i class="fa fa-angle-double-right"></i> Kategori </a>
            </li>
            <li class="<?php echo active_link_controller('tags') ?>">
              <a href="<?php echo site_url('administrator/tags') ?>"><i class="fa fa-angle-double-right"></i> Tags </a>
            </li>
        </ul>
        </li>

        <li class="<?php echo active_link_controller('data'); ?>">
            <a href="<?php echo site_url('administrator/data') ?>">
               <i class="fa fa-database"></i> <span> Data</span>
            </a>
        </li>

        <li class="<?php echo active_link_controller('download'); ?>">
            <a href="<?php echo site_url('administrator/download') ?>">
               <i class="fa fa-download"></i> <span> Download</span>
            </a>
        </li>
        <li class="<?php echo active_link_controller('mitra'); ?>">
            <a href="<?php echo site_url('administrator/mitra') ?>">
               <i class="fa fa-clone"></i> <span> Mitra</span>
            </a>
        </li>
         <li class="<?php echo active_link_controller('kontak'); ?>">
            <a href="<?php echo site_url('administrator/kontak') ?>">
               <i class="fa fa-envelope"></i> <span> Kontak Masuk</span>
            </a>
        </li>
        <li class="treeview <?php echo active_link_multiple(array('pengatur','admin','media')); ?>">
            <a href="#">
               <i class="fa fa-cogs"></i> <span> Pengaturan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
        <ul class="treeview-menu">
           <li class="<?php echo active_link_controller('pengatur') ?>">
              <a href="<?php echo site_url('administrator/pengatur') ?>"><i class="fa fa-angle-double-right"></i> Pengaturan Sistem</a>
            </li>
             <li class="<?php echo active_link_controller('admin') ?>">
              <a href="<?php echo site_url('administrator/admin') ?>"><i class="fa fa-angle-double-right"></i> Penguna Sistem</a>
            </li>
             <li class="<?php echo active_link_controller('media') ?>">
              <a href="<?php echo site_url('administrator/media') ?>"><i class="fa fa-angle-double-right"></i> Media Sosial</a>
            </li>
        </ul>
        </li>
        <?php endif ?>
      </ul>
      </section>
   </aside>
   <div class="content-wrapper">
      <section class="content-header">
        <?php 
        /**
         * Generated Page Title
         *
         * @return stringsas
         **/
          echo $adminpage_title;

        /**
         * Generate Breadcrumbs from library
         *
         * @var string
         **/
          echo $adminbreadcrumb; 
        ?>
      </section>
      <section class="content">

<?php  
/* End of file left_sidebar.php */
/* Location: ./application/views/template/left_sidebar.php */
?>

