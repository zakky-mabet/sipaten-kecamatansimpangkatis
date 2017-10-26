<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo $title; ?> <small>- Lengkapi Syarat</small></h3>
            </div>
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(site_url("surat_keterangan/save_history"), array('class' => 'form-horizontal', 'id' => 'form-insert-requirement'));
 
echo form_hidden('kategori-surat', $get->id_surat);

echo form_hidden('nik', '');

echo form_hidden('ID', '');
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-7" id="blok-cari-nik">
					<div class="form-group" style="padding-top: 10px;">
						<label for="nik" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-6">
							<input type="text" id="cari-nik" class="form-control" value=""> 
						</div>
						<div class="col-md-2">
							<button type="button" id="button-reset" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-times"></i> Reset</button>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Lengkapi Syarat : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
	              	<?php  
	              	/* Loop Syarat Surat */
	              	foreach($syarat as $key => $value) :
	              	?>
		                    <div class="checkbox checkbox-primary checkbox-lg">
		                        <input id="log_surat_check" class="styled syarat-<?php echo $value->id_syarat; ?>" name="syarat[<?php echo $key; ?>]" value="<?php echo $value->id_syarat; ?>" type="checkbox" data-id="<?php echo $value->id_syarat; ?>">
		                        <label><?php echo $value->nama_syarat; ?></label>
		                    </div>
		            <?php  
		            endforeach;
		            ?>
							<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	

				</div>

				<div class="col-md-5">
					<table class="table table-bordered" id="table-pemohon">
						<tbody>
							<tr>
								<th width="160" class="bg-primary text-right">NIK :</th>
								<td id="data-nik"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Nama :</th>
								<td id="data-nama"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Alamat : <br> RT/RW : <br>Kel/Desa : <br>Kecamatan :</th>
								<td id="data-alamat"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Agama :</th>
								<td id="data-agama"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Kewarganegaraan :</th>
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

	
			<!-- Modal Dialog Jadikan Histori -->
	        <div class="modal animated fadeIn modal-danger" id="dialog-delete-history" tabindex="-1" data-backdrop="static" data-keyboard="false">
	          	<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Reset Form?</h4>
			                <span>Hapus Rekaman Data ini menjadi dari histori pengajuan Surat</span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
							<a id="button-delete-history" class="btn btn-outline pull-right">Oke</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Dialog Lanjutkan Proses -->
	        <div class="modal animated fadeIn modal-info" id="dialog-lanjutkan" tabindex="-1" data-backdrop="static" data-keyboard="false">
	          	<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Lanjutkan proses ?</h4>
			                <span>Jika data syarat-syarat lanjutkan ke tahap pengisian dokumen.</span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
							<a id="button-lanjutkan" class="btn btn-outline pull-right">Oke</a>
						</div>
					</div>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>