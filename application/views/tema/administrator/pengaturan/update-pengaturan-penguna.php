<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('pesan'); ?></div>
	<dov class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-success">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(site_url('administrator/pengaturan/update/'.$get->ID), array('class' => 'form-horizontal'));

echo form_hidden('ID', $get->ID);
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Username : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="username" class="form-control" value="<?php echo $get->username; ?>">
						<p class="help-block"><?php echo form_error('username', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Nama Lengkap : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $get->nama_lengkap; ?>">
						<p class="help-block"><?php echo form_error('nama_lengkap', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Email : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="email" class="form-control" value="<?php echo $get->email; ?>">
						<p class="help-block"><?php echo form_error('email', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Telepon : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="no_hp" class="form-control" value="<?php echo $get->no_hp; ?>">
						<p class="help-block"><?php echo form_error('no_hp', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat"  class="form-control"><?php echo $get->alamat; ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="control-label col-md-3">Status : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="status" type="radio" value="yes" <?php if( $get->status =='yes') echo "checked"; ?>> <label> Ya</label> 
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status" type="radio" value="no" <?php if( $get->status =='no') echo "checked"; ?>> <label> Tidak</label> 
				       	</div>
				       	<p class="help-block"><?php echo form_error('status', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="name" class="control-label col-md-3">Level Akses : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="hak_akses" type="radio" value="admin" <?php if( $get->hak_akses =='admin') echo "checked"; ?>> <label> Admin</label> 
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="hak_akses" type="radio" value="operator" <?php if( $get->hak_akses =='operator') echo "checked"; ?>> <label> Operator</label> 
				       	</div>
				       	<p class="help-block"><?php echo form_error('hak_akses', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/pengaturan') ?>" class="btn btn-app pull-right">
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