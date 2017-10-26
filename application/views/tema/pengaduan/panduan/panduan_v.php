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
	  <div class="row">
	  		<div class="col-md-10 col-md-offset-1 col-xs-12">	
	  			<br>
	  			<ul class="timeline">
				  	<?php 
				  		foreach ($panduan as $value) {
				  	 ?>
				    <li>
				        <i class="fa fa-book bg-orange"></i>
				        <div class="timeline-item">
				            <h3 class="timeline-header"><a href="<?php echo site_url('epengaduan/read/'.$value->slug); ?>"><?php echo $value->judul; ?></a></h3>
				            <div class="timeline-body ">
				               <?php echo $value->deskripsi_singkat.'...'; ?>
				            </div>
				            <div class="timeline-footer ">
				                <a href="<?php echo site_url('epengaduan/read/'.$value->slug); ?>" class="btn btn-warning btn-xs">Selengkapnya..</a>
				            </div>
				        </div>
				    </li>
				    <?php } ?>

				</ul>
	  		</div>
	  </div>
  </div>

</div>
</div>
</div>

