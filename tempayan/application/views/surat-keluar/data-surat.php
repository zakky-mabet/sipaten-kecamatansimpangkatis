<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Surat Keluar</h3>
				</div>
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
			<div class="box-body" id="blok-filter">
				<div class="col-md-4">
				    <div class="form-group">
				        <label>Tanggal :</label>
		            	<div class="input-group registration-date-time">
		            		<input class="form-control input-sm" name="start" id="datepicker" value="<?php echo $this->input->get('start') ?>" placeholder="Mulai Tanggal ..">
		            		<span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
		            		<input class="form-control input-sm" name="end" id="datepicker2" value="<?php echo $this->input->get('end') ?>" placeholder="Sampai Tanggal ..">
		            	</div>	
				    </div>
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="No. Surat / NIK / Nama  . . . ">
				    </div>
				</div>
				<div class="col-md-4">
				    <div class="form-group col-md-12">
				        <label>Jenis Surat :</label>
				        <select name="jenis" class="form-control input-sm">
				        	<option value="">-- PILIH JENIS SURAT--</option>
				    <?php  
				    /* Loop Surat Kategori */
				    foreach($this->surat_keluar->category() as $row) :
				    ?>
							<option value="<?php echo $row->id_surat; ?>" <?php if($row->id_surat==$this->input->get('jenis')) echo "selected"; ?>><?php echo $row->judul_surat; ?></option>
					<?php  
					endforeach;
					?>
				        </select>	
				    </div>
				    <div class="form-group col-md-8">
				        <label>Status :</label>
				        <select name="status" class="form-control input-sm">
				        	<option value="">-- PILIH STATUS --</option>
				        	<option value="pending" <?php if($this->input->get('status')=='pending') echo 'selected'; ?>>Pending</option>
				        	<option value="approve" <?php if($this->input->get('status')=='approve') echo 'selected'; ?>>Terverifikasi</option>
				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
				        <label>User :</label>
				        <select name="user" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				    <?php  
				    /* Loop Data User */
				    foreach($this->surat_keluar->get_user() as $row) :
				    ?>
							<option value="<?php echo $row->user_id; ?>" <?php if($row->user_id==$this->input->get('user')) echo "selected"; ?>><?php echo $row->name; ?></option>
					<?php  
					endforeach;
					?>
				        </select>	
					</div>
				</div>
				<div class="col-md-3" style="margin-left:-10px;">
                    <button type="submit" class="btn btn-app hvr-shadow"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('surat_keluar') ?>" class="btn btn-app hvr-shadow" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-3" id="blok-show-page" style="padding: 5px;">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('surat_keluar?per_page='); ?>' + this.value;">
					<?php  
					/**
					 * Loop 20 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 20
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per Halaman
				</div>
				<div class="col-md-3 pull-right" style="padding: 3px;" id="blok-output">
					<a href="<?php echo site_url("surat_keluar/print_out?{$this->input->server('QUERY_STRING')}"); ?>" class="btn btn-warning hvr-shadow btn-flat btn-print">
						<i class="fa fa-print"></i> Cetak
					</a>
					<!--
					<a href="" class="btn btn-warning hvr-shadow btn-flat">
						<i class="fa fa-download"></i> Ekspor Data
					</a>
					-->
				</div>
			</div>
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">

<?php  

/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('surat_keluar/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12 mini-font" style="margin-top: 10px;">
					<thead id="head-data-surat">
						<tr>
							<th width="30">
							<?php  
							if( $this->permission->is_verified() OR $this->permission->is_admin() ) :
							?>
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
							<?php  
							else : echo "No."; endif;
							?>
							</th>
							<th class="text-center">No. Surat</th>
							<th class="text-center">Jenis Surat</th>
							<th class="text-center" width="90">Tanggal</th>
							<th class="text-center">Nama Penduduk</th>
							<th class="text-center">Ditanda Tangani</th>
							<th class="text-center">User</th>
							<th class="text-center">Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/*
				* Loop data penduduk
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($data_surat as $row) :
					$date = new DateTime($row->tanggal);
				?>
						<tr>
							<td>
							<?php  
							if( $this->permission->is_verified() OR $this->permission->is_admin() ) :
							?>
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="surat[]" value="<?php echo $row->ID; ?>"> <label for="checkbox1"></label>
			                    </div>
							<?php  
							else :
								echo ++$this->page.".";
							endif;
							?>
							</td>
							<td class="text-center">
								<?php echo $row->kode_surat.'/<b>'.$row->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?>
							</td>
							<td><?php echo $row->judul_surat; ?></td>
							<td class="text-center"><?php echo date_id($row->tanggal); ?></td>
							<td><?php echo $row->nama_lengkap; ?></td>
							<td><?php echo $row->nama; ?></td>
							<td><?php echo $row->name; ?></td>
							<td><?php echo strtoupper($row->status) ?></td>
							<td class="text-center" style="font-size: 14px;" width="130" id="blok-crud">
							<?php  
							if( $row->status == 'approve' OR $this->permission->is_admin() AND $this->permission->print_file($row->slug) ) :
								if($row->slug != 'pengantar-kartu-keluarga') :
							?>
								<a href="<?php echo site_url("surat_keluar/print_surat/{$row->ID}") ?>" class="icon-button btn-print" data-toggle="tooltip" data-placement="top" title="Cetak" style="color: #444;"><i class="fa fa-print"></i></a>
							<?php
								endif;
							endif;

							if( $this->permission->is_admin() OR $row->status != 'approve' ) :
							?>
								<a href="<?php echo site_url("surat_keluar/get/{$row->ID}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
							<?php  
							endif;

							if( $this->permission->is_verified() OR $this->permission->is_admin()) :
							?>
								<a href="#" class="icon-button text-yellow get-dialog" data-id="<?php echo $row->ID; ?>" data-action="set_pending" data-toggle="tooltip" data-placement="top" title="Pending"><i class="fa fa-times"></i></a>
								<a href="#" class="icon-button text-green get-dialog" data-id="<?php echo $row->ID; ?>" data-action="set_aprove" data-toggle="tooltip" data-placement="top" title="Verifikasi"><i class="fa fa-check"></i></a>
							<?php  
							endif;

							if( $this->permission->is_admin() ) :
							?>
								<a href="#" class="icon-button text-red get-dialog" data-id="<?php echo $row->ID; ?>" data-action="delete" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							<?php  
							endif;
							?>
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
					<?php  
					if( $this->permission->is_verified() OR $this->permission->is_admin()) :
					?>
						<th>
		                    <div class="checkbox checkbox-inline">
		                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
		                    </div>
						</th>
						<th colspan="8">
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<a class="btn btn-xs btn-round btn-danger hvr-shadow get-delete-people-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<small class="pull-right"><?php echo count($data_surat) . " dari " . $num_surat . " data"; ?></small>
						</th>
					<?php  
					else :
						echo "<tr><th colspan='9'><small class='pull-right'>".count($data_surat) . " dari " . $num_surat . " data"."</small><th></tr>";
					endif;
					?>
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-people-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus data surat keluar yang terpilih dari sistem?</span>
				           	</div>
				           	<div class="modal-footer">
				                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				                <button type="submit" name="action" value="delete" id="btn-delete" class="btn btn-outline"> Hapus </button>
				           	</div>
				        </div>
				    </div>
				</div>
<?php  
// End Form Multiple Action
echo form_close();
?>
			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
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