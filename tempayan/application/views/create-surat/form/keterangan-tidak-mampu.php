<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo $title; ?></h3>
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
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Surat Pengantar dari kelurahan / Desa</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" name="isi[no_surat_rek]" class="form-control" value="<?php echo set_value('isi[no_surat_rek]'); ?>">
							<p class="help-block"><?php echo form_error('isi[no_surat_rek]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_surat_rek]" id="datepicker" value="<?php echo set_value('isi[tgl_surat_rek]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_surat_rek]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Desa : <strong class="text-red">*</strong></label>
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
							<p class="legend-form">Tanda Tangan Kades / Lurah</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Pejabat Lurah / Kades  : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" name="isi[pejabat_lurah]" class="form-control" value="<?php echo set_value('isi[pejabat_lurah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">NIP : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[nip_pejabat_lurah]" value="<?php echo set_value('isi[nip_pejabat_lurah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nip_pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jabatan : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[jabatan_pejabat_lurah]" value="<?php echo set_value('isi[nama_desa]'); ?>">
							<p class="help-block"><?php echo form_error('isi[jabatan_pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Data Keluarga yang mengikuti :</p>
						</div>
						<div class="col-md-12">
							<table class="table table-bordered mini-font">
								<thead class="bg-silver">
									<tr>
										<th width="30">
						                    <div class="checkbox checkbox-inline" style="margin-top: -10px;">
						                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
						                    </div>
										</th>
										<th class="text-center">NIK</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Tempat, Tanggal Lahir</th>
										<th class="text-center">SHDK</th>
									</tr>
								</thead>
								<tbody>
							<?php  
							/* 
							* Loop Data Keluarag 
							* From parent Model
							*/
							if($penduduk->no_kk != FALSE) :
								
								foreach($this->create_surat->get_keluarga($penduduk->no_kk) as $key => $value) :
									/* Tidak dengan orang mengajukan */
									if($penduduk->nik==$value->nik) 
										continue;
							?>
									<tr>
										<td>
						                    <div class="checkbox checkbox-inline" style="margin-top: -10px;">
						                        <input id="checkbox1" type="checkbox" name="isi[pengikut][][id]" value="<?php echo $value->ID; ?>"> <label for="checkbox1"></label>
						                    </div>
										</td>
										<td class="text-center" width="150"><?php echo $value->nik; ?></td>
										<td><?php echo $value->nama_lengkap; ?></td>
										<td><?php echo $value->tmp_lahir.', '.date_id($value->tgl_lahir); ?></td>
										<td><?php echo strtoupper($value->status_kk); ?></td>
									</tr>
							<?php  
								endforeach;
							else :
							?>
								<tr>
									<td colspan="5">
										<div class="callout callout-info" style="width: 60%; margin:auto">
											<strong><i class="fa fa-warning"></i> Perhatian!</strong> <p>Mohon masukkan No. KK pada pemohon ini, agar dapat terhubung pada kelompok keluarga.</p>
										</div>
									</td>
								</tr>
							<?php
							endif;
							?>
								</tbody>
							</table>
							<p class="help-block"><?php echo form_error('isi[pengikut][0][id]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Ketarangan Keperluan : </p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Keperluan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[keperluan]" class="form-control" value="<?php echo set_value('isi[keperluan]'); ?>">
							<p class="help-block"><?php echo form_error('isi[keperluan]', '<small class="text-red">', '</small>'); ?></p>
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