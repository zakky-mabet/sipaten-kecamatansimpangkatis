<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?php echo (!$this->session->userdata('account')->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$this->session->userdata('account')->photo}"); ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p><?php echo $this->session->userdata('account')->name; ?></p>
            <small><?php echo $this->role_name; ?></small>
         </div>
      </div>
      <ul class="sidebar-menu">
        <li class="<?php echo active_link_controller('main'); ?>">
            <a href="<?php echo site_url('main') ?>">
               <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
<?php  
/* PERMISSION */
if( $this->permission->is_true('surat_perizinan', 'on') ) :
?>
        <li class="treeview <?php echo is_surat('non perizinan', $this->uri->segment(3)); ?>">
            <a href="#">
               <i class="fa fa-file-text-o"></i> <span> Surat Non Perizinan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'non perizinan') as $row) :
      ?>
            <li class="<?php if($this->uri->segment(3)==$row->id_surat) echo "active"; ?>">
              <a href="<?php echo site_url("create_surat/index/{$row->id_surat}?from=".current_url()) ?>">
                <i class="fa fa-angle-double-right"></i> <?php echo $row->nama_kategori; ?>
              </a>
            </li>
      <?php  
      endforeach;
      ?>
          </ul>
        </li>
<?php  
endif;

/* PERMISSION */
if( $this->permission->is_true('surat_perizinan', 'on') ) :
?>
        <li class="treeview <?php echo is_surat('perizinan', $this->uri->segment(3)); ?>">
            <a href="#">
               <i class="ion ion-clipboard"></i> <span>Surat Perizinan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
      <?php  
      /**
      * Loop Surat Perizinan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'perizinan') as $row) :
      ?>
            <li class="<?php if($this->uri->segment(3)==$row->id_surat) echo "active"; ?>">
              <a href="<?php echo site_url("create_surat/index/{$row->id_surat}?from=".current_url()) ?>"><i class="fa fa-angle-double-right"></i> <?php echo $row->nama_kategori; ?></a>
            </li>
      <?php  
      endforeach;
      ?>
          </ul>
        </li>
<?php  
endif;
?>

        <li class="<?php echo active_link_method('index','surat_online'); ?>">
            <a href="<?php echo site_url('surat_online') ?>">
               <i class="glyphicon glyphicon-search"></i> <span> Lacak Pelayanan Online</span>
            </a>
        </li>

        <li class="<?php echo active_link_controller('surat_keluar'); ?>">
            <a href="<?php echo site_url('surat_keluar') ?>">
              <i class="glyphicon glyphicon-envelope"></i> <span>Data Surat Keluar</span>
              <?php if($this->option->count_surat('pending')) : ?>
              <span class="pull-right-container">
                 <span class="label label-danger pull-right"><?php echo $this->option->count_surat('pending') ?></span>
              </span>
            <?php endif; ?>
            </a>
        </li>
<?php  
if( $this->permission->is_true('analytics', 'on') ) :
?>
        <li class="<?php echo active_link_controller('analytics'); ?>">
            <a href="<?php echo site_url('analytics') ?>">
               <i class="fa fa-line-chart"></i> <span> Analisa Pelayanan</span>
            </a>
        </li>
<?php  
endif;
/* Start Multiple Master  */
if( $this->permission->is_groups(array('penduduk', 'desa','manejemen_surat','pegawai')) ) :
?>
        <li class="treeview <?php echo active_link_multiple(array('people','desa', 'surat','employee')); ?>">
            <a href="#">
               <i class="fa fa-database"></i> <span> Master Data</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
<?php  
if( $this->permission->is_true('penduduk', 'on') ) :
?>
            <li class="<?php echo active_link_controller('people') ?>">
              <a href="<?php echo site_url('people') ?>"><i class="fa fa-angle-double-right"></i> Data Penduduk</a>
            </li>
<?php  
endif;
if( $this->permission->is_true('desa', 'on') ) :
?>
            <li class="<?php echo active_link_controller('desa') ?>">
              <a href="<?php echo site_url('desa') ?>"><i class="fa fa-angle-double-right"></i> Data Kelurahan/Desa</a>
            </li>
<?php  
endif;
if( $this->permission->is_true('manejemen_surat', 'on') ) :
?>
            <li class="<?php echo active_link_controller('surat') ?>">
              <a href="<?php echo site_url('surat') ?>"><i class="fa fa-angle-double-right"></i> Manajemen Surat</a>
            </li>
<?php  
endif;
if( $this->permission->is_true('pegawai', 'on') ) :
?>
            <li class="<?php echo active_link_controller('employee') ?>">
              <a href="<?php echo site_url('employee') ?>"><i class="fa fa-angle-double-right"></i> Data Kepegawaian</a>
            </li>
<?php  
endif;
?>
          </ul>
        </li>

