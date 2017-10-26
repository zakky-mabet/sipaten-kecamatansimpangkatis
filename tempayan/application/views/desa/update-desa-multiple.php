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
echo form_open(site_url('desa/bulk_action'), array('class' => 'form-horizontal'));

if(is_array($this->input->post('desa'))) :
	foreach($this->input->post('desa') as $key => $value) :
		$get = $this->desa->get($value);
		echo form_hidden('ID[]', $get->id_desa);
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Desa : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="desa[]" class="form-control" value="<?php echo $get->nama_desa; ?>">
						<p class="help-block"><?php echo form_error('desa', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Nama Kepala Desa : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="kepala_desa[]" class="form-control" value="<?php echo $get->kepala_desa; ?>">
						<p class="help-block"><?php echo form_error('kepala_desa', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>
			<hr>
<?php  
endforeach;
?>
			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('desa') ?>" class="btn btn-app pull-right">
						<i class="ion ion-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-6 col-xs-6">
					<button type="submit" name="action" value="update" class="btn btn-app pull-right">
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

else :
	$this->template->alert(
		' Tidak ada data yang dipilih.', 
		array('type' => 'warning','icon' => 'warning')
	);
	redirect('desa');
endif;
?>
		</div>
	</dov>
</div>