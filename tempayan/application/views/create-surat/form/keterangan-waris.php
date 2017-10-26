<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"> <?php echo $title; ?></h3>
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
							<p class="legend-form">Surat Keterangan Usaha dari Kades / Lurah</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Pejabat Lurah / Kades  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[pejabat_lurah]" class="form-control" value="<?php echo set_value('isi[pejabat_lurah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">NIP : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[nip_pejabat_lurah]" value="<?php echo set_value('isi[nip_pejabat_lurah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nip_pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Perangkat/Golongan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[perangkat_desa]" value="<?php echo set_value('isi[perangkat_desa]'); ?>">
							<p class="help-block"><?php echo form_error('isi[perangkat_desa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jabatan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[jabatan_pejabat_lurah]" value="<?php echo set_value('isi[nama_desa]'); ?>">
							<p class="help-block"><?php echo form_error('isi[jabatan_pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Surat Pernyataan Para Ahli Waris </p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_surat_waris]" id="datepicker" value="<?php echo set_value('isi[tgl_surat_waris]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_surat_waris]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Diketahui Oleh : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[diketahui_oleh]" value="<?php echo set_value('isi[diketahui_oleh]'); ?>">
							<p class="help-block"><?php echo form_error('isi[diketahui_oleh]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal Diketahui : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[tgl_diketahui]" id="datepicker4" value="<?php echo set_value('isi[tgl_diketahui]'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_diketahui]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Akta Kematian </p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Akta : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[no_akta_kematian]" value="<?php echo set_value('isi[no_akta_kematian]'); ?>">
							<p class="help-block"><?php echo form_error('isi[no_akta_kematian]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Ditandatangani Oleh : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[akta_ttd]" value="<?php echo set_value('isi[akta_ttd]'); ?>">
							<p class="help-block"><?php echo form_error('isi[akta_ttd]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_akta]" id="datepicker2" value="<?php echo set_value('isi[tgl_akta]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_akta]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Keterangan Kematian </p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[nama]" value="<?php echo set_value('isi[nama]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Umur : <strong class="text-red">*</strong></label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="isi[umur]" value="<?php echo set_value('isi[umur]'); ?>">
							<p class="help-block"><?php echo form_error('isi[umur]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat]" rows="3" class="form-control"><?php echo set_value('isi[alamat]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Hari Kematian : <strong class="text-red">*</strong></label>
						<div class="col-md-4">
							<select name="isi[hari_mati]" class="form-control">
								<option value="">-- PILIH --</option>
								<option value="senin" <?php if(set_value('isi[hari_mati]')=='senin') echo "selected"; ?>>Senin</option>
								<option value="selasa" <?php if(set_value('isi[hari_mati]')=='selasa') echo "selected"; ?>>Selasa</option>
								<option value="rabu" <?php if(set_value('isi[hari_mati]')=='rabu') echo "selected"; ?>>Rabu</option>
								<option value="kamis" <?php if(set_value('isi[hari_mati]')=='kamis') echo "selected"; ?>>Kamis</option>
								<option value="jumat" <?php if(set_value('isi[hari_mati]')=='jumat') echo "selected"; ?>>Jumat</option>
								<option value="sabtu" <?php if(set_value('isi[hari_mati]')=='sabtu') echo "selected"; ?>>Sabtu</option>
								<option value="minggu" <?php if(set_value('isi[hari_mati]')=='minggu') echo "selected"; ?>>Minggu</option>
							</select>
							<p class="help-block"><?php echo form_error('isi[hari_mati]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_mati]" id="datepicker3" value="<?php echo set_value('isi[tgl_mati]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_mati]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Di/Tempat : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[tmp_mati]" value="<?php echo set_value('isi[tmp_mati]'); ?>">
							<p class="help-block"><?php echo form_error('isi[tmp_mati]', '<small class="text-red">', '</small>'); ?></p>
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