<?php
endif;  
/* Start Multiple Statistik */
if( $this->permission->is_groups(array('statistik_penduduk', 'statistik_surat_non_perizinan','statistik_surat_perizinan','statistik_pelayanan')) ) :
?>
        <li class="treeview <?php echo active_link_multiple(array('stats_people','surat_stats')); ?>">
            <a href="#">
               <i class="fa fa-bar-chart-o"></i> <span>Statistik</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
<?php  
/* PERMISSION */
if( $this->permission->is_true('statistik_penduduk', 'on') ) :
?>
            <li class="<?php echo active_link_controller('stats_people') ?>">
              <a href="<?php echo site_url('stats_people'); ?>"><i class="fa fa-angle-double-right"></i> Kependudukan</a>
            </li>
<?php  
endif;
if( $this->permission->is_true('statistik_surat_non_perizinan', 'on') ) :
?>
            <li class="<?php echo active_link_method('index','surat_stats') ?>">
              <a href="<?php echo site_url('surat_stats') ?>"><i class="fa fa-angle-double-right"></i> Surat Non Perizinan</a>
            </li>
<?php  
endif;

if( $this->permission->is_true('statistik_surat_perizinan', 'on') ) :
?>
            <li class="<?php echo active_link_method('perizinan','surat_stats') ?>">
              <a href="<?php echo site_url('surat_stats/perizinan') ?>"><i class="fa fa-angle-double-right"></i> Surat Perizinan</a>
            </li>
<?php  
endif;

if( $this->permission->is_true('statistik_pelayanan', 'on') ) :
?>
            <li class="<?php echo active_link_method('service','surat_stats') ?>">
              <a href="<?php echo site_url('surat_stats/service') ?>"><i class="fa fa-angle-double-right"></i> Penilaian Pelayanan</a>
            </li>
            <li class="<?php echo active_link_method('kepuasan','surat_stats') ?>">
              <a href="<?php echo site_url('surat_stats/kepuasan') ?>"><i class="fa fa-angle-double-right"></i> Indeks Kepuasan Masyarakat</a>
            </li>
<?php  
endif;
?>
          </ul>
        </li>

<?php  
/* Multiple Statistik */
endif; 


if( $this->permission->is_true('pengaturan', 'on') ) :
?>
        <li class="treeview <?php echo active_link_multiple(array('setting','role','penilaian', 'user')); ?>">
            <a href="#">
               <i class="fa fa-wrench"></i> <span>Pengaturan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_controller('setting') ?>">
              <a href="<?php echo site_url('setting') ?>"><i class="fa fa-angle-double-right"></i> Pengaturan Sistem</a>
            </li>
            <li class="<?php echo active_link_controller('user') ?>">
              <a href="<?php echo site_url('user') ?>?from_url=<?php echo current_url() ?>"><i class="fa fa-angle-double-right"></i> Pengguna Sistem</a>
            </li>
            <li class="<?php echo active_link_controller('penilaian') ?>">
              <a href="<?php echo site_url('penilaian') ?>?from_url=<?php echo current_url() ?>"><i class="fa fa-angle-double-right"></i> Manajemen Penilaian (KIOSK)</a>
            </li>
            <li class="<?php echo active_link_controller('role') ?>">
              <a href="<?php echo site_url('role') ?>"><i class="fa fa-angle-double-right"></i> Hak Akses Pengguna</a>
            </li>
          </ul>
        </li>
<?php  
endif;
?>
        <li class="<?php echo active_link_controller('userguide'); ?>">
            <a href="<?php echo site_url('userguide/read/tutorial-penggunaan') ?>">
               <i class="ion ion-help-circled"></i> <span> Panduan Sistem</span>
            </a>
        </li>
        <li class="header" style="background-color: #E6E7E9">
          <span>STATUS PENGGUNA</span>
          <ul id="list-user-login">
<?php  
/**
 * Get User Online Status
 *
 **/
foreach( $this->account->get_user_login() as $row) :
?>
            <li>
              <img src="<?php echo (!$row->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$row->photo}"); ?>" alt="user online">
              <span class="name-on"><?php echo $row->name; ?></span>
          <?php  
          if( $row->login_status != FALSE ) :
          ?>
              <i class="fa fa-circle text-green"></i>
          <?php else : ?>
              <i class="fa fa-circle text-gray"></i>
          <?php endif; ?>
<?php  
endforeach;
?>
          </ul>
        </li>
      </ul>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" id="search-status-login" class="form-control sidebar-search" placeholder="Status Pengguna..." onkeyup="search_user_login()">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
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
          echo $page_title;

        /**
         * Generate Breadcrumbs from library
         *
         * @var string
         **/
          echo $breadcrumb; 
        ?>
      </section>
      <section class="content">
<?php  
/* End of file left_sidebar.php */
/* Location: ./application/views/template/left_sidebar.php */


