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
echo form_open(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Nama Grup : <strong class="text-red">*</strong></label>
					<div class="col-md-7">
						<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
						<p class="help-block"><?php echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Deskripsi : <strong class="text-primary">*</strong></label>
					<div class="col-md-7">
						<textarea name="description" class="form-control" cols="30" rows="4"><?php echo set_value('description'); ?></textarea>
						<p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Hak Akses Module : <strong class="text-red">*</strong></label>
				</div>
				<div class="col-md-12">
					<table class="table table-bordered mini-font">
						<tr class="color-400">
							<th rowspan="2" class="text-center" width="50">No.</th>
							<th rowspan="2" class="text-center">Nama Module</th>
							<th class="text-center" colspan="5">Hak Akses</th>
						</tr>
						<tr class="color-400">
							<th class="text-center">Status</th>
							<th class="text-center">Buat</th>
							<th class="text-center">Lihat</th>
							<th class="text-center">Sunting</th>
							<th class="text-center">Hapus</th>
						</tr>

						<tr>
							<td class="text-center">1. </td>
							<td>Surat Non Perizinan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[surat_perizinan][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php echo form_hidden('role[surat_perizinan][]', 'block'); ?>
						<tr>
							<td class="text-center">2. </td>
							<td>Surat Perizinan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[surat_non_perizinan][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>	
						<?php echo form_hidden('role[surat_non_perizinan][]', 'block'); ?>	
						<tr>
							<td class="text-center">3. </td>
							<td>Analisa Pelayanan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[analytics][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>	
						<?php echo form_hidden('role[analytics][]', 'block'); ?>						
						<tr>
							<td class="text-center">4. </td>
							<td>Master Data <i class="fa fa-angle-double-right"></i> Data Penduduk</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'create', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'read', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'update', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'delete', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
						</tr>
						<?php echo form_hidden('role[penduduk][]', 'block'); ?>
						<tr>
							<td class="text-center">5. </td>
							<td>Master Data <i class="fa fa-angle-double-right"></i> Data Kelurahan / Desa</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[desa][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[desa][]', 'create', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[desa][]', 'read', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[desa][]', 'update', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[desa][]', 'delete', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
						</tr>
						<?php echo form_hidden('role[desa][]', 'block'); ?>
						<tr>
							<td class="text-center">6. </td>
							<td>Master Data <i class="fa fa-angle-double-right"></i> Data Manajemen Surat</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center"></td>
							<td class="text-center"></td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[penduduk][]', 'update', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center"></td>
						</tr>
						<?php echo form_hidden('role[manejemen_surat][]', 'block'); ?>
						<tr>
							<td class="text-center">7. </td>
							<td>Master Data <i class="fa fa-angle-double-right"></i> Data Kepegawaian</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[pegawai][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[pegawai][]', 'create', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[pegawai][]', 'read', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[pegawai][]', 'update', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[pegawai][]', 'delete', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
						</tr>
						<?php echo form_hidden('role[pegawai][]', 'block'); ?>
						<tr>
							<td class="text-center">8. </td>
							<td>Statistik <i class="fa fa-angle-double-right"></i> Kependudukan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[statistik_penduduk][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php echo form_hidden('role[statistik_penduduk][]', 'block'); ?>
						<tr>
							<td class="text-center">9. </td>
							<td>Statistik <i class="fa fa-angle-double-right"></i> Surat Non Perizinan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[statistik_surat_non_perizinan][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php echo form_hidden('role[statistik_surat_non_perizinan][]', 'block'); ?>
						<tr>
							<td class="text-center">10. </td>
							<td>Statistik <i class="fa fa-angle-double-right"></i> Surat Perizinan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[statistik_surat_perizinan][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php echo form_hidden('role[statistik_surat_perizinan][]', 'block'); ?>
						<tr>
							<td class="text-center">11. </td>
							<td>Statistik <i class="fa fa-angle-double-right"></i> Penilaian Pelayanan</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[statistik_pelayanan][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php echo form_hidden('role[statistik_pelayanan][]', 'block'); ?>
						<tr>
							<td class="text-center">12. </td>
							<td>Pengaturan <i class="fa fa-angle-double-right"></i> Pengaturan Sistem</td>
							<td class="text-center">
								<?php  
								echo form_checkbox('role[pengaturan][]', 'on', FALSE, array(
									'class' => 'toggle',
									'data-size' => 'mini'
								));
								?>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php echo form_hidden('role[pengaturan][]', 'block'); ?>
					</table>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('role') ?>" class="btn btn-app pull-right">
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