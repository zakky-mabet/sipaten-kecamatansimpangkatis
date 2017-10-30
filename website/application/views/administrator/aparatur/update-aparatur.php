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
					<label for="email" class="control-label col-md-3 col-xs-12">Nama Lengkap : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $get->nama_lengkap; ?>">
						<p class="help-block"><?php echo form_error('nama_lengkap', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">NIP : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nip" class="form-control" value="<?php echo $get->nip; ?>">
						<p class="help-block"><?php echo form_error('nip', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Pangkat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="pangkat" class="form-control" value="<?php echo $get->pangkat; ?>">
						<p class="help-block"><?php echo form_error('pangkat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Tempat, Tanggal Lahir : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $get->tmp_lahir; ?>">
						<p class="help-block"><?php echo form_error('tmp_lahir', '<small class="text-red">', '</small>'); ?></p>
					</div>
					<div class="col-md-4">
						<input type="text" id="datepicker" placeholder="Ex : 1996-06-27" name="tgl_lahir" class="form-control" value="<?php echo $get->tgl_lahir; ?>">
						<p class="help-block"><?php echo form_error('tgl_lahir', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Agama : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<select name="agama" class="form-control">
                      <option <?php echo set_select('agama', '',TRUE); ?> value="">-- PILIH --</option>
                      <?php foreach ($this->setting->agama() as $key => $value) { ?>
                           <option <?php if ($get->agama == $value->agama): ?> selected <?php endif ?>  <?php echo set_select('agama', $value->agama); ?> value="<?php echo $value->agama ?>"><?php echo $value->agama ?></option>
                      <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('agama', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					  <textarea name="alamat"  placeholder="Ex : Jln. Raya Simpang Katis No. 141 RT. 05 Kel. Simpang Katis Kecamatan Simpang Katis Kabupaten Bangka Tengah" class="form-control"><?php echo $get->alamat;?></textarea>
		              <span class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Hobi : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="hobbi" class="form-control" value="<?php echo $get->hobbi; ?>">
						<p class="help-block"><?php echo form_error('hobbi', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Motto Hidup : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="motto_hidup" class="form-control" value="<?php echo $get->motto_hidup; ?>">
						<p class="help-block"><?php echo form_error('motto_hidup', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Jabatan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="jabatan" class="form-control" value="<?php echo $get->jabatan; ?>">
						<p class="help-block"><?php echo form_error('jabatan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>		

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Foto : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
					<input type="file" name="foto" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Tautan Facebook : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="facebook" placeholder="Ex : https://www.facebook.com/username" class="form-control" value="<?php echo $get->facebook; ?>">
						<p class="help-block"><?php echo form_error('facebook', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Tautan Google Plus : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="gplus" placeholder="Ex : https://www.googleplus.com/username"  class="form-control" value="<?php echo $get->gplus; ?>">
						<p class="help-block"><?php echo form_error('gplus', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Tautan Twitter : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="twitter" placeholder="Ex : https://www.twitter.com/username"  class="form-control" value="<?php echo $get->twitter; ?>">
						<p class="help-block"><?php echo form_error('twitter', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Tautan Instagram : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="instagram" placeholder="Ex : https://www.instagram.com/username"  class="form-control" value="<?php echo $get->instagram; ?>">
						<p class="help-block"><?php echo form_error('instagram', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/aparatur') ?>" class="btn btn-app pull-right">
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