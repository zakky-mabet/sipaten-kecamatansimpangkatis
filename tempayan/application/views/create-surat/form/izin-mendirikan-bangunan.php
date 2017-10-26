<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo $title; ?></h3>
            </div>
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-7">
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7 block-no-surat">
							<strong><?php echo $surat->kode_surat; ?>/</strong>
							<input type="text" name="nomor_surat" class="no_surat" id="no_surat" value="<?php echo $this->create_surat->get_nomor_surat($surat->id_surat, null); ?>" readonly="true">
							<strong>/<?php echo $this->option->get('kode_kecamatan'); ?>/<?php echo date('Y') ?></strong>
							<p class="help-block"><?php echo form_error('nomor_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Kelurahan / Desa</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Desa : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<select name="isi[desa]" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($this->create_surat->get_desa() as $row) :
					?>
								<option value="<?php echo $row->id_desa; ?>" <?php if($row->id_desa==set_value('isi[desa]')) echo 'selected'; ?>><?php echo $row->nama_desa; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('isi[desa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Mendirikan Bangunan :</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Perusahaan/Perseroan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama_perusahaan]" class="form-control" value="<?php echo set_value('isi[nama_perusahaan]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nama_perusahaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Perusahaan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea class="form-control" name="isi[alamat_perusahaan]" rows="3"><?php echo set_value('isi[alamat_perusahaan]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_perusahaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jenis Bangunan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[jenis_bangunan]" class="form-control" value="<?php echo set_value('isi[jenis_bangunan]'); ?>">
							<p class="help-block"><?php echo form_error('isi[jenis_bangunan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Lokasi Bangunan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea class="form-control" name="isi[lokasi_bangunan]" rows="3"><?php echo set_value('isi[lokasi_bangunan]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[lokasi_bangunan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Luas Bangunan : <strong class="text-red">*</strong></label>
						<label class="control-label col-md-1">Lt. 1 <strong class="text-red">*</strong></label>
						<div class="col-md-6">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[luas_bangunan][0][0]" value="<?php echo set_value('isi[luas_bangunan][0][0]'); ?>">
							  	<span class="input-group-addon">X</span>
						  		<input type="text" class="form-control" name="isi[luas_bangunan][0][1]" value="<?php echo set_value('isi[luas_bangunan][0][1]'); ?>">
							  	<span class="input-group-addon">=</span>
								<input type="text" class="form-control" name="isi[luas_bangunan][0][2]" value="<?php echo set_value('isi[luas_bangunan][0][2]'); ?>">
								<strong class="input-group-addon">M<sup>2</sup></strong>
							</div>
							<p class="help-block">
								<?php echo form_error('isi[luas_bangunan][0][0]', '<small class="text-red">', '</small>'); ?> 
								<?php echo form_error('isi[luas_bangunan][0][1]', '<small class="text-red">', '</small>'); ?> 
								<?php echo form_error('isi[luas_bangunan][0][2]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<label class="control-label col-md-1 col-md-offset-3">Lt. 2 <strong class="text-primary">*</strong></label>
						<div class="col-md-6">
							<div class="input-group">
						  		<input type="text" class="form-control" name="isi[luas_bangunan][1][0]" value="<?php echo set_value('isi[luas_bangunan][1][0]'); ?>">
							  	<span class="input-group-addon">X</span>
						  		<input type="text" class="form-control" name="isi[luas_bangunan][1][1]" value="<?php echo set_value('isi[luas_bangunan][1][1]'); ?>">
							  	<span class="input-group-addon">=</span>
								<input type="text" class="form-control" name="isi[luas_bangunan][1][2]" value="<?php echo set_value('isi[luas_bangunan][1][2]'); ?>">
								<strong class="input-group-addon">M<sup>2</sup></strong>
							</div>
							<p class="help-block"></p>
						</div>
						<label class="control-label col-md-1 col-md-offset-3">Lt. 3 <strong class="text-primary">*</strong></label>
						<div class="col-md-6">
							<div class="input-group">
						  		<input type="text" class="form-control" name="isi[luas_bangunan][2][0]" value="<?php echo set_value('isi[luas_bangunan][2][0]'); ?>">
							  	<span class="input-group-addon">X</span>
						  		<input type="text" class="form-control" name="isi[luas_bangunan][2][1]" value="<?php echo set_value('isi[luas_bangunan][2][1]'); ?>">
							  	<span class="input-group-addon">=</span>
								<input type="text" class="form-control" name="isi[luas_bangunan][2][2]" value="<?php echo set_value('isi[luas_bangunan][2][2]'); ?>">
								<strong class="input-group-addon">M<sup>2</sup></strong>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">GSB <small>(Garis Sempadan Bangunan)</small> : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[gsb]" class="form-control" value="<?php echo set_value('isi[gsb]'); ?>">	
							<p class="help-block"><?php echo form_error('isi[gsb]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Bagi mereka yang tempat usahanya bukan milik sendiri</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Pemilik Tanah : <strong class="text-primary">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama_pemilik_tanah]" class="form-control" value="<?php echo set_value('isi[nama_pemilik_tanah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nama_pemilik_tanah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Pemilik Tanah : <strong class="text-primary">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat_pemilik]" rows="3" class="form-control"><?php echo set_value('isi[alamat_pemilik]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_pemilik]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jangka Waktu : <strong class="text-primary">*</strong></label>
						<div class="col-md-3">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[jangka_tahun]" value="<?php echo set_value('isi[jangka_tahun]'); ?>">
							  	<span class="input-group-addon">Tahun</span>
							</div>
							<p class="help-block"><?php echo form_error('isi[jangka_tahun]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
			            	<div class="input-group registration-date-time">
			            		<input class="form-control input-sm" name="isi[jangka_mulai]" value="<?php echo set_value('isi[jangka_mulai]'); ?>" id="datepicker" placeholder="Mulai Tanggal ..">
			            		<span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
			            		<input class="form-control input-sm" name="isi[jangka_akhir]" value="<?php echo set_value('isi[jangka_akhir]'); ?>" id="datepicker2" placeholder="Sampai Tanggal ..">
			            	</div>	
							<p class="help-block"><?php echo form_error('isi[jangka_mulai]', '<small class="text-red">', '</small>'); ?></p>
							<p class="help-block"><?php echo form_error('isi[jangka_akhir]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form"></p>
						</div>
						<label for="pemeriksa" class="control-label col-md-3 col-xs-12">Petugas Verifikasi : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<select name="pemeriksa" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($pemeriksa as $row) :
					?>
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==set_value('pemeriksa')) echo 'selected'; ?>><?php echo $row->nama; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('pemeriksa', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanda Tangan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<select name="ttd_pejabat" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($pegawai as $row) :
					?>
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==set_value('ttd_pejabat')) echo 'selected'; ?>><?php echo $row->nama; ?> (<?php echo $row->jabatan; ?>)</option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('ttd_pejabat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-12"> <hr> </div>
						<div class="col-md-4">
							<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
							<small><strong class="text-blue">*</strong>	Field Optional</small>
						</div>
						<div class="col-md-3 col-xs-6 pull-right">
							<button type="submit" class="btn btn-app">
								<i class="fa fa-save"></i> Simpan
							</button>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<?php  
					/**
					 * Tampilkan Data Pemohon
					 *
					 * @var string
					 **/
					$this->load->view('create-surat/data-pemohon');
					?>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</div>
</div>