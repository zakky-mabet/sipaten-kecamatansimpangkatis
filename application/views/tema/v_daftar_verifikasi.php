<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
        <div class="row animated bounce">
	        <div class=" col-md-12 ">
	        
			<h1 class="login-logo narrow  namesystemlogin">Verifikasi Akun Email</h1>
	        </div>
	        <div class="login-box shadow bg-green radius">
			  <div class="login-box-body  ">
			 
			   <?php echo $this->session->flashdata('pesan'); ?>
			    <?php  
				echo form_open(base_url('daftar/verifikasi'));
				?>
			      <div class="form-group has-feedback">
			        <input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" 
			        autofocus value="<?php echo set_value('email'); ?> ">
			        <span class="glyphicon bg-green glyphicon-envelope form-control-feedback"></span>
			        <?php echo form_error('email', '<small class="text-red">', '</small>'); ?>
			      </div>
			      <div class="form-group has-feedback">
			        <input type="text" name="code" class="form-control" placeholder="Masukan Code" value="<?php echo set_value('code'); ?>" >
			        <span class=" bg-green fa fa-code form-control-feedback"></span>
			        <?php echo form_error('code', '<small class="text-red">', '</small>'); ?>
			      </div>
			      
			      <div class="row">
			     
			 	  <div class="col-md-12">
			          <button type="submit" class="btn radius  btn-default bg-green btn-block btn-flat ">Verifikasi</button>
			        </div>

			       </div>
			    <?php 
				echo form_close();
				?>
			  </div>
			</div>
        </div>
        <div class="row">
        	
        </div>
</div>

