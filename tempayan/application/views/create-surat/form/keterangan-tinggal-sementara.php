<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"> <?php echo $title; ?></h3>
            </div>
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-7">
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7 block-no-surat">
							<strong><?php echo $surat->kode_surat; ?>/</strong>
							<input type="text" name="nomor_surat" class="no_surat" id="no_surat" value="<?php echo $this->create_surat->get_nomor_surat($surat->id_surat, null); ?>" readonly="true">
							<strong>/<?php echo $this->option->get('kode_kecamatan'); ?>/<?php echo date('Y') ?></strong>
							<p class="help-block"><?php echo form_error('nomor_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Desa : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<select name="isi[desa]" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($this->create_surat->get_desa() as $row) :
					?>
								<option value="<?php echo $row->id_desa; ?>" <?php if($row->id_desa==set_value('isi[desa]')) echo 'selected'; ?>><?php echo $row->nama_desa; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('isi[desa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Keterangan Tinggal Sementara</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">No. Tanda Masuk : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[no_tanda_masuk]" class="form-control" value="<?php echo set_value('isi[no_tanda_masuk]'); ?>">
							<p class="help-block"><?php echo form_error('isi[no_tanda_masuk]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal Tanda Masuk : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_tanda_masuk]" id="datepicker" value="<?php echo set_value('isi[tgl_tanda_masuk]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_tanda_masuk]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alasan Pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<div class="col-md-4">
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="pekerjaan" <?php if(set_value('isi[alasan_pindah]')=='pekerjaan') echo "checked"; ?>> <label> Pekerjaan</label>
						       	</div>
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="pendidikan" <?php if(set_value('isi[alasan_pindah]')=='pendidikan') echo "checked"; ?>> <label> Pendidikan</label>
						       	</div>
							</div>
							<div class="col-md-4">
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="keamanan" <?php if(set_value('isi[alasan_pindah]')=='keamanan') echo "checked"; ?>> <label> Keamanan</label>
						       	</div>
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="kesehatan" <?php if(set_value('isi[alasan_pindah]')=='kesehatan') echo "checked"; ?>> <label> Kesehatan</label>
						       	</div>
							</div>
							<div class="col-md-4">
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="keluarga" <?php if(set_value('isi[alasan_pindah]')=='keluarga') echo "checked"; ?>> <label> Keluarga</label>
						       	</div>
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="lainnya" <?php if(set_value('isi[alasan_pindah]')=='lainnya') echo "checked"; ?>> <label> lainnya...</label>
						       	</div>
							</div>
							<p class="help-block"><?php echo form_error('isi[alasan_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Pindah  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat_pindah]" class="form-control" cols="30" rows="3"><?php echo set_value('isi[alamat_pindah]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kode Pos : <strong class="text-red">*</strong></label>
						<div class="col-md-4">
							<input type="text" name="isi[kd_pos_pindah]" class="form-control" value="<?php echo set_value('isi[kd_pos_pindah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[kd_pos_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Desa/Kelurahan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[desa_pindah]" class="form-control" value="<?php echo set_value('isi[desa_pindah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[desa_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[kecamatan_pindah]" class="form-control" value="<?php echo set_value('isi[kecamatan_pindah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[kecamatan_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kab/Kota : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[kabupaten_pindah]" class="form-control" value="<?php echo set_value('isi[kabupaten_pindah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[kabupaten_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[provinsi_pindah]" class="form-control" value="<?php echo set_value('isi[provinsi_pindah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[provinsi_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Penanggung Jawab</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama]" class="form-control" value="<?php echo set_value('isi[nama]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat]" class="form-control" cols="30" rows="3"><?php echo set_value('isi[alamat]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Pekerjaan  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[pekerjaan]" class="form-control" value="<?php echo set_value('isi[pekerjaan]'); ?>">
							<p class="help-block"><?php echo form_error('isi[pekerjaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Anggota Keluarga Pengikut</p>
						</div>
						<label for="nik" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-primary">*</strong></label>
						<div class="col-md-9">
							<div class="input-group">
							  	<input type="text" id="cari-pengikut" class="form-control">
							  	<span class="input-group-addon"><i class="fa fa-search"></i> Cari</span>
							</div>
						</div>
						<div class="col-md-12 top">
							<table class="table table-bordered mini-font" id="data-pengikut" id="data-pengikut" data-type="create" data-id="">
								<thead class="bg-silver">
									<tr>
										<th width="30"></th>
										<th class="text-center">NIK</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center"><small>Tempat, Tanggal Lahir</small></th>
										<th class="text-center" width="90">Status</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form"></p>
						</div>
						<label for="pemeriksa" class="control-label col-md-3 col-xs-12">Petugas Verifikasi : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<select name="pemeriksa" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($pemeriksa as $row) :
					?>
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==set_value('pemeriksa')) echo 'selected'; ?>><?php echo $row->nama; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('pemeriksa', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form"></p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Tanda Tangan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<select name="ttd_pejabat" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($pegawai as $row) :
					?>
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==set_value('ttd_pejabat')) echo 'selected'; ?>><?php echo $row->nama; ?> (<?php echo $row->jabatan; ?>)</option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('ttd_pejabat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-12"> <hr> </div>
						<div class="col-md-4">
							<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
							<small><strong class="text-blue">*</strong>	Field Optional</small>
						</div>
						<div class="col-md-3 col-xs-6 pull-right">
							<button type="submit" class="btn btn-app">
								<i class="fa fa-save"></i> Simpan
							</button>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<?php  
					/**
					 * Tampilkan Data Pemohon
					 *
					 * @var string
					 **/
					$this->load->view('create-surat/data-pemohon');
					?>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</div>
</div>

<div class="modal animated fadeIn modal-default" id="modal-input-status-hubungan" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header color-400">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> <span id="nama-pengikut" style="font-size: 15px;"></span></h4>
                <span>Masukkan kedalam anggota keluarga pengikut?</span>
            </div>
            <form action="" id="form-input-status" method="post">
			<div class="modal-body">
				<label>Status Hubungan dengan Pemohon ?</label>
				<input type="text" name="status" id="status-pengikut" class="form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning hvr-shadow pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
				<button type="submit" id="simpan-pengikut" class="btn btn-warning hvr-shadow"><i class="fa fa-save"></i> Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>