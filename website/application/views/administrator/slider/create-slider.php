<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-success">
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
					<label for="email" class="control-label col-md-3 col-xs-12">Judul : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="judul" class="form-control" value="<?php echo set_value('judul'); ?>">
						<p class="help-block"><?php echo form_error('judul', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Deskripsi Pendek: <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<textarea name="short_description" rows="3" class="form-control"><?php echo set_value('short_description'); ?></textarea>
						<p class="help-block"><?php echo form_error('short_description', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
		
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Link : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" placeholder="Ex : http://localhost/website-kec-koba/berita/get/menataplah-terus-kedepan" name="link" class="form-control" value="<?php echo set_value('link'); ?>">
						<p class="help-block"><?php echo form_error('link', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Foto : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
						<input type="file" name="img" class="form-control" value="">
						
					</div>
				</div>
				
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/slider') ?>" class="btn btn-app pull-right">
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