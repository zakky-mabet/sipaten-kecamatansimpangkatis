<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="row">
	 <div class="box box-warning radius">
      <div class="box-header with-border ">
      <div class="row">
      	<section class="content-header">
         <h1>
            <?php echo $crumb ?>
          </h1>
          <p>
            <?php echo $this->session->flashdata('pesan'); ?>
          </p>
          <ol class="breadcrumb">
            <li class="white"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
             <li><a href="<?php echo base_url('epengaduan'); ?>">Epengaduan</a></li>
            <li class="active white"><?php echo $crumb ?></li>
          </ol>
     	  </section>
        </div>
    </div>
  <div class="box-body">
    <div class="col-md-12">
     <?php 

          if (empty($detail_aduan)) {
            echo "<div class='alert alert-danger alert-dismissible animated fadein' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-icon'></i>Maaf, Data yang anda cari Belum Ada  !</div>

        ";  redirect('epengaduan/histori','refresh');
          } else {
            foreach ($detail_aduan as $value) {
               if ($value->status_pesan == 'no') {
                      $color = 'warning';
                      $juduls = 'Belum Ditindaklanjuti';
                    } elseif(($value->status_pesan == 'yes') OR ($value->status_pesan == 'read')) {
                      $color = 'success';
                      $juduls = 'Ditindaklanjuti';
              
                    }
           ?>
      <div class="col-md-3 col-xs-12 ">
        <!-- Profile Image -->
            <div class="box-body box-profile">
              <a href="<?php echo base_url('assets/img/epengaduan/'.$value->photo); ?>" data-toggle="lightbox" data-title="<?php echo $value->ID_pengaduan ?>" data-footer="<?php echo $value->judul  ?>">
            <img src="<?php echo base_url('assets/img/epengaduan/'.$value->photo); ?>" width="100%"  class="img-fluid img-responsive">
              </a>
            </div>
    </div>
    <div class="col-md-9 col-xs-12">
      <table class="table table-bordered table-striped ">
                <tr>
                  <th class="font-title" style="width: 20%">ID Pengaduan</th>
                  <td class="text-orange"><?php echo $value->ID_pengaduan  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Judul</th>
                  <td><?php echo $value->judul  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Pesan Deskrpsi</th>
                  <td><?php echo $value->pesan  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Alamat Lokasi</th>
                  <td><?php echo $value->alamat_lokasi  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Post</th>
                  <td><?php echo $value->create_tgl  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Tanggal Terverifikasi</th>
                  <td><?php if ($value->approve_tgl == NULL){ echo '-' ;}else { echo $value->approve_tgl; }  ?></td>
                </tr>
                 <tr>
                  <th class="font-title" style="width: 20%">Durasi Terverifikasi</th>
                  <td><?php if ($value->durasi == NULL){ echo '-' ;}else { echo $value->durasi; }  ?></td>
                </tr>
                <tr>
                  <th class="font-title" style="width: 20%">Status Pesan</th>
                  <td><span class="btn btn-xs btn-<?php echo $color ?> "><?php echo $juduls  ?></span></td>
                </tr>
      </table>
    </div>
    </div>
  </div>
  <div class="box-footer with-border">
        <div class="col-md-1 col-xs-4">
          <a href="<?php echo base_url('epengaduan/histori'); ?>" class="btn btn-app ">
            <i class="fa fa-reply"></i> Kembali </a>
        </div>
        <?php   if ($value->status_pesan == 'no') { ?>
        <div class="col-md-1 col-xs-4">
          <a href="<?php echo base_url('epengaduan/edit/'.$value->ID); ?>" class="btn btn-app ">
            <i class="fa fa-pencil "></i> Edit
          </a>
        </div>
        <div class="col-md-1 col-xs-4">
          <a data-toggle="modal" data-target="#myModal<?php echo $value->ID; ?>" href="" class="btn btn-app ">
            <i class="fa fa-trash-o "></i> Hapus
          </a>
        </div>
        <div id="myModal<?php echo $value->ID; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Hapus</h4>
                    </div>
                    <div class="modal-body">
                      <p>Anda yakin ingin menghapus ini? </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Tidak</button>
                    <a  href="<?php echo base_url('epengaduan/hapus').'/'.$value->ID; ?>"  class="btn btn-warning">Ya</a>
                    </div>
                  </div>
                </div>
              </div>
        <?php }  else {?>
          <div class="col-md-1 col-xs-4 ">
          <a href="<?php echo base_url('epenilaian/nilai/'.$value->ID_pengaduan); ?>" class="btn btn-app bg-green">
            <i class="fa fa-commenting-o "></i>Beri Penilaian
          </a>
        </div>
        <?php } ?>
      </div>
      <div class="box-footer with-border radius">
        <div class="col-md-12">
          <p class="text-orange">
           <span class="text-orange fa fa-info"> </span> pesan pengaduan bisa di ubah dan hapus  jika belum ditindaklanjuti 
          </p>
        </div>
      </div>
       <?php }} ?>
</div>
</div>
</div>

