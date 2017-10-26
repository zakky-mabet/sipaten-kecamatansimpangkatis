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
							<strong><?php echo $get->kode_surat; ?>/</strong>
							<input type="text" name="nomor_surat" class="no_surat" id="no_surat" value="<?php echo $get->nomor_surat; ?>" readonly="true">
							<strong>/<?php echo $this->option->get('kode_kecamatan'); ?>/<?php echo date('Y') ?></strong>
							<p class="help-block"><?php echo form_error('nomor_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Data Kepindahan :</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Alasan Pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alasan_pindah]" rows="3" class="form-control"><?php echo $isi->alasan_pindah; ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alasan_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Alamat Tujuan Pindah :</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat_pindah]" rows="3" class="form-control"><?php echo $isi->alamat_pindah; ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Desa : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[desa]" value="<?php echo $isi->desa; ?>">
							<p class="help-block"><?php echo form_error('isi[desa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[kecamatan]" value="<?php echo $isi->kecamatan; ?>">
							<p class="help-block"><?php echo form_error('isi[kecamatan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kabupaten/Kota : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[kabupaten]" value="<?php echo $isi->kabupaten; ?>">
							<p class="help-block"><?php echo form_error('isi[kabupaten]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[provinsi]" value="<?php echo $isi->provinsi; ?>">
							<p class="help-block"><?php echo form_error('isi[provinsi]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Klasifikasi Pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[klasifikasi_pindah]" value="<?php echo $isi->klasifikasi_pindah; ?>" placeholder="Ex : Antar Provinsi">
							<p class="help-block"><?php echo form_error('isi[klasifikasi_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jenis Kepindahan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[jns_kepindahan]" value="<?php echo $isi->jns_kepindahan; ?>" placeholder="Ex : ANGGOTA KELUARGA">
							<p class="help-block"><?php echo form_error('isi[jns_kepindahan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Status KK bagi yang tidak pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[status_kk_tdk_pindah]" value="<?php echo $isi->status_kk_tdk_pindah; ?>" placeholder="Ex : Nomor KK Tetap">
							<p class="help-block"><?php echo form_error('isi[status_kk_tdk_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Status KK bagi yang pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="isi[status_kk_pindah]" value="<?php echo $isi->status_kk_pindah; ?>" placeholder="Ex : Numpang KK">
							<p class="help-block"><?php echo form_error('isi[status_kk_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Data Keluarga yang pindah :</p>
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
							if($get->no_kk != FALSE) :
								
								foreach($this->create_surat->get_keluarga($get->no_kk) as $key => $value) :
									/* Tidak dengan orang mengajukan */
									if($get->nik==$value->nik) 
										continue;
							?>
									<tr>
										<td>
						                    <div class="checkbox checkbox-inline" style="margin-top: -10px;">
						                        <input id="checkbox1" type="checkbox" name="isi[pengikut][][nik]" value="<?php echo $value->nik; ?>" <?php if( $this->surat_keluar->check_pengikut($get->ID, $value->nik)) echo "checked"; ?>> <label for="checkbox1"></label>
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
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==$get->pemeriksa) echo 'selected'; ?>><?php echo $row->nama; ?></option>
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
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==$get->pegawai) echo 'selected'; ?>><?php echo $row->nama; ?> (<?php echo $row->jabatan; ?>)</option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('ttd_pejabat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-12"> <hr> </div>
						<div class="col-md-3">
							<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
							<small><strong class="text-blue">*</strong>	Field Optional</small>
						</div>
						<div class="col-md-2">
							<a href="<?php echo site_url('surat_keluar') ?>" class="btn btn-app hvr-shadow">
								<i class="ion ion-reply"></i> Kembali
							</a>
						</div>
						<div class="col-md-7 col-xs-6 pull-right">
						<?php if( $this->permission->is_verified() OR $this->permission->is_admin()) : ?>
							<a href="javascript:void(0)" class="btn btn-app hvr-shadow get-dialog" data-id="<?php echo $get->ID; ?>" data-action="set_aprove">
								<i class="fa fa-check"></i> Verifikasi
							</a>
						<?php 
						endif; 
						if( $get->status == 'approve' OR $this->permission->is_admin()) :
						?>
							<a href="<?php echo site_url("surat_keluar/print_surat/{$get->ID}") ?>" class="btn btn-app btn-print hvr-shadow">
								<i class="fa fa-print"></i> Cetak
							</a>
						<?php endif; ?>
							<button type="submit" class="btn btn-app hvr-shadow pull-right">
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
					$this->load->view('surat-keluar/data-pemohon');
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

<div class="modal animated fadeIn" id="modal-dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
                <span class="modal-text">Hapus data surat keluar ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-action" class="btn btn-outline"> </a>
           	</div>
        </div>
    </div>
</div>