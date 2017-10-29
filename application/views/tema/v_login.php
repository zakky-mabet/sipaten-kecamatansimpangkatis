<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:50px;"' : $browser ="style='padding-top:80px;' class='container'" ; ?>>
        <div class="row animated bounce">
	        <div class=" col-md-12 ">
	       
	        </div>
	        <div class="login-box shadow bg-green radius ">
	       
			  <div class="login-box-body  radius">
			 	<h1 style="margin-bottom:20px; margin-top: 0;" class="login-logo narrow  namesystemlogin ">Login Sistem</h1>
			   <?php echo $this->session->flashdata('pesan'); ?>
			    <?php  
				echo form_open(current_url().'?app='.$this->input->get('app'));
				?>
			      <div class="form-group has-feedback">
			        <input type="email" name="email" class="form-control" placeholder="Email" 
			        autofocus value="<?php echo set_value('email'); ?> ">
			        <span class="glyphicon bg-green glyphicon-envelope form-control-feedback"></span>
			        <?php echo form_error('email', '<small class="text-red">', '</small>'); ?>
			      </div>
			      <div class="form-group has-feedback">
			        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" >
			        <span class="glyphicon bg-green glyphicon-lock form-control-feedback"></span>
			        <?php echo form_error('password', '<small class="text-red">', '</small>'); ?>
			      </div>
			      <div class="form-group col-md-12">
	               
	                <div class="">
	                  <p class="captcha text-center"  id="text-captcha"><?php echo $captcha['word'] ?></p>
	                  <a href="" class="text-green" id="reload-captcha"><small><i>Reload captcha ...</i></small></a>
	                </div>
	                <input type="text" name="captcha" class="form-control" value="" placeholder="Masukkan kode diatas">
	                <?php echo form_error('captcha', '<small class="text-red">', '</small>'); ?>
	              </div>
			      <div class="row">
			     
			 	  <div class="col-md-12">
			          <button  type="submit" class="btn radius  btn-default bg-green btn-block btn-flat">Masuk</button>
			        </div>

			        <div class="col-md-12">
			        <br>
			         <a href="" class="text-green" ><p><!-- Lupa password ? --></p></a>
			        </div>
			       </div>
			    <?php 
				echo form_close();
				?>
			  </div>
			</div>

        </div>
        <div class="row">
        	<div class="col-md-12 text-center <?php echo $this->agent->is_mobile() ? ''	 : 'margin-top-10' ?>  narrow">
        		 <a class="text-green"  href="<?php echo site_url('daftar') ?>"><p> Buat Akun Pengguna Layanan</p></a>
        	</div>
        </div>
</div>

