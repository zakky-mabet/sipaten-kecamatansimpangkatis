<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );

$date = new DateTime($get->tanggal);
?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="<?php echo site_url('apps/surat'); ?>"><i class="fa fa-angle-double-left"></i></a>
                <a class="heading-text"><?php echo $title ?></a>
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
            </div>
        </nav>
    </div>
    <section class="white">
        <div class="main-content">
           <div class="row">
               <div class="col s12 center">
                   <h6 class="text-orange"><?php echo $get->judul_surat ?></h6>
               </div>
               <div class="col s12 letter-info">
                    <h6 class="letter-info-icon">Informasi Surat</h6>
                   <table>
                       <tr>
                           <td>Nomor Surat</td>
                           <td class="center">:</td>
                           <td><?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></td>
                       </tr>
                       <tr>
                           <td>Tanggal</td>
                           <td class="center">:</td>
                           <td><?php echo date_id($get->tanggal); ?></td>
                       </tr>
                       <tr>
                           <td>Petugas Pelayanan</td>
                           <td class="center">:</td>
                           <td><?php echo $get->name; ?></td>
                       </tr>
                       <tr>
                           <td>Petugas Verifikasi</td>
                           <td class="center">:</td>
                           <td><?php echo $this->db->get_where('pegawai', array('ID'=> $get->pemeriksa))->row('nama'); ?></td>
                       </tr>
                       <tr>
                           <td>Penandatangan</td>
                           <td class="center">:</td>
                           <td><?php echo $get->nama; ?> - NIP. <?php echo $get->nip ?></td>
                       </tr>
                       <tr>
                           <td>Status Surat</td>
                           <td class="center">:</td>
                           <td><?php echo ($get->status == "approve") ? "Terverifikasi" : "Belum Terverifikasi";  ?></td>
                       </tr>
                   </table>
                <?php  
                /**
                 * Panggil Form Isian Surat
                 *
                 * @return Require HTML
                 **/
                
                if($get->slug != "pengantar-kartu-keluarga")
                    $this->load->view("isian-surat/{$get->slug}", $this->data);
                ?>
               </div>
           </div>
        </div>
    </section>
    <div class="fixed-action-btn vertical">
        <a class="btn-floating btn-large orange">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <li><a href="#set-verification" data-status="approve" data-id="<?php echo $get->ID ?>" class="btn-floating green"><i class="fa fa-check"></i></a></li>
            <li><a href="#set-verification" data-status="pending" data-id="<?php echo $get->ID ?>" class="btn-floating red darken-1"><i class="fa fa-times"></i></a></li>
        </ul>
    </div>

    <div id="set-verification" class="modal modal-dialog">
        <div class="modal-content">
            <h5 id="get-heading"></h5>
        </div>
        <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
            <a id="set-button" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
        </div>
    </div>
<?php  

$this->load->view('footer', $this->data );

/* End of file surat-surat.php */
/* Location: ./application/modules/apps/views/surat-surat.php */
