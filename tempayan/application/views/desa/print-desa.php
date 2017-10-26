<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

?>
    <div class="content">
        <h5 class="upper text-center"><?php echo $title; ?></h5>
        <table class="table-bordered" style="width: 100%; font-size: 12px;">
        	<tr>
        		<th width="30">No.</th>
        		<th>Desa / Kelurahan</th>
                <th>Kepala Desa / Lurah</th>
        		<th>Jumlah</th>
        	</tr>
                <?php  
                /**
                 * Loop Data Desa
                 *
                 **/           
                foreach($desa as $key => $value) :
                ?>
                <tr>
                	<td class="text-center"><?php echo ++$key; ?>.</td>
                	<td><?php echo $value->nama_desa; ?></td>
                    <td><?php echo $value->kepala_desa; ?></td>
                    <td class="text-center"><?php echo $this->db->get_where('penduduk', array('desa' => $value->id_desa))->num_rows(); ?></td>
                </tr>
                <?php  
                endforeach;
                ?>
        </table>
    </div>
<?php

$this->load->view('print/footer');

/* End of file print-desa.php */
/* Location: ./application/views/desa/print-desa.php */