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

echo form_hidden('ID', $get->id_surat);
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Kode Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-3">
						<input type="text" name="kode_surat" class="form-control" value="<?php echo $get->kode_surat; ?>">
						<p class="help-block"><?php echo form_error('kode_surat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Nama Label : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_surat" class="form-control" value="<?php echo $get->nama_kategori; ?>">
						<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Judul Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="judul_surat" class="form-control" value="<?php echo $get->judul_surat; ?>">
						<p class="help-block"><?php echo form_error('judul_surat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Nama Surat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
	                    <div class="radio radio-primary">
	                        <input name="jenis" value="non perizinan" <?php if($get->jenis=='non perizinan') echo "checked"; ?> type="radio">
	                        <label> Surat Non Perizinan</label>
	                    </div>
	                    <div class="radio radio-primary">
	                        <input name="jenis" value="perizinan" <?php if($get->jenis=='perizinan') echo "checked"; ?> type="radio">
	                        <label> Surat Perizinan</label>
	                    </div>
						<p class="help-block"><?php echo form_error('jenis', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-2 col-xs-12">Syarat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="syarat[]" class="form-control" multiple="multiple" style="height: 300px;" data-placeholder="Pilih syarat penerbitan surat" id="select-syarat">
					<?php  
					/**
					 * Loop data Syarat Surat
					 *
					 **/
					$syarat_data = explode(',', $get->syarat);

					foreach($syarat as $key => $value) :
					?>
							<option value="<?php echo $value->id_syarat; ?>" <?php if(is_integer(array_search($value->id_syarat, $syarat_data))) echo "selected"; ?>><?php echo $value->nama_syarat; ?></option>
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
						<input type="text" name="durasi" class="form-control" value="<?php echo $get->durasi; ?>" placeholder="00:00:00">
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