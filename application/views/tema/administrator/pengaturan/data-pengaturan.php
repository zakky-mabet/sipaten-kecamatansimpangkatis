<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('pesan'); ?></div>
	<div class="col-md-12">
		<div class="box box-warning">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Penguna Sistem</h3>
				</div>
			</div>
			<div class="box-body">
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
				<div class="col-md-6">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('administrator/pengaturan?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>
				<div class="col-md-2">
				<?php if ($this->session->userdata('akun_hak_admin') == 'admin') { ?>
					<a href="<?php echo site_url('administrator/pengaturan/create') ?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>	
				<?php } ?>
				</div>

	            <div class="col-md-4 pull-right">
	               <div class="input-group input-group-sm">
	                  <input type="text" name="query" class="form-control pull-right" name="<?php echo $this->input->get('query') ?>" placeholder="Pencarian ...">
	                  <div class="input-group-btn">
	                  	<button type="submit" class="btn btn-warning hvr-shadow"><i class="fa fa-search"></i></button>
	                  </div>
	               </div>
	            </div>
<?php  
// End form pencarian
echo form_close();

/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('administrator/pengaturan/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12" style="margin-top: 10px;">
					<thead class="bg-orange">
						<tr>
							<th width="30">
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
							</th>
							<th class="text-center" width="150">Username </th>
							<th width="150" class="text-center">Nama Lengkap</th>
							<th class="text-center">Email</th>
							<th class="text-center">Telepon</th>
							<th class="text-center">Status</th>
							<th class="text-center">Level Akses</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/**
				 * Loop Data Users
				 *
				 **/
				foreach($data as $row) :
					if ($row->status == 'no') {
						$stat = 'Tidak';
					}
					else {
						$stat = 'Ya';
					}
				?>
						<tr>
							<td>
			                    <div class="checkbox checkbox-inline">
			                        <input type="checkbox" name="pengaturan[]" value="<?php echo $row->ID ?>"> <label></label>
			                    </div>
							</td>
							<td><?php echo $row->username ?></td>
							<td><?php echo $row->nama_lengkap  ?></td>
							<td><?php echo $row->email ?></td>
							<td><?php echo $row->no_hp ?></td>
							<td class="text-center"><?php echo $stat ?></td>
							<td class="kapital text-center"><?php echo $row->hak_akses   ?></td>
							<td class="text-center" width="80">
								<?php if ($this->session->userdata('akun_hak_admin') == 'admin') { ?>
								<a href="<?php echo site_url("administrator/pengaturan/get/{$row->ID}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
								<a class="icon-button text-red get-delete-penguna" data-id="<?php echo $row->ID ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
								<?php } ?>
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
						<th>
	                    <div class="checkbox checkbox-inline">
	                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
	                    </div>
						</th>
						<th colspan="7">
						<?php if ($this->session->userdata('akun_hak_admin') == 'admin') { ?>
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<button type="submit" class="btn btn-xs btn-round btn-danger" name="action" value="delete"><i class="fa fa-trash-o"></i> Hapus</button>
							<?php } ?>
							<small class="pull-right"><?php echo count($data) . " dari ".$num_total." data"; ?></small>
						</th>
					</tfoot>
				</table>
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

<div class="modal animated fadeIn modal-danger" id="modal-delete-penguna" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus Penguna ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>

