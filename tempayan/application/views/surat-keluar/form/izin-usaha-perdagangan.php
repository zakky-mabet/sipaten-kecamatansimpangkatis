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
							<input type="text" name="nomor_surat" class="no_surat" id="no_surat" value="<?php echo $get->nomor_surat; ?>" readonly="">
							<strong>/<?php echo $this->option->get('kode_kecamatan'); ?>/<?php echo date('Y') ?></strong>
							<p class="help-block"><?php echo form_error('nomor_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>		
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Kelurahan / Desa</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Desa : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<select name="isi[desa]" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($this->create_surat->get_desa() as $row) :
					?>
								<option value="<?php echo $row->id_desa; ?>" <?php if($row->id_desa==$isi->desa) echo 'selected'; ?>><?php echo $row->nama_desa; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('isi[desa]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Keterangan Perusahaan :</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Perusahaan/Perseroan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama_perusahaan]" class="form-control" value="<?php echo $isi->nama_perusahaan; ?>">
							<p class="help-block"><?php echo form_error('isi[nama_perusahaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Perusahaan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea class="form-control" name="isi[alamat_perusahaan]" rows="3"><?php echo $isi->alamat_perusahaan; ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_perusahaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kedudukan dalam Perusahaan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[kedudukan]" class="form-control" value="<?php echo $isi->kedudukan; ?>">
							<p class="help-block"><?php echo form_error('isi[kedudukan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Bentuk Perusahaan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[bentuk_perusahaan]" class="form-control" value="<?php echo $isi->bentuk_perusahaan; ?>">
							<p class="help-block"><?php echo form_error('isi[bentuk_perusahaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Bidang Usaha : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[bidang_usaha]" class="form-control" value="<?php echo $isi->bidang_usaha; ?>">
							<p class="help-block"><?php echo form_error('isi[bidang_usaha]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Kegiatan Usaha : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[kegiatan_usaha]" class="form-control" value="<?php echo $isi->kegiatan_usaha; ?>">
							<p class="help-block"><?php echo form_error('isi[kegiatan_usaha]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jenis Barang Dagangan Utama : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[jenis_barang_dagang][a]" class="form-control" value="<?php echo $isi->jenis_barang_dagang->a; ?>" placeholder="a.">
							<p class="help-block"><?php echo form_error('isi[jenis_barang_dagang][a]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-9 col-md-offset-3">
							<input type="text" name="isi[jenis_barang_dagang][b]" class="form-control" value="<?php echo $isi->jenis_barang_dagang->b; ?>" placeholder="b.">
							<p class="help-block"><?php echo form_error('isi[jenis_barang_dagang][b]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-9 col-md-offset-3">
							<input type="text" name="isi[jenis_barang_dagang][c]" class="form-control" value="<?php echo $isi->jenis_barang_dagang->c; ?>" placeholder="c.">
							<p class="help-block"><?php echo form_error('isi[jenis_barang_dagang][c]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Modal Usaha : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[modal_usaha]" class="form-control" value="<?php echo $isi->modal_usaha; ?>">
							<p class="help-block"><?php echo form_error('isi[modal_usaha]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jumlah tenaga kerja yang dibayar: <strong class="text-red">*</strong></label>
						<div class="col-md-3">
							<input type="text" name="isi[jumlah_pekerja_laki]" class="form-control" value="<?php echo $isi->jumlah_pekerja_laki; ?>" placeholder="Laki-laki">
							<p class="help-block"><?php echo form_error('isi[jumlah_pekerja_laki]', '<small class="text-red">', '</small>'); ?></p>
						</div>
						<div class="col-md-3">
							<input type="text" name="isi[jumlah_pekerja_wanita]" class="form-control" value="<?php echo $isi->jumlah_pekerja_wanita; ?>" placeholder="Wanita">
							<p class="help-block"><?php echo form_error('isi[jumlah_pekerja_wanita]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Pendidikan tenaga kerja yang : <strong class="text-red">*</strong></label>
						<div class="col-md-3 text-center">
							<label>laki-laki</label>
							<div class="input-group">
								<span class="input-group-addon">SD</span>
							  	<input type="text" class="form-control" name="isi[pekerja_laki][sd]" value="<?php echo $isi->pekerja_laki->sd; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div><br>
							<div class="input-group">
								<span class="input-group-addon">SLTP</span>
							  	<input type="text" class="form-control" name="isi[pekerja_laki][sltp]" value="<?php echo $isi->pekerja_laki->sltp; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">SLTA</span>
							  	<input type="text" class="form-control" name="isi[pekerja_laki][slta]" value="<?php echo $isi->pekerja_laki->slta; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">D3</span>
							  	<input type="text" class="form-control" name="isi[pekerja_laki][d3]" value="<?php echo $isi->pekerja_laki->d3; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">S1</span>
							  	<input type="text" class="form-control" name="isi[pekerja_laki][s1]" value="<?php echo $isi->pekerja_laki->s1; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">S2</span>
							  	<input type="text" class="form-control" name="isi[pekerja_laki][s2]" value="<?php echo $isi->pekerja_laki->s2; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div>
						</div>
						<div class="col-md-3 text-center">
							<label>Wanita</label>
							<div class="input-group">
								<span class="input-group-addon">SD</span>
							  	<input type="text" class="form-control" name="isi[pekerja_wanita][sd]" value="<?php echo $isi->pekerja_wanita->sd; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div><br>
							<div class="input-group">
								<span class="input-group-addon">SLTP</span>
							  	<input type="text" class="form-control" name="isi[pekerja_wanita][sltp]" value="<?php echo $isi->pekerja_wanita->sltp; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">SLTA</span>
							  	<input type="text" class="form-control" name="isi[pekerja_wanita][slta]" value="<?php echo $isi->pekerja_wanita->slta; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">D3</span>
							  	<input type="text" class="form-control" name="isi[pekerja_wanita][d3]" value="<?php echo $isi->pekerja_wanita->d3; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">S1</span>
							  	<input type="text" class="form-control" name="isi[pekerja_wanita][s1]" value="<?php echo $isi->pekerja_wanita->s1; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div> <br>
							<div class="input-group">
								<span class="input-group-addon">S2</span>
							  	<input type="text" class="form-control" name="isi[pekerja_wanita][s2]" value="<?php echo $isi->pekerja_wanita->s2; ?>">
							  	<span class="input-group-addon">Orang</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Bagi mereka yang tempat usahanya bukan milik sendiri</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Pemilik Tanah : <strong class="text-primary">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama_pemilik_tanah]" class="form-control" value="<?php echo $isi->nama_pemilik_tanah; ?>">
							<p class="help-block"><?php echo form_error('isi[nama_pemilik_tanah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Pemilik Tanah : <strong class="text-primary">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat_pemilik]" rows="3" class="form-control"><?php echo $isi->alamat_pemilik; ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_pemilik]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jangka Waktu : <strong class="text-primary">*</strong></label>
						<div class="col-md-3">
							<div class="input-group">
							  	<input type="text" class="form-control" name="isi[jangka_tahun]" value="<?php echo $isi->jangka_tahun; ?>">
							  	<span class="input-group-addon">Tahun</span>
							</div>
							<p class="help-block"><?php echo form_error('isi[jangka_tahun]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
			            	<div class="input-group registration-date-time">
			            		<input class="form-control input-sm" name="isi[jangka_mulai]" value="<?php echo $isi->jangka_mulai; ?>" id="datepicker" placeholder="Mulai Tanggal ..">
			            		<span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
			            		<input class="form-control input-sm" name="isi[jangka_akhir]" value="<?php echo $isi->jangka_akhir; ?>" id="datepicker2" placeholder="Sampai Tanggal ..">
			            	</div>	
							<p class="help-block"><?php echo form_error('isi[jangka_mulai]', '<small class="text-red">', '</small>'); ?></p>
							<p class="help-block"><?php echo form_error('isi[jangka_akhir]', '<small class="text-red">', '</small>'); ?></p>
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