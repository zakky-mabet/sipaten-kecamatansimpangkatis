  	<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-warning">
			<div class="box-header">
			
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>			
			<div class="box-body">
				<div class="col-md-3">
				<div class="form-group">
				  <label>Tampilkan :</label><br>
					 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('administrator/events?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&status=<?php echo $this->input->get('status'); ?>&user=<?php echo $this->input->get('user'); ?>';">
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
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kategori :</label>
				        <select name="kategori" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<?php foreach ($this->setting->kategori() as $key => $value): ?>
				        		<option value="<?php echo $value->id_kat ?>" <?php if($this->input->get('kategori')==$value->id_kat) echo 'selected'; ?>><?php echo $value->nama;  ?></option>
				        	<?php endforeach ?>
				        	
				        	
				        </select>	
				    </div>
				</div>

				<div class="col-md-3 top">
					  <a href="<?php echo site_url('administrator/events/create') ?>" class="btn btn-warning hvr-shadow" style="margin-left: 10px;"><i class="fa fa-plus"></i> Tambah Baru</a>
				</div>
			</div>
			
			<div class="box-body">

				<div class="col-md-3">
				    <div class="form-group">
				        <label>User :</label>
				        <select name="user" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<?php foreach ($get_admin as $key => $value): ?>
				        		<option value="<?php echo $value->username ?>" <?php if($this->input->get('user')==$value->username) echo 'selected'; ?>><?php echo $value->nama_lengkap;  ?></option>
				        	<?php endforeach ?>
				        	
				        	
				        </select>	
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				        <label>Status :</label>
				        <select name="status" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<option value="show" <?php if($this->input->get('status')=='show') echo 'selected'; ?>>Publish</option>
				        	<option value="hide" <?php if($this->input->get('status')=='hide') echo 'selected'; ?>>Pending</option>
				        </select>	
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Masukan Kata Kunci ... ">
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('administrator/events') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>

			</div>
			
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">

<?php  
// End form pencarian
echo form_close();

/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('administrator/events/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12 mini-font" style="margin-top: 10px;">
					<thead class="bg-orange">
						<tr>
							<th width="30">
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
							</th>
							<th class="text-center">Judul</th>
							<th class="text-center">Kategori</th>
							<th class="text-center">Hits</th>
							<th class="text-center">Tanggal</th>
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
				if (!$data) { ?>
					<tr>
              			<th colspan="7" class="text-center">
              			<div class='col-md-4 col-md-offset-4'><br>
              			<div class='alert alert-warning animated bounce'>
              				<button type='button' class='close' data-dismiss='alert' style='text-align:justify;'>
              				<i class='ace-icon fa fa-times'></i></button>
              			<strong><i class='ace-icon fa fa-warning'></i> Maaf !</strong> Data Tidak ditemukan</div>
              			</div>
              			</th>
            		</tr>
			<?php	}

				$number = ( ! $this->page ) ? 0 : $this->page;

				
				foreach($data as $row) :

					foreach ($this->setting->kategori() as $key => $value) {
						if ($row->kategori == $value->id_kat) {
							$kategoritext = $value->nama;
						}
					}	
					
				?>
						<tr>
							<td>
						
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="data[]" value="<?php echo $row->id; ?>"> <label for="checkbox1"></label>
			                    </div>
						
							</td>
							<td><?php echo $row->title; ?></td>
							<td class="text-center"><?php echo $kategoritext; ?></td>
							<td class="text-center"><?php echo $row->hits ?> </td>
							<td class="text-center"><?php $cut = substr($row->dates, 0,10);  echo date_id($cut) ?> </td>
							<td class="text-center" style="text-transform: capitalize;"><?php echo $row->uploaded ?> </td>
							<td class="text-center"><?php echo status($row->status); ?> </td>
							<td class="text-center">
							<a href="<?php echo base_url("administrator/events/status/{$row->id}"); ?>" class="icon-button text-orange" data-toggle="tooltip" data-placement="top" title="Status"><i class="fa <?php echo eye_status($row->status); ?>"></i></a>

							<a href="<?php echo base_url("administrator/events/get/{$row->id}"); ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>

							<?php if ($this->session->userdata('akun_hak_admin') != 'operator') { ?>
							<a class="icon-button text-red get-delete-events"  data-id="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							<?php } ?>
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					<script>
					     /*!
    * Modal Delete 
    */
    $('.get-delete-events').click( function() 
    {
        $('#modal-delete-events').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/events/delete/' + $(this).data('id'));
    });
				</script>
					</tbody>
					<tfoot>
					
						<th>
		                    <div class="checkbox checkbox-inline">
		                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
		                    </div>
						</th>
						<th colspan="8">
							
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<a class="btn btn-xs btn-round btn-danger  get-delete-profil-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<small class="pull-right"></small>
							<div class="modal animated fadeIn modal-danger" id="modal-delete-profil-multiple" data-backdrop="static" data-keyboard="false">
							    <div class="modal-dialog modal-sm">
							        <div class="modal-content">
							           	<div class="modal-header">
							                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
							                <span>Hapus data yang dipilih dari sistem?</span>
							           	</div>
							           	<div class="modal-footer">
							                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
							                <button name="action" value="delete" class="btn btn-outline"> Hapus </button>
							           	</div>
							        </div>
							    </div>
							</div>
						
							<small class="pull-right"><?php echo count($data) . " dari ".$num." data"; ?></small> 
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

<div class="modal animated fadeIn modal-danger" id="modal-delete-events" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus data ini dari sistem?</span>	
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>


