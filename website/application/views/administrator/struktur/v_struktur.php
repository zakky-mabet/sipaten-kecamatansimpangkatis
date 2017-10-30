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
echo form_open(site_url('administrator/galeri/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12 mini-font" style="margin-top: 10px;">
					<thead class="bg-green">
						<tr>
							<th width="30">
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
							</th>
							<th class="text-center">Judul</th>
							<th class="text-center">Hits</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">User</th>
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
			                        <input id="checkbox1" type="checkbox" name="data[]" value="<?php echo $row->id; ?>"> <label for="checkbox1"></label>
			                    </div>
						
							</td>
							<td><?php echo $row->title; ?></td>
							<td class="text-center"><?php echo $row->hits; ?></td>
							<td class="text-center"><?php $cut = substr($row->dates, 0,10);  echo date_id($cut) ?> </td>
							<td class="text-center" style="text-transform: capitalize;"><?php echo $row->uploaded ?> </td>
							<td class="text-center">
							
							<a href="<?php echo base_url("administrator/struktur/get/{$row->id}"); ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>

							</td>
						</tr>	
				<?php  
				endforeach;

				?>
					</tbody>
				
				</table>

<?php  
// End Form Multiple Action
echo form_close();
?>
			</div>
			<div class="box-footer">
				<p><i class="fa fa-info text-info"></i> Halaman ini dibuat statis</p>
			</div>
		</div>
	</div>
</div>

