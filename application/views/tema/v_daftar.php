<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container" style="padding-top:60px;"' : $browser ="style='padding-top:90px;' class='container'" ; ?>> 
        <div class="row animated bounce">
    
			<div class="col-md-7 text-center">
					<?php echo $this->session->flashdata('pesan'); ?>
					<h1>Buat Akun Anda</h1>
					<p>	Anda hanya membutuhkan satu akun, Satu akun memberikan Anda akses ke semua produk ini.</p>
					<br>
					<p> <img width="100%" src="<?php echo base_url('assets/img/layanan.png') ?> " alt="produk sipaten kecamatan koba"> </p>
			</div>
			<div class="col-md-5 ">
				<div class="box box-warning radius">
		            <div class="box-body">
		     <form id="defaultForm" action="<?php echo current_url('index') ?>" method="post" accept-charset="utf-8">
		              <div class="form-group">
		                <label>Nama lengkap</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-user"></i>
		                  </div>
		                  <input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap') ?> " class="form-control pull-right" >
		                </div>
		                <?php echo form_error('nama_lengkap', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Username</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-user"></i>
		                  </div>
		                  <input type="text" name="username" value="<?php echo set_value('username') ?> " class="form-control pull-right" >
		                </div>
		                <?php echo form_error('username', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Email</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-envelope"></i>
		                  </div>
		                  <input type="text" value="<?php echo set_value('email') ?> " name="email" class="form-control pull-right">
		                </div>
		                <?php echo form_error('email', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Sandi</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-lock"></i>
		                  </div>
		                  <input type="password"  value="<?php echo set_value('buat_sandi') ?>" name="buat_sandi" class="form-control pull-right">
		                </div>
		                <?php echo form_error('buat_sandi', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Konfirmasi sandi anda</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-lock"></i>
		                  </div>
		                  <input type="password" value="<?php echo set_value('konfirmasi_sandi') ?>" name="konfirmasi_sandi" class="form-control pull-right">
		                </div>
		                <?php echo form_error('konfirmasi_sandi', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Tanggal lahir</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" name="tgl_lahir" value="<?php echo set_value('tgl_lahir') ?> " id="datepicker" class="form-control pull-right">
		                </div>
		                 <?php echo form_error('tgl_lahir', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Jenis kelamin</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-genderless"></i>
		                  </div>
		                 <select class="form-control" style="width: 100%;"  name="jns_kelamin">
			                  <option <?php echo set_select('jns_kelamin', '',TRUE); ?> value="">-- jenis kelamin --</option>
			                  <option  <?php echo set_select('jns_kelamin', 'laki-laki'); ?>  value="laki-laki">Laki-laki</option>
			                   <option <?php echo set_select('jns_kelamin', 'perempuan'); ?> value="perempuan">Perempuan</option>

			                </select>
		                </div>
		                 <?php echo form_error('jns_kelamin', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">
		                <label>Ponsel</label>
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-phone"></i>
		                  </div>
		                  <input type="number" value="<?php echo set_value('ponsel'); ?>" name="ponsel" class="form-control pull-right">
		                </div>
		                <?php echo form_error('ponsel', '<small class="text-red">', '</small>'); ?>
		              </div>

		              <div class="form-group">                
		                  <input type="submit" id="validateBtn" value="Daftar" name="signup" class="form-control btn btn-warning">
		              </div>

		            </div>
		            </form>
		            <div class="box-footer radius">
					    <div class="pull-left">
					   <!-- <a href="" class="text-orange">Pelajari</a> mengapa kami meminta informasi ini. -->
					    </div>
					  </div><!-- /.box-footer-->
		        </div>
			</div>
        </div> <!-- row animated -->
</div>

