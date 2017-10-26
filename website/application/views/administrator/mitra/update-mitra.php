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
					<label for="email" class="control-label col-md-3 col-xs-12">Nama Mitra : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="title" class="form-control" value="<?php echo $get->title; ?>">
						<p class="help-block"><?php echo form_error('title', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Link : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="link" placeholder="Ex : https://www.teitramega.co.id" class="form-control" value="<?php echo $get->link; ?>">
						<span class="help-block"> <?php echo form_error('link', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>				
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Foto/Logo : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="file" required="required" name="foto" class="form-control" >	
						<span class="help-block"><i>Ukuran 400 x 519</i></span>
					</div>
				</div>
				
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/mitra') ?>" class="btn btn-app pull-right">
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