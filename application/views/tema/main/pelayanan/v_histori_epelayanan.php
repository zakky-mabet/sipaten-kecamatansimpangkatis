<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"':$browser ="style='padding-top:80px;' class='container'"; ?>>
 <div class="row">
	 <div class="box box-success radius">
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
         <li><a href="<?php echo base_url('epelayanan'); ?>">Epelayanan</a></li>
        <li class="active white"><?php echo $crumb ?></li>
      </ol>
 	</section>
  </div>
  </div>
  <div class="box-body">
    <div class="col-md-12">
    <div class="col-md-9 col-xs-12">
 <div class="row">
              <table class="table table-bordered" >
          
                <tr>
                  <th style="width: 5px">#</th>
                  <th>ID Pelayanan</th>
                  <th>Jenis Surat</th>
                  <th style="width: 40px">Status</th>
                
                <?php 
                  $no=1;
                  if (empty($histori)) {
                    echo "
                    <tr><th style='padding:80px; text-align:center;' colspan='4'>Anda belum membuat pelayanan !</th></tr>
                    ";
                  }else {
                  foreach ($histori as $row) {
                  if ($row->status == 'no') {
                      $color = 'warning';
                      $judul = 'Belum Ditindaklanjuti';
                      $btn = 'fa-spinner ';

                    } elseif(($row->status == 'yes') OR ($row->status == 'read')) {
                      $color = 'success';
                      $judul = 'Ditindaklanjuti';
                      $btn = 'fa-eye';
                    }
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td  style="text-transform: capitalize;" >
                  <a class="text-green" href="<?php echo base_url('epelayanan/detail/'.$row->ID) ?>"><?php echo $row->ID_pelayanan ?></a></td>
                   <td  style="text-transform: capitalize;">
                    <?php echo $row->nama_kategori;  ?>  
                  </td>
                  <td class="text-center" width="30%">                
                      <?php 
                      if ($row->status == 'no') { ?>
                        <div class="btn-group"> 
                        <a class="btn btn-<?php echo $color ?>  btn-xs " href="#"> 
                        <i  data-toggle="tooltip" title="<?php echo $judul ?>" class=" fa <?php echo $btn ?> "> 
                        <?php echo ($this->agent->is_mobile()) ?  '' : '<span class="arial">'.$judul.'</span>'  ?>  </i></a>
                            <a class="btn btn-<?php echo $color ?> btn-xs dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-caret-down" title="Toggle dropdown menu"> <?php echo ($this->agent->is_mobile()) ?  '' :  '<span class="arial">Opsi</span>' ?> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="<?php echo base_url('epelayanan/edit/'.$row->ID) ?>"><i class="fa fa-pencil fa-fw "></i> Edit</a></li>
                        <li><a data-toggle="modal" data-target="#myModal<?php echo $row->ID; ?>" href=""><i  class="fa fa-trash-o fa-fw "></i> Hapus</a></li>
                        <li><a href="<?php echo base_url('epelayanan/detail/'.$row->ID) ?>"><i class="fa fa-search fa-fw "></i> Detail</a></li>
                        </ul>
                      </div>
                     <?php } elseif (($row->status == 'yes') OR ($row->status == 'read')) {  ?> 
                       <div class="btn-group">
                        <a class="btn btn-<?php echo $color ?>  btn-xs" href="#"> 
                        <i data-toggle="tooltip" title="<?php echo $judul ?>" class="fa <?php echo $btn ?>"> <?php echo ($this->agent->is_mobile()) ?  '' :  $judul ?></i></a>
                            <a class="btn btn-<?php echo $color ?> btn-xs dropdown-toggle"  href="<?php echo base_url('epenilaian/nilai/'.$row->ID_pelayanan); ?>">
                          <span data-toggle="tooltip" class="fa fa-commenting-o" title="Beri Penilaian"> <?php echo ($this->agent->is_mobile()) ?  '' :  'Beri Penilaian' ?></span>
                        </a>
                      </div>
                     <?php }
                       ?>                    
                  </td>
                </tr>
         
            <?php if ($row->status == 'no') { ?>
              <div id="myModal<?php echo $row->ID; ?>" class="modal fade" role="dialog">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a  href="<?php echo base_url('epelayanan/hapus').'/'.$row->ID; ?>"  class="btn btn-warning">Ya</a>
                    </div>
                  </div>
                </div>
              </div>
                <?php } elseif ($row->status == 'yes') { ''; } ?> 
                <?php }} ?>
              </table>
            
          </div>
    </div>
    <div class="col-md-3 col-xs-12 ">
  <div>   
      <div class="list-group">
      <a href="<?php echo site_url('epelayanan'); ?>" class="list-group-item ">Beranda pelayanan</a>
      <a href="<?php echo site_url('epelayanan/panduan'); ?>" class="list-group-item ">Panduan pelayanan</a>
      </div>
    </div>
    </div>
    </div>
  </div>
  <div class="box-footer radius">
    <div class="pull-left">
  <!--   <span><i class="fa fa-info"></i> Lihat <a href="<?php echo base_url('epelayanan/panduan') ?>">Panduan Epelayanan</a>  untuk panduan penggunaan sistem Epelayanan</span> -->
    </div>
  </div>
</div>
</div>
</div>

