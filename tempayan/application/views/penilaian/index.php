<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open_multipart(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Pertanyaan : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<textarea name="option[pertanyaan_penilaian]" class="form-control" rows="4"><?php echo $this->option->get('pertanyaan_penilaian'); ?></textarea>
						<p class="help-block"><?php echo form_error('option[pertanyaan_penilaian]', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<?php  
				/**
				 * Get Answer 
				 *
				 * @var string
				 **/
				foreach($this->penilaian->get_answers() as $key => $value) :
				?>
				<div class="form-group">
					<label class="control-label col-md-2 col-xs-12">Jawaban <?php echo ++$key; ?> : <strong class="text-red">*</strong></label>
					<div class="col-md-5">
						<input type="text" name="jawaban[<?php echo $value->ID; ?>]" class="form-control" value="<?php echo $value->jawaban; ?>">
						<p class="help-block"><?php echo form_error("jawaban[{$value->ID}]", '<small class="text-red">', '</small>'); ?></p>
						<input type="file" name="<?php echo $value->ID; ?>" class="form-control">
					</div>
					<div class="col-md-4" style="margin-left: 50px;">
						<img src="<?php echo base_url("public/image/emoji/{$value->icon}"); ?>" width="100" alt="Icon Jawaban">
					</div>
				</div>
				<?php  
				endforeach;
				?>
				<div class="form-group">
					<label for="email" class="control-label col-md-2 col-xs-12">Audio Speech : <strong class="text-red">*</strong></label>
					<div class="col-md-5">
						<textarea name="option[audio_speech]" class="form-control" rows="4"><?php echo $this->option->get('audio_speech'); ?></textarea>
						<p class="help-block"><?php echo form_error('option[audio_speech]', '<small class="text-red">', '</small>'); ?></p>
					</div>
					<div class="col-md-4">
						<button type="button" class="get-speech btn btn-app hvr-shadow"><i class="fa fa-play"></i> Test Audio</button>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo $this->input->get('from_url') ?>" class="btn btn-app pull-right">
						<i class="ion ion-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-5 col-xs-6">
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
<?php
/* End of file index.php */
/* Location: ./application/views/penilaian/index.php */