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
echo form_open(current_url(), array('class' => 'form-horizontal'));

echo form_hidden('ID', $get->ID);
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">NIK : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="nik" class="form-control" value="<?php echo $get->nik; ?>">
						<p class="help-block"><?php echo form_error('nik', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">No. KK : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="kk" class="form-control" value="<?php echo $get->no_kk; ?>">
						<p class="help-block"><?php echo form_error('kk', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="status_kk" class="control-label col-md-3">Status KK : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="kepala keluarga" <?php if($get->status_kk=='kepala keluarga') echo "checked"; ?>> <label for="status_kk"> Kepala Keluarga</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="istri" <?php if($get->status_kk=='istri') echo "checked"; ?>> <label for="status_kk"> Istri</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="anak" <?php if($get->status_kk=='anak') echo "checked"; ?>> <label for="status_kk"> Anak</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="ayah" <?php if($get->status_kk=='ayah') echo "checked"; ?>> <label for="status_kk"> Ayah</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="ibu" <?php if($get->status_kk=='ibu') echo "checked"; ?>> <label for="status_kk"> Ibu</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('status_kk', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="name" class="form-control" value="<?php echo $get->nama_lengkap; ?>">
						<p class="help-block"><?php echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="tmp_lahir" class="control-label col-md-3 col-xs-12">Tempat, Tanggal Lahir : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $get->tmp_lahir; ?>">
						<p class="help-block"><?php echo form_error('tmp_lahir', '<small class="text-red">', '</small>'); ?></p>
					</div>
					<div class="col-md-4">
					  	<div class="input-group">
					    	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					    	<input type="text" class="form-control" name="birts" id="datepicker" value="<?php echo $get->tgl_lahir; ?>" placeholder="Ex : 1980-12-31">
					  	</div>
						<p class="help-block"><?php echo form_error('birts', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="gender" class="control-label col-md-3">Jenis Kelamin : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="gender" type="radio" value="laki-laki" <?php if( $get->jns_kelamin=='laki-laki') echo "checked"; ?>> <label for="gender"> Laki-laki</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="gender" type="radio" value="perempuan" <?php if( $get->jns_kelamin=='perempuan') echo "checked"; ?>> <label for="gender"> Perempuan</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('gender', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="agama" class="control-label col-md-3 col-xs-12">Agama : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<select name="agama" class="form-control">
							<option value="">-- PILIH --</option>
							<option value="islam" <?php if( $get->agama =='islam') echo "selected"; ?>>Islam</option>
							<option value="kristen" <?php if( $get->agama =='kristen') echo "selected"; ?>>Kristen</option>
							<option value="katholik" <?php if( $get->agama =='katholik') echo "selected"; ?>>Katholik</option>
							<option value="hindu" <?php if( $get->agama =='hindu') echo "selected"; ?>>Hindu</option>
							<option value="buddha" <?php if( $get->agama =='buddha') echo "selected"; ?>>Buddha</option>
							<option value="khonghucu" <?php if( $get->agama =='khonghucu') echo "selected"; ?>>Khonghucu</option>
							<option value="lainnya" <?php if( $get->agama =='lainnya') echo "selected"; ?>>Lainnya</option>
						</select>
						<p class="help-block"><?php echo form_error('agama', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3">Status Perkawinan : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="belum kawin" <?php if( $get->status_kawin =='belum kawin') echo "checked"; ?>> <label> Belum Kawin</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="kawin" <?php if( $get->status_kawin =='kawin') echo "checked"; ?>> <label> Kawin</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="cerai hidup" <?php if( $get->status_kawin =='cerai hidup') echo "checked"; ?>> <label> Cerai Hidup</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="cerai mati" <?php if( $get->status_kawin =='cerai mati') echo "checked"; ?>> <label> Cerai Mati</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('status_kawin', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3">Kewarganegaraaan : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-primary">
				           <input name="kewarganegaraan" type="radio" value="wni" <?php if( $get->kewarganegaraan =='wni') echo "checked"; ?>> <label for="kewarganegaraan"> WNI (Warga Negara Indonesia)</label>
				       	</div>
				       	<div class="radio radio-primary">
				           <input name="kewarganegaraan" type="radio" value="wna" <?php if( $get->kewarganegaraan =='wna') echo "checked"; ?>> <label for="kewarganegaraan"> WNA (Warga Negara Asing)</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('kewarganegaraan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="pekerjaan" class="control-label col-md-3 col-xs-12">Pekerjaan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="pekerjaan" class="form-control" value="<?php echo $get->pekerjaan; ?>">
						<p class="help-block"><?php echo form_error('pekerjaan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="gol_darah" class="control-label col-md-3 col-xs-12">Golongan Darah : <strong class="text-red">*</strong></label>
					<div class="col-md-3">
						<select name="gol_darah" class="form-control">
							<option value="">-- PILIH --</option>
							<option value="A" <?php if($get->gol_darah=='A') echo "selected"; ?>>A</option>
							<option value="B" <?php if($get->gol_darah=='B') echo "selected"; ?>>B</option>
							<option value="AB" <?php if($get->gol_darah=='AB') echo "selected"; ?>>AB</option>
							<option value="O" <?php if($get->gol_darah=='O') echo "selected"; ?>>O</option>
							<option value="A+" <?php if($get->gol_darah=='A+') echo "selected"; ?>>A+</option>
							<option value="A-" <?php if($get->gol_darah=='A-') echo "selected"; ?>>A-</option>
							<option value="B+" <?php if($get->gol_darah=='B+') echo "selected"; ?>>B+</option>
							<option value="B-" <?php if($get->gol_darah=='B-') echo "selected"; ?>>B-</option>
							<option value="AB+" <?php if($get->gol_darah=='AB+') echo "selected"; ?>>AB+</option>
							<option value="AB-" <?php if($get->gol_darah=='AB-') echo "selected"; ?>>AB-</option>
							<option value="O+" <?php if($get->gol_darah=='O+') echo "selected"; ?>>O+</option>
							<option value="O-" <?php if($get->gol_darah=='O-') echo "selected"; ?>>O-</option>
							<option value="tidak tahu"<?php if($get->gol_darah=='TIDAK TAHU') echo "selected"; ?>>TIDAK TAHU</option>
						</select>
						<p class="help-block"><?php echo form_error('gol_darah', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="alamat" class="control-label col-md-3">Alamat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat" rows="3" class="form-control"><?php echo $get->alamat; ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3">RT / RW : <strong class="text-red">*</strong></label>
					<div class="col-md-2">
						<input type="text" name="rt" class="form-control" value="<?php echo $get->rt; ?>">
						<p class="help-block"><?php echo form_error('rt', '<small class="text-red">', '</small>'); ?></p>
					</div>
					<div class="col-md-2">
						<input type="text" name="rw" class="form-control" value="<?php echo $get->rw; ?>">
						<p class="help-block"><?php echo form_error('rw', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="desa" class="control-label col-md-3 col-xs-12">Desa / Kelurahan : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
						<select name="desa" class="form-control">
							<option value="">-- PILIH --</option>
					<?php  
					/**
					 * Loop data Desa
					 *
					 **/
					foreach($this->db->get('desa')->result() as $row) :
					?>
							<option value="<?php echo $row->nama_desa; ?>" <?php if($get->desa==$row->nama_desa) echo "selected"; ?>><?php echo $row->nama_desa; ?></option>
					<?php  
					endforeach;
					?>
						</select>
						<p class="help-block"><?php echo form_error('desa', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('administrator/penduduk') ?>" class="btn btn-app pull-right">
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