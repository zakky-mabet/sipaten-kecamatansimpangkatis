  	<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-success">
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
					 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('administrator/kategori_berita?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?> ?>';">
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
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Masukan Kata Kunci ... ">
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group pull">
                    <button type="submit" class="btn btn-success hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('administrator/kategori_berita') ?>" class="btn btn-success hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>

				
				<div class="col-md-3 top">
					  <a href="<?php echo site_url('administrator/kategori_berita/create') ?>" class="btn btn-success hvr-shadow" style="margin-left: 10px;"><i class="fa fa-plus"></i> Tambah Baru</a>
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
echo form_open(site_url('administrator/kategori_berita/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12 mini-font" style="margin-top: 10px;">
					<thead class="bg-green">
						<tr>
							<th width="30">
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
							</th>
							<th class="text-center">Nama  Kategori</th>
				
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
              			<div class='alert alert-success animated bounce'>
              				<button type='button' class='close' data-dismiss='alert' style='text-align:justify;'>
              				<i class='ace-icon fa fa-times'></i></button>
              			<strong><i class='ace-icon fa fa-success'></i> Maaf !</strong> Data Tidak ditemukan</div>
              			</div>
              			</th>
            		</tr>
			<?php	}

				$number = ( ! $this->page ) ? 0 : $this->page;
				
				foreach($data as $row) :

				?>
						<tr>
							<td>
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="data[]" value="<?php echo $row->id_kat; ?>"> <label for="checkbox1"></label>
			                    </div>
						
							</td>
							<td ><?php echo $row->nama; ?></td>
							
							<td class="text-center">

							<a href="<?php echo base_url("administrator/kategori_berita/get/{$row->id_kat}"); ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
							<?php if ($this->session->userdata('akun_hak_admin') != 'operator') { ?>
							<a class="icon-button text-red get-delete-kategori_berita" id="" data-id="<?php echo $row->id_kat; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
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
    $('.get-delete-kategori_berita').click( function() 
    {
        $('#modal-delete-kategori_berita').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/kategori_berita/delete/' + $(this).data('id'));
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

<div class="modal animated fadeIn modal-danger" id="modal-delete-kategori_berita" data-backdrop="static" data-keyboard="false">
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
