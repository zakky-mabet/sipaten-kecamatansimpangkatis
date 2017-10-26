<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Kode Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-3">
						<input type="text" name="kode_surat" class="form-control" value="<?php echo set_value('kode_surat'); ?>">
						<p class="help-block"><?php echo form_error('kode_surat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Nama Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_surat" class="form-control" value="<?php echo set_value('nama_surat'); ?>">
						<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Judul Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="judul_surat" class="form-control" value="<?php echo set_value('judul_surat'); ?>">
						<p class="help-block"><?php echo form_error('judul_surat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Jenis Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
	                    <div class="radio radio-primary">
	                        <input name="jenis" value="non perizinan" type="radio">
	                        <label> Surat Non Perizinan</label>
	                    </div>
	                    <div class="radio radio-primary">
	                        <input name="jenis" value="perizinan" type="radio">
	                        <label> Surat Perizinan</label>
	                    </div>
						<p class="help-block"><?php echo form_error('jenis', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-2 col-xs-12">Syarat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="syarat[]" class="form-control" multiple="multiple" data-placeholder="Pilih syarat penerbitan surat" id="select-syarat">
					<?php  
					/**
					 * Loop data Syarat Surat
					 *
					 **/
					foreach($syarat as $row) :
					?>
							<option value="<?php echo $row->id_syarat; ?>"><?php echo $row->nama_syarat; ?></option>
							
					<?php  
					endforeach;
					?>
						</select>
						<p class="help-block"><?php echo form_error('syarat[]', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="durasi" class="control-label col-md-2 col-xs-12">Waktu Pelayanan : <strong class="text-red">*</strong></label>
					<div class="col-md-3">
						<input type="text" name="durasi" class="form-control" value="<?php echo set_value('durasi'); ?>" placeholder="00:00:00">
						<p class="help-block"><?php echo form_error('durasi', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-3 col-xs-5">
					<a href="<?php echo site_url('surat') ?>" class="btn btn-app pull-right">
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