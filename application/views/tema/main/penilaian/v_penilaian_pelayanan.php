<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"': $browser ="style='padding-top:80px;' class='container'"; ?>>
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
         <li><a href="<?php echo base_url('epenilaian'); ?>">Epenilaian</a></li>
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
                  <th>ID Penilaian</th>
                  <th style="width: 100px">Penilaian</th>
                <?php 
                  $no=1;
                  if (empty($penilaian_pengaduan)) {
                    echo "
                    <tr><th style='padding:80px; text-align:center;' colspan='3'>Belum ada data penilaian !</th></tr>
                    ";
                  }else {
                  foreach ($penilaian_pengaduan as $row) {

                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->ID_penilaian ?></td>
                  <td class="text-center"><?php if ($row->penilaian == NULL) { ?>
                    <a href="<?php echo base_url('epenilaian/nilai/'.$row->ID_penilaian) ?>">Beri Penilaian</a>
                 <?php } else { ?>
                    <?php echo $row->penilaian ?>
                <?php } ?>
                </td>                  
                </tr>
                <?php } }?>
              </table>
          </div>
    </div>
    <div class="col-md-3 col-xs-12 ">
  <div>   
      <div class="list-group">
      <a href="<?php echo site_url('epenilaian'); ?>" class="list-group-item ">Beranda Epenilaian</a>  
      <a href="<?php echo site_url('epenilaian/panduan'); ?>" class="list-group-item ">Panduan</a>
       
      </div>
    </div>
    </div>
    </div>
  </div>
  <div class="box-footer radius">
    <div class="pull-left">
    &nbsp;
    </div>
  </div>
</div>
</div>
</div>

