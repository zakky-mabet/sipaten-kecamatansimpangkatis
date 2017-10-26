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
					<label for="email" class="control-label col-md-3 col-xs-12">Judul : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="title" class="form-control" value="<?php echo $get->title; ?>">
						<p class="help-block"><?php echo form_error('title', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Deskripsi Singkat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea class="form-control" name="short_descriptions"><?php echo $get->short_descriptions; ?></textarea>
						<p class="help-block"><?php echo form_error('short_descriptions', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Deskripsi Lengkap : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<textarea name="descriptions" id="summernote" rows="20" cols="44" class="form-control"><?php echo $get->descriptions; ?></textarea>
						<p class="help-block"><?php echo form_error('descriptions', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Kategori : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<select name="kategori" class="form-control">

                    
                      <?php foreach ($this->setting->kategori() as $key => $value) { ?>
                           <option <?php if ($get->kategori == $value->id_kat): ?> selected <?php endif ?> <?php echo set_select('kategori', $value->id_kat); ?>  value="<?php echo $value->id_kat ?>"><?php echo $value->nama ?></option>
                      <?php } ?>
                    </select>
                    <p class="help-block"><?php echo form_error('kategori', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
              	<label for="email" class="control-label col-md-3 col-xs-12">Tags : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Minimal satu tag" style="width: 100%;">              
                <?php  
                					
					$tags = explode(',', $get->tags);

					foreach($this->setting->tags() as $key => $value) :
					?>
							<option value="<?php echo $value->id; ?>" <?php if(is_integer(array_search($value->id, $tags))) echo "selected"; ?>><?php echo $value->nama; ?></option>
					<?php  
					endforeach;
					?>
					 </select>
                <p class="help-block"><?php echo form_error('tags[]', '<small class="text-red">', '</small>'); ?></p>
              	</div>
              </div>

              	<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Slider : <strong class="text-red">*</strong></label>
					<div class="col-md-8 ">
						 <input type="radio" <?php if ($get->slider == 'yes'): ?>checked <?php endif ?> name="slider" value="yes" <?php echo set_radio('slider','yes');?>  class=" ">&nbsp;&nbsp;YA&nbsp;&nbsp;
	              		<input type="radio" <?php if ($get->slider == 'no'): ?>checked <?php endif ?>  name="slider" value="no" <?php echo set_radio('slider','no');?> class=" ">&nbsp;&nbsp;  TIDAK <br>
						<p class="help-block"><?php echo form_error('slider', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Foto : <strong class="text-red">*</strong></label>
					<div class="col-md-8 ">
					<input type="file" name="foto" required="required" class="form-control">
					</div>
				</div>

			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/berita') ?>" class="btn btn-app pull-right">
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