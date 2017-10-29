<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
 <div class="row">
	 <div class="box box-success radius">
  <div class="box-header with-border ">
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
  <div class="box-body">
    <div class="col-md-12">
    <div class="col-md-9 col-xs-12">
 <div class="row">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 5px">#</th>
                  <th>ID Pengaduan</th>
                  <th style="width: 40px">Status</th>
                </tr>
                <?php 
                  $no=1;
                  foreach ($histori as $row) {
                  $potong = substr($row->pesan, 0,10);
                  if ($row->status_pesan == 'no') {
                      $color = 'warning';
                      $judul = 'Belum Ditindaklanjuti';
                      $btn = 'fa-spinner fa-spin fa-1x fa-fw';
                    } elseif(($row->status_pesan == 'yes') OR ($row->status_pesan == 'read')) {
                      $color = 'success';
                      $judul = 'Ditindaklanjuti';
                      $btn = 'fa-eye';
                    }
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td  style="text-transform: capitalize;" >
                  <a href="<?php echo base_url('epengaduan/histori') ?>"><?php echo $row->ID_pengaduan ?></a></td>
                  <td class="text-center" width="100">                
                      <?php 
                      if ($row->status_pesan == 'no') { ?>
                        <div class="btn-group">
                        <a class="btn btn-<?php echo $color ?>  btn-xs" href="#">
                        <i data-toggle="tooltip" title="<?php echo $judul ?>" class="fa <?php echo $btn ?>"></i></a>
                            <a class="btn btn-<?php echo $color ?> btn-xs dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
                          <li><a href="#"><i class="fa fa-trash-o fa-fw r"></i> Hapus</a></li>
                          <li><a href="<?php echo site_url('epengaduan/ubah_status_sementara/'.$row->ID) ?>"><i class="fa fa-pencil fa-fw r"></i> Ubah Status</a></li>
                        </ul>
                      </div>
                     <?php } elseif (($row->status_pesan == 'yes') OR ($row->status_pesan == 'read')) {  ?> 
                       <div class="btn-group">
                        <a class="btn btn-<?php echo $color ?>  btn-xs" href="#">
                        <i data-toggle="tooltip" title="<?php echo $judul ?>" class="fa <?php echo $btn ?>"></i></a>
                          <a class="btn btn-<?php echo $color ?> btn-xs dropdown-toggle" data-toggle="dropdown" href="#">
                          <span  data-toggle="tooltip" class="fa fa-commenting-o" title="Beri Penilaian"></span>
                        </a>
                      </div>
                     <?php }
                       ?>                    
                  </td>
                </tr>
                <?php } ?>
              </table>
            <div class="box-footer clearfix">

              </div>
          </div>
    </div>
    <div class="col-md-3 col-xs-12 ">
  <div>   
      <div class="list-group">
      <a href="<?php echo site_url('epengaduan'); ?>" class="list-group-item ">Beranda Pengaduan</a>
      <a href="<?php echo site_url('epengaduan/create'); ?>" class="list-group-item ">Buat Pengaduan</a>
      <a href="<?php echo site_url('epengaduan/panduan'); ?>" class="list-group-item ">User Guide</a>
       
      </div>
    </div>
    </div>
    </div>
  </div>
  <div class="box-footer radius">
    <div class="pull-right">
    &nbsp;
    </div>
  </div>
</div>
</div>
</div>

