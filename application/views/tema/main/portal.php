<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container"' : $browser ="style=' height:484px;'' class='container'" ; ?>>
        <div class="row">
        
	     <?php  if ($this->agent->is_mobile()) {  ?>
	      <br>&nbsp;<br>&nbsp;<br>&nbsp;
	      <?php }else { ?>
	       
	       <script>
	       	if (screen.width > 1366) {
               document.write("<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp; <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;&nbsp; ");
            }
			else {
				document.write("<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;");
				}
	       </script>		
		<?php } ?>
	     
      	 <?php  if ($this->agent->is_mobile()) {  ?>
        	<div  class="col-md-12 text-center" style="margin-top: -80px;">
        		&nbsp;<br>&nbsp;<br>
				<h1  style="color:#444; margin:10px;  font-size:4em; font-weight: 600; letter-spacing:5px;  text-shadow: 1px 1px 1px #000;">SIMKIS	</h1>
	        	<p style="margin:-15px;" >Simpangkatis District  Information &amp; Services Center</p>	
				<br>&nbsp;
        	</div>
        <?php } ?>

	     <div class="col-md-6 col-md-offset-3">
	     	 <?php echo $this->session->flashdata('pesan'); ?>
	     </div>
        </div>
        <p></p>
        <div class="row narrow">
        
           <a  style="color:#1F1D24;" href="<?php echo base_url('website')?>">
        	<div class="col-md-3 animated bounce border-radius">
	          <!-- Widget: user widget style 1 -->
	          <div class="box box-widget border-radius widget-user shadow <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header polygonal border-radius ">
	              <h4 class="widget-user-username text-center  stroke portal"><b > Website</b></h4>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image ">
	              <img class="img-circle" src="<?php echo base_url('assets/img/website.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row text-center border-radius">
	              <p></p>
	              	<p class="text-green">Situs Resmi Kecamatan Koba </p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
        	<a style="color: #1F1D24;" href="<?php echo site_url('epelayanan?app=epelayanan') ?>">
        	<div class="col-md-3 animated bounce border-radius">
	          <!-- Widget: user widget style 1 -->
	          <div class="box box-widget widget-user border-radius shadow  <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header polygonal border-radius">
	              <h4 class="widget-user-username text-center stroke portal"><b><span class="fa fa-internet-explorer"></span> - Pelayanan</b></h4>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/e-pelayanan.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row text-center">
	              <p></p>
	              	<p class="text-green">Perizinan &amp; Non Perizinan </p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
        	<a style="color:#1F1D24;" href="<?php echo site_url('epengaduan?app=epengaduan') ?>">
        	<div class="col-md-3 animated bounce border-radius">
	          <!-- Widget: user widget style 1 -->
	          <div class="box box-widget widget-user border-radius shadow <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header polygonal border-radius">
	              <h4 class="widget-user-username text-center stroke portal"><b><span class="fa fa-internet-explorer"></span> - Pengaduan</b></h4>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/pengaduan.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row  border-radius text-center">
	              <p></p>
	              	<p class="text-green">Pengaduan Masyarakat</p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>

        	<a style="color: #1F1D24;"  href="<?php echo site_url('epenilaian?app=epenilaian') ?>" ;	>
        	<div class="col-md-3 animated bounce border-radius">
	          <!-- Widget: user widget style 1 -->
	          <div class="box box-widget widget-user border-radius shadow <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?>">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header polygonal border-radius">
	              <h4 class="widget-user-username text-center stroke portal"><b><span class="fa fa-internet-explorer"></span> - Penilaian</b></h3>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/assessment.jpg') ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius">
	              <div class="row text-center">
	              <p></p>
	              	<p class="text-green">Penilaian Kinerja</p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
        </div>  
</div>