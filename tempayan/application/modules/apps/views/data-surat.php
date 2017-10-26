<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );
?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <form action="" method="get">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="<?php echo site_url('apps'); ?>"><i class="fa fa-angle-double-left"></i></a>
                <a class="heading-text"><?php echo $title ?></a>
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
                <div class="input-field">
                    <input type="search" value="<?php echo $this->input->get('query') ?>" name="query" placeholder="Pencarian data ...">
                    <label class="label-icon"><i class="icon-search-nav material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </div>
        </nav>
        </form>
    </div>
<?php  
if( $data_surat != FALSE) :
?>
    <section class="white">
    <div class="main-content">
        <div class="collection">
    <?php  
    foreach( $data_surat as $row) :

        $date = new DateTime($row->tanggal);
    ?>
            <a href="<?php echo site_url("apps/surat/get/$row->ID") ?>" class="collection-item grey-text">
                <?php if($row->status == "approve") : ?>
                    <i class="fa fa-check green-text right"></i>
                <?php else : ?>
                    <i class="fa fa-times red-text right"></i>
                <?php endif; ?>
                <span class="list-name"><?php echo $row->judul_surat; ?></span> <br>
                <small>Nomor : <?php echo $row->kode_surat.'/<b>'.$row->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></small><br>
                <small>- <?php echo date_id($row->tanggal); ?> diajukan oleh <?php echo $row->name; ?> </small> <br>
                <small>- Pemohon : <?php echo $row->nama_lengkap; ?> (<i><?php echo $row->nik ?></i>)</small>
            </a>
    <?php  
    endforeach;
    ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
    </section>
<?php  else : ?>
    <div class="row" style="margin-top: 80px;">
        <div class="col s12 m5">
            <div class="card-panel red">
                <span class="white-text">
                    <i class="fa fa-warning"></i> Maaf! Data yang anda cari tidak ditemukan.
                </span>
            </div>
        </div>
        <div class="col s12 center">
            <a href="<?php echo site_url('apps/surat') ?>" class="waves-effect waves-light btn orange">Kembali</a>
        </div>
    </div>
<?php  
endif;


$this->load->view('footer', $this->data );

/* End of file data-surat.php */
/* Location: ./application/modules/apps/views/data-surat.php */
