<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Desa / Kelurahan</h3>
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
				<div class="col-md-4">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('desa?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>';">
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
				<div class="col-md-5">
				<?php  
				if( $this->permission->is_true('desa', 'create') ) :
				?>
					<a href="<?php echo site_url('desa/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
				<?php  
				endif;
				if( $this->permission->is_true('desa', 'read') ) :
				?>
					<a href="<?php echo site_url("desa/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url('desa/export') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
				<?php  
				endif;
				if( $this->permission->is_true('desa', 'create') ) :
				?>
					<a href="<?php echo site_url('desa/import') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-upload"></i> Impor</a>
				<?php  
				endif;
				?>
				</div>
            <div class="col-md-3">
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
echo form_open(site_url('desa/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12" style="margin-top: 10px;">
					<thead class="bg-silver">
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
							<th class="text-center">Desa</th>
							<th class="text-center">Kepala Desa</th>
							<th class="text-center">Jumlah Penduduk</th>
							<th width="80"></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/*
				* Loop Data Desa / Kelurahan
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($desa as $row) :
				?>
						<tr>
							<td>
							<?php  
							if( $this->permission->is_verified() OR $this->permission->is_admin() ) :
							?>
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="desa[]" value="<?php echo $row->id_desa; ?>"> <label for="checkbox1"></label>
			                    </div>
							<?php  
							else :
								echo ++$this->page.".";
							endif;
							?>
							</td>
							<td><?php echo $row->nama_desa; ?></td>
							<td><?php echo $row->kepala_desa; ?></td>
							<td class="text-center"><?php echo $this->db->get_where('penduduk', array('desa' => $row->id_desa))->num_rows(); ?></td>
							<td class="text-center">
								<a href="<?php echo site_url("desa/update/{$row->id_desa}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
								<a class="icon-button text-red get-delete-desa" data-id="<?php echo $row->id_desa; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
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
						<th colspan="6">
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<button type="submit" name="action" value="set_update" class="btn btn-xs btn-round btn-primary"><i class="fa fa-pencil"></i> Sunting</button>
							<a class="btn btn-xs btn-round btn-danger get-delete-desa-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<small class="pull-right"><?php echo count($desa) . " dari " . $num_desa . " data"; ?></small>
						</th>
					<?php  
					else :
						echo "<tr><th colspan='4'><small class='pull-right'>".count($desa) . " dari " . $num_desa . " data"."</small><th></tr>";
					endif;
					?>
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-desa-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus Desa ini dari sistem?</span>
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



<div class="modal animated fadeIn modal-danger" id="modal-delete-desa" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus Desa ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>