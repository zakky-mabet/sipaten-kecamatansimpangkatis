 <div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container narrow"' : $browser =" class='container narrow'" ; ?>>       
      <div class="row">
        <div class="row">
	        <div class=" col-md-12 text-center ">
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;
	        <br>&nbsp;
	        <div class="text-center">
	        	<p class="perizinan"><b>Surat Non Perizinan </b></p>
	       	</div>
	    	</div>
        </div>
        <p></p>
        <div class="row">
        	 <?php
           if (empty($keterangan)) {
           } 
           else
           foreach ($keterangan as $value) { ?>
           		<a style="color:#1F1D24;"  href="<?php echo site_url($value->link) ?>">
        	<div class="col-md-3 col-xs-12   animated bounce border-radius   ">
	          <div class="box box-widget widget-user border-radius  <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?> shadow">
	            <div class="widget-user-header  polygonal border-radius <?php echo $value->color;  ?> ">
	              <h5 class="widget-user-username  text-center " ><b> <?php echo $value->title; ?></b></h5>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/'.$value->foto) ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius ">
	              <div class="row text-center">
	              <p></p>
	              	<p  class="text-green"><?php echo $value->description;  ?></p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
           <?php } ?>
        </div>
        <div class="row">
	        <div class=" col-md-12 text-center animated bounce">	
	        	<p class="perizinan"><b>Surat Perizinan </b></p>
	    	</div>
        </div>
        <p></p>
        <div class="row">
           <?php
           if (empty($perizinan)) {
           } 
           else
           foreach ($perizinan as $value) { ?>
           		<a style="color:#1F1D24;"  href="<?php echo site_url($value->link) ?>">
        	<div class="col-md-3   animated bounce col-xs-12  border-radius  ">
	          <div class="box box-widget widget-user  border-radius  <?php  if ($this->agent->is_mobile()) { echo '';  } else { echo 'zoom'; } ?> shadow">
	            <div class="widget-user-header polygonal  border-radius <?php echo $value->color;  ?> ">
	              <h3 class="widget-user-username text-center "><b> <?php echo $value->title;  ?></b></h3>
	              <h5 class="widget-user-desc"></h5>
	            </div>
	            <div class="widget-user-image">
	              <img class="img-circle" src="<?php echo base_url('assets/img/'.$value->foto) ?>" alt="image">
	            </div>
	            <div class="box-footer border-radius ">
	              <div class="row text-center">
	              <p></p>
	              	<p  class="text-green"><?php echo $value->description;  ?></p>
	              </div>
	            </div>
	           </div>  
        	</div> 
        	</a>
           <?php } ?>
        </div> 
	</div>
</div>
