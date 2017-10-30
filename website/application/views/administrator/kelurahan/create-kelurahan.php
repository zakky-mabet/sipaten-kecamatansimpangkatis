<div class="row">
	<div class="col-md-12 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-success">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('enctype'=>'multipart/form-data'));
?>
			<div class="box-body" style="margin-top: 10px;">

			<div class="col-md-6">
				
				<div class="form-group">
					<label class="control-label">Nama Kelurahan/Desa : <strong class="text-red">*</strong></label>
						<input type="text" name="post[nama_desa]" class="form-control" value="<?php echo set_value('post[nama_desa]'); ?>">
						<span class="help-block"><?php echo form_error('post[nama_desa]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Nama Kades : <strong class="text-red">*</strong></label>
					<input type="text" name="post[nama_kades]" class="form-control" value="<?php echo set_value('post[nama_kades]'); ?>">
					<span class="help-block"><?php echo form_error('post[nama_kades]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">NIP : <strong class="text-red">*</strong></label>
						<input type="text" name="post[nip]" class="form-control" value="<?php echo set_value('post[nip]'); ?>">
						<span class="help-block"><?php echo form_error('post[nip]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Pangkat : <strong class="text-red">*</strong></label>
						<input type="text" name="post[pangkat]" class="form-control" value="<?php echo set_value('post[pangkat]'); ?>">
						<span class="help-block"><?php echo form_error('post[pangkat]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Jabatan : <strong class="text-red">*</strong></label>
						<input type="text" name="post[jabatan]" class="form-control" value="<?php echo set_value('post[jabatan]'); ?>">
						<span class="help-block"><?php echo form_error('post[jabatan]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Tempat Lahir : <strong class="text-red">*</strong></label>
						<input type="text" name="post[tmp_lahir]" class="form-control" value="<?php echo set_value('post[tmp_lahir]'); ?>">
						<span class="help-block"><?php echo form_error('post[tmp_lahir]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Tanggal Lahir : <strong class="text-red">*</strong></label>
						<input type="text" name="post[tgl_lahir]" id="datepicker" placeholder="Ex : 1995-12-23" class="form-control" value="<?php echo set_value('post[tgl_lahir]'); ?>">
						<span class="help-block"><?php echo form_error('post[tgl_lahir]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
                  <label  class="control-label ">Agama : <span class="text-red">*</span></label>
                    <select name="post[agama]" class="form-control">
                      <option <?php echo set_select('post[agama]', '',TRUE); ?> value="">-- PILIH --</option>
                      <?php foreach ($this->setting->agama() as $key => $value) { ?>
                           <option <?php echo set_select('post[agama]', $value->agama); ?> value="<?php echo $value->agama ?>"><?php echo $value->agama ?></option>
                      <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('post[agama]', '<small class="text-red">', '</small>'); ?></span>
            	</div>

            	<div class="form-group">
					<label class="control-label">Hobi : <strong class="text-red">*</strong></label>
						<input type="text" name="post[hobbi]" class="form-control" value="<?php echo set_value('post[hobbi]'); ?>">
						<span class="help-block"><?php echo form_error('post[hobbi]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Motto Hidup Kades : <strong class="text-red">*</strong></label>
						<input type="text" name="post[motto_hidup]" class="form-control" value="<?php echo set_value('post[motto_hidup]'); ?>">
						<span class="help-block"><?php echo form_error('post[motto_hidup]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
		            <label  class="control-label">Alamat : <span class="text-red">*</span></label>
		              <textarea name="post[alamat]"  placeholder="Ex : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('post[alamat]');?></textarea>
		              <span class="help-block"><?php echo form_error('post[alamat]', '<small class="text-red">', '</small>'); ?></span>
		        </div>

		        <div class="form-group">
					<label class="control-label">Foto Kades : <strong class="text-red">*</strong></label>
						<input type="file" name="foto" class="form-control" >
				</div>

			</div>

			<div class="col-md-6">

				<div class="form-group">
					<label class="control-label">Email Kelurahan/Desa : <strong class="text-red">*</strong></label>
						<input type="text" name="post[email_desa]" class="form-control" value="<?php echo set_value('post[email_desa]'); ?>">
						<span class="help-block"><?php echo form_error('post[email_desa]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Alamat Website : <strong class="text-red">*</strong></label>
						<input type="text" name="post[alamat_website]" class="form-control" value="<?php echo set_value('post[alamat_website]'); ?>">
						<span class="help-block"><?php echo form_error('post[alamat_website]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Luas Wilayah : <strong class="text-red">*</strong></label>
						<input type="text" name="post[luas_wilayah]" class="form-control" value="<?php echo set_value('post[luas_wilayah]'); ?>">
						<span class="help-block"><?php echo form_error('post[luas_wilayah]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Jumlah RT : <strong class="text-red">*</strong></label>
						<input type="text" name="post[jmlh_rt]" class="form-control" value="<?php echo set_value('post[jmlh_rt]'); ?>">
						<span class="help-block"><?php echo form_error('post[jmlh_rt]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Jumlah RW : <strong class="text-red">*</strong></label>
						<input type="text" name="post[jmlh_rw]" class="form-control" value="<?php echo set_value('post[jmlh_rw]'); ?>">
						<span class="help-block"><?php echo form_error('post[jmlh_rw]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
					<label class="control-label">Jumlah Penduduk : <strong class="text-red">*</strong></label>
						<input type="text" name="post[jmlh_penduduk]" class="form-control" value="<?php echo set_value('post[jmlh_penduduk]'); ?>">
						<span class="help-block"><?php echo form_error('post[jmlh_penduduk]', '<small class="text-red">', '</small>'); ?></span>
				</div>

				<div class="form-group">
		            <label  class="control-label">Alamat Kantor :<span class="text-red">*</span></label>
		              <textarea name="post[alamat_kantor]"  placeholder="Ex : Jln. Raya Koba No. 141 RT. 05 Kel. Koba Kecamatan Koba Kabupaten Bangka Tengah" class="form-control"><?php echo set_value('post[alamat_kantor]');?></textarea>
		              <span class="help-block"><?php echo form_error('post[alamat_kantor]', '<small class="text-red">', '</small>'); ?></span>
		        </div>

		        <div class="form-group">
					<label class="control-label">Foto Gedung Kelurahan/Desa : <strong class="text-red">*</strong></label>
						<input type="file" name="foto_kantor" class="form-control" >
				</div>

			</div>


			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/kelurahan-desa') ?>" class="btn btn-app pull-right">
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