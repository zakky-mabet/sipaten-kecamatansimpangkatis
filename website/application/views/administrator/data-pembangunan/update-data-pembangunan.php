<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Nama Kegiatan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $get->nama_kegiatan; ?>">
						<p class="help-block"><?php echo form_error('nama_kegiatan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Lokasi : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<select name="lokasi" class="form-control">
                      <option <?php echo set_select('lokasi', '',TRUE); ?> value="">-- PILIH --</option>
                      <?php foreach ($this->setting->master_desa() as $key => $value) { ?>
                           <option <?php if ($value->kelurahan_desa == $get->lokasi): ?>
                           	selected
                           <?php endif ?> <?php echo set_select('lokasi', $value->kelurahan_desa); ?> value="<?php echo $value->kelurahan_desa ?>"><?php echo $value->kelurahan_desa ?></option>
                      <?php } ?>
                    </select>
                    <p class="help-block"><?php echo form_error('lokasi', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Sasaran : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="sasaran" class="form-control" value="<?php echo $get->sasaran; ?>">
						<span class="help-block"><?php echo form_error('sasaran', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Volume : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="volume" class="form-control" value="<?php echo $get->volume; ?>">
						<span class="help-block"><?php echo form_error('volume', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Dana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="dana" class="form-control" value="<?php echo $get->dana; ?>">
						<span class="help-block"><?php echo form_error('dana', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Sumber : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="sumber" class="form-control" value="<?php echo $get->sumber; ?>">
						<span class="help-block"><?php echo form_error('sumber', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Tahun : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="number" name="tahun" class="form-control" value="<?php echo $get->tahun; ?>">
						<span class="help-block"><?php echo form_error('tahun', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Pola Pelaksanaan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="pola_pelaksanaan" class="form-control" value="<?php echo $get->pola_pelaksanaan; ?>">
						<span class="help-block"><?php echo form_error('pola_pelaksanaan', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Penanggung Jawab : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="penanggung_jawab" class="form-control" value="<?php echo $get->penanggung_jawab; ?>">
						<span class="help-block"><?php echo form_error('penanggung_jawab', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/data_pembangunan') ?>" class="btn btn-app pull-right">
						<i class="ion ion-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-6 col-xs-6">
					<button type="submit" class="btn btn-app pull-right">
						<i class="fa fa-save"></i> Simpan
					</button>
				</div>
			</div>
			<div class="box-footer with-border">
					<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
					<small><strong class="text-blue">*</strong>	Field Optional</small>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>