<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"': $browser ="style='padding-top:80px;' class='container'"; ?>>
 <div class="row col-md-8 col-md-offset-2">
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
    <div class="col-md-12 col-xs-12">
  <div class="row text-center">
  <?php 
  if (empty($nilai)) {
     echo "<div class='alert alert-danger alert-dismissible animated fadein' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-icon'></i>Maaf, Data yang anda cari Belum Ada  !</div>

        ";  redirect('epenilaian/pengaduan','refresh');
          }
          foreach ($nilai as $value) {
          } ?>
           <h4>Apa Pendapat anda dengan ID Penilaian :  <span class="text-blue"><?php echo $value->ID_penilaian ?></span></h4> 
            <p>
                <div class="col-md-3 col-xs-6 text-center animated bounce">
                  <a data-toggle="modal" data-target="#nilai-sangat-baik" href="#"><img width="80%" src="<?php echo base_url('assets/img/sangat-baik.png'); ?>" alt="Sangat Baik"></a>
                  <br>
                  <span class="text-center ">Sangat Baik</span>
                </div>
                <div class="col-md-3 col-xs-6 text-center animated bounce">
                  <a data-toggle="modal" data-target="#nilai-baik" href=""><img width="80%"  src="<?php echo base_url('assets/img/baik.png'); ?> " alt="Baik"></a>
                  <br>
                  <span class="text-center  text-center">Baik</span>
                </div>
                <div class="col-md-3 col-xs-6 text-center animated bounce">
                  <a data-toggle="modal" data-target="#nilai-cukup" href=""><img width="80%"  src="<?php echo base_url('assets/img/cukup.png'); ?> " alt="Cukup"></a>
                  <br>
                  <span class="text-center">Cukup</span>
                </div>
                <div class="col-md-3 col-xs-6 text-center animated bounce">
                  <a data-toggle="modal" data-target="#nilai-buruk" href=""><img width="80%"  src="<?php echo base_url('assets/img/buruk.png'); ?> " alt="Buruk"></a>
                  <br>
                  <span class="text-center">Buruk</span>
                </div>
            </p>
          </div>
    </div>
    </div>
  </div>
   <div class="box-footer">
        <div class="col-md-2 col-xs-5">
          <a href="<?php echo base_url('epenilaian/pengaduan'); ?>" class="btn btn-app pull-right">
            <i class="ion ion-reply"></i> Kembali
          </a>
        </div> 
   
      </div> 
  <div class="box-footer with-border">
          <small><strong class="text-orange fa fa-info"></strong> Klik icon untuk memilih penilian !</small> <br>
      </div>
</div>
</div>
</div>

 <div id="nilai-sangat-baik" class="modal fade" role="dialog">
 <form action="<?php echo base_url('epenilaian/post_nilai/'.$value->ID_penilaian) ?>" method="post" >
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sangat Baik</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="penilaian" value="Sangat Baik">
           <p>Anda memilih Sangat Baik terima kasih atas penilaian anda ! </p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      <input type="submit" name="" class="btn btn-default" value="Selesaikan">
      </div>
    </div>
  </div>
  </form>
</div>

 <div id="nilai-baik" class="modal fade" role="dialog">
 <form action="<?php echo base_url('epenilaian/post_nilai/'.$value->ID_penilaian) ?>" method="post">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Baik</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="penilaian" value="Baik">
           <p>Anda memilih Baik terima kasih atas penilaian anda ! </p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      <input type="submit" name="" class="btn btn-default" value="Selesaikan">
      </div>
    </div>
  </div>
  </form>
</div>

 <div id="nilai-cukup" class="modal fade" role="dialog">
 <form action="<?php echo base_url('epenilaian/post_nilai/'.$value->ID_penilaian) ?>" method="post">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cukup</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="penilaian" value="Cukup">
           <p>Anda memilih cukup terima kasih atas penilaian anda ! </p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      <input type="submit" name="" class="btn btn-default" value="Selesaikan">
      </div>
    </div>
  </div>
  </form>
</div>

 <div id="nilai-buruk" class="modal fade" role="dialog">
 <form action="<?php echo base_url('epenilaian/post_nilai/'.$value->ID_penilaian) ?>" method="post">
  <div class="modal-dialog ">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buruk</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="penilaian" value="Buruk">
           <p>Anda memilih buruk terima kasih atas penilaian anda ! </p>
      </div>
      <div class="modal-footer radius">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      <input type="submit" name="" class="btn btn-default" value="Selesaikan">
      </div>
    </div>
  </div>
  </form>
</div>
