<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title">Surat Keterangan <?php echo $title; ?></h3>
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
					<div class="form-group" id="blok-cari-nik">
						<label for="nik" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-6">
							<input type="text" name="nik" id="cari-nik" class="form-control" value="<?php echo set_value('nik'); ?>">
							<p class="help-block"><?php echo form_error('nik', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" name="nama_surat" class="form-control" value="<?php echo set_value('nama_surat'); ?>">
							<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanda Tangan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<select name="staf" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($pegawai as $row) :
					?>
								<option value="<?php echo $row->ID; ?>"><?php echo $row->nama; ?> (<?php echo $row->jabatan; ?>)</option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-12"> <hr> </div>
						<div class="col-md-3 col-xs-5">
							<a href="<?php echo $this->input->get('from') ?>" class="btn btn-app pull-right">
								<i class="ion ion-reply"></i> Kembali
							</a>
						</div>
						<div class="col-md-6 col-xs-6 pull-right">
							<button type="submit" class="btn btn-app">
								<i class="fa fa-print"></i> Cetak
							</button>
							<button type="submit" class="btn btn-app">
								<i class="fa fa-save"></i> Simpan
							</button>
						</div>
						<div class="col-md-12"><hr>
							<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
							<small><strong class="text-blue">*</strong>	Field Optional</small>
						</div>
					</div>

				</div>

				<div class="col-md-5">
					<table class="table table-bordered mini-font">
						<tbody>
							<tr>
								<th width="150" class="bg-silver text-right">NIK :</th>
								<td id="data-nik"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Nama :</th>
								<td id="data-nama"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Alamat : <br> RT/RW : <br>Kel/Desa : <br>Kecamatan :</th>
								<td id="data-alamat"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Agama :</th>
								<td id="data-agama"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Kewarganegaraan :</th>
								<td id="data-kewarganegaraan"></td>
							</tr>
						</tbody>
					</table>
					<h4>Syarat Penerbitan Surat :</h4>
	              	<ol>
	              	<?php  
	              	/* Loop Syarat Surat */
	              	foreach($syarat as $row) :
	              	?>
	                	<li><?php echo $row->nama_syarat; ?></li>
	                <?php  
	                endforeach;
	                ?>
	              	</ol>
				</div>
			</div>
<!-- 
			<div class="box-footer with-border">

			</div>
			<div class="box-footer with-border">

			</div> -->
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>