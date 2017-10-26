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
        <table class="table-bordered" style="width: 100%; font-size: 11px;">
        	<tr>
        		<th width="30">No.</th>
        		<th class="text-center">NIP</th>
                <th class="text-center">Nama</th>
        		<th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Telepon</th>
        	</tr>
                <?php  
                /**
                 * Loop Data Desa
                 *
                 **/           
                foreach($employee as $key => $value) :
                ?>
                <tr>
                	<td class="text-center"><?php echo ++$key; ?>.</td>
                    <td class="text-center"><?php echo $value->nip; ?></td>
                    <td><?php echo $value->nama; ?></td>
                    <td><?php echo $value->jabatan; ?></td>
                    <td class="text-center"><?php echo ucfirst($value->jns_kelamin); ?></td>
                    <td><?php echo $value->alamat; ?></td>
                    <td class="text-center"><?php echo $value->telepon; ?></td>
                </tr>
                <?php  
                endforeach;
                ?>
        </table>
    </div>
<?php

$this->load->view('print/footer');

/* End of file print-pegawai.php */
/* Location: ./application/views/pegawai/print-pegawai.php */