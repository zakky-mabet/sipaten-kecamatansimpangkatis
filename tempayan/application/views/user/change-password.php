<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-8 col-md-offset-2 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open_multipart(current_url(), array('class' => 'form-horizontal'));

echo form_hidden('ID', $get->user_id);
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="nip" class="control-label col-md-3 col-xs-12">NIP : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nip" class="form-control" value="<?php echo $get->nip; ?>">
						<p class="help-block"><?php echo form_error('nip', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Nama Pengguna : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="name" class="form-control" value="<?php echo $get->name; ?>">
						<p class="help-block"><?php echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-primary">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat" class="form-control" rows="3"><?php echo $get->address; ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">E-Mail : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="email" name="email" class="form-control" value="<?php echo $get->email; ?>">
						<p class="help-block"><?php echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="phone" class="control-label col-md-3 col-xs-12">Nomor Telepon : <strong class="text-primary">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="phone" class="form-control" value="<?php echo $get->phone; ?>">
						<p class="help-block"><?php echo form_error('phone', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="file_excel" class="control-label col-md-3 col-xs-12">Foto : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="file" name="file_foto" class="form-control" id="file-excel">
						<p class="help-block"><?php echo form_error('file_excel', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group" id="block-new-password">
					<label for="new_pass" class="control-label col-md-3 col-xs-12">Password Baru : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="password" name="new_pass" class="form-control" value="<?php echo set_value('new_pass'); ?>">
						<p class="help-block"><?php echo form_error('new_pass', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group" id="block-new-password-again">
					<label for="repeat_pass" class="control-label col-md-3 col-xs-12">Ulangi : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="password" name="repeat_pass" class="form-control" value="<?php echo set_value('repeat_pass'); ?>">
						<p class="help-block"><?php echo form_error('repeat_pass', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group" id="block-new-password-old">
					<label for="old_pass" class="control-label col-md-3 col-xs-12">Password Lama : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="password" name="old_pass" class="form-control" value="<?php echo set_value('old_pass'); ?>">
						<p class="help-block"><?php echo form_error('old_pass', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>
			<div class="box-footer with-border">
				<div class="col-md-6">
					<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
					<small><strong class="text-blue">*</strong>	Field Optional (Bila ingin mengganti password)</small>
				</div>
				<div class="hidden-md hidden-lg"><hr></div>
				<div class="col-md-5 col-xs-12">
					<button type="submit" class="btn btn-app hvr-shadow pull-right" id="button-simpan">
						<i class="fa fa-save"></i>
						Simpan
					</button>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>