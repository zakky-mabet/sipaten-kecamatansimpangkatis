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
						<input type="text" name="title" class="form-control" value="<?php echo $get->title; ?>">
						<p class="help-block"><?php echo form_error('title', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Album : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<select name="album" class="form-control">
                     
                      <?php foreach ($this->setting->album() as $key => $value) { ?>

                           <option <?php echo set_select('album', $value->id); ?> <?php if ($get->id_album_galeri == $value->id) { echo 'selected'; } ?> value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                      <?php } ?>
                    </select>
                    <p class="help-block"><?php echo form_error('album', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">foto : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="file" required="required" name="foto" class="form-control" >
						
					</div>
				</div>			
				
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/galeri') ?>" class="btn btn-app pull-right">
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