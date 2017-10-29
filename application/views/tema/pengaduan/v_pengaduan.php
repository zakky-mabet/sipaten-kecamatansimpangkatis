<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px; margin-top:auto; margin-bottom:auto;' class='container'" ; ?>>
        <div class="row">
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;

	        <div class=" col-md- text-center animated bounce">
	        	<!-- <h1 class="spengaduan "><span class="fa fa-internet-explorer"></span> - Pengaduan</b></h1> -->
	        	<!-- <p class="slogan2">Koba District Information &amp; Service  Center</p>
	        	<p class="slogan">Pusat Informasi dan Portal Pegaduan Kecamatan Koba</p> --> 		 		
	        </div>
        </div>
        <p></p>
        <div class="row narrow">
           <a class="color-black" href="<?php echo site_url('epengaduan/create') ?>">
        	<div class="col-md-4 animated bounce border-radius ">
	          <div class="box box-widget widget-user shadow  border-radius <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <div class="widget-user-header bg-blue polygonal border-radius">
	              <h3 class="widget-user-username text-center "><b>Buat Pengaduan</b></h3>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/website.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row text-center">
	              <p></p>
	              	<p class="text-green">Pengaduan Masyarakat</p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
        	<a class="color-black" href="<?php echo site_url('epengaduan/histori') ?>">
        	<div class="col-md-4 animated bounce border-radius ">
	          <div class="box box-widget widget-user shadow  border-radius <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <div class="widget-user-header bg-yellow polygonal border-radius">
	              <h3 class="widget-user-username text-center "><b>Riwayat</b></h3>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/e-pelayanan.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row text-center">
	              <p></p>
	              	<p class="text-green"> Riwayat Pengaduan</p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
        	<a class="color-black" href="<?php echo site_url('epengaduan/panduan') ?>">
        	<div class="col-md-4 animated bounce border-radius ">
	          <div class="box box-widget widget-user border-radius shadow <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <div class="widget-user-header bg-red border-radius polygonal">
	              <h3 class="widget-user-username text-center "><b>Panduan Pengunaan</b></h3>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/pengaduan.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row text-center">
	              <p></p>
	              	<p class="text-green">Syarat dan Ketentuan</p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>

        	
        </div>     
      
</div>