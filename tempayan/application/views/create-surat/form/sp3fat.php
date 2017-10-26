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
							<p class="legend-form">SP3FAT</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" name="isi[no_surat_kuasa]" class="form-control" value="<?php echo set_value('isi[no_surat_kuasa]'); ?>">
							<p class="help-block"><?php echo form_error('isi[no_surat_kuasa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_surat_kuasa]" id="datepicker" value="<?php echo set_value('isi[tgl_surat_kuasa]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_surat_kuasa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal Diketahui : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_diketahui]" id="datepicker2" value="<?php echo set_value('isi[tgl_diketahui]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_diketahui]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Desa : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<select name="isi[desa]" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($this->create_surat->get_desa() as $row) :
					?>
								<option value="<?php echo $row->nama_desa; ?>" <?php if($row->id_desa==set_value('isi[desa]')) echo 'selected'; ?>><?php echo $row->nama_desa; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('isi[desa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>		
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Keterangan Tanah :</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Letak Tanah  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[letak_tanah]" class="form-control" cols="30" rows="3"><?php echo set_value('isi[letak_tanah]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[letak_tanah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Luas Tanah : <strong class="text-red">*</strong></label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">&plusmn;</span>
							  	<input type="text" id="generate-bilangan" class="form-control" name="isi[luas_tanah]" value="<?php echo set_value('isi[luas_tanah]'); ?>">
							  	<span class="input-group-addon">M<sup>2</sup></span>
							</div>
							<p style="padding:10px;"><small><i id="return-terbilang"></i></small></p>
							<p class="help-block"><?php echo form_error('isi[luas_tanah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12"><small>Batas Utara</small> : <strong class="text-red">*</strong></label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="isi[bts_utara][ket]" value="<?php echo set_value('isi[bts_utara][ket]'); ?>">
							<p class="help-block"><?php echo form_error('isi[bts_utara][ket]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-4">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[bts_utara][nama]" value="<?php echo set_value('isi[bts_utara][nama]'); ?>">
							  	<span class="input-group-addon">&plusmn;  M<sup>3</sup></span>
							</div>
							<p class="help-block"><?php echo form_error('isi[bts_utara][nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12"><small>Batas Timur</small> : <strong class="text-red">*</strong></label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="isi[bts_timur][ket]" value="<?php echo set_value('isi[bts_timur][ket]'); ?>">
							<p class="help-block"><?php echo form_error('isi[bts_timur][ket]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-4">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[bts_timur][nama]" value="<?php echo set_value('isi[bts_timur][nama]'); ?>">
							  	<span class="input-group-addon">&plusmn;  M<sup>3</sup></span>
							</div>
							<p class="help-block"><?php echo form_error('isi[bts_timur][nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12"><small>Batas Selatan</small> : <strong class="text-red">*</strong></label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="isi[bts_selatan][ket]" value="<?php echo set_value('isi[bts_selatan][ket]'); ?>">
							<p class="help-block"><?php echo form_error('isi[bts_selatan][ket]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-4">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[bts_selatan][nama]" value="<?php echo set_value('isi[bts_selatan][nama]'); ?>">
							  	<span class="input-group-addon">&plusmn;  M<sup>3</sup></span>
							</div>
							<p class="help-block"><?php echo form_error('isi[bts_selatan][nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12"><small>Batas Barat</small> : <strong class="text-red">*</strong></label>
						<div class="col-md-5">
							<input type="text" class="form-control" name="isi[bts_barat][ket]" value="<?php echo set_value('isi[bts_barat][ket]'); ?>">
							<p class="help-block"><?php echo form_error('isi[bts_barat][ket]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-4">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[bts_barat][nama]" value="<?php echo set_value('isi[bts_barat][nama]'); ?>">
							  	<span class="input-group-addon">&plusmn;  M<sup>3</sup></span>
							</div>
							<p class="help-block"><?php echo form_error('isi[bts_barat][nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tahun Kuasa : <strong class="text-red">*</strong></label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="isi[tahun_kuasa]" value="<?php echo set_value('isi[tahun_kuasa]'); ?>">
							<p class="help-block"><?php echo form_error('isi[tahun_kuasa]', '<small class="text-red">', '</small>'); ?></p>
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