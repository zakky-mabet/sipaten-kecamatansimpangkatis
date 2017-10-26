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
                <th>No. Surat</th>
                <th>Jenis Surat</th>
                <th>Tanggal</th>
                <th>Nama Penduduk</th>
                <th>Ditanda Tangani</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <?php  
            /*
            * Loop data penduduk
            */
            foreach($data_surat as $key => $value) :
                $date = new DateTime($value->tanggal);
            ?>
            <tr>
                <td class="text-center"><?php echo ++$key; ?>.</td>
                <td class="text-center">
                    <?php echo $value->kode_surat.'/'.$value->nomor_surat.'/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?>
                </td>
                <td><?php echo $value->judul_surat; ?></td>
                <td class="text-center"><?php echo $date->format('d/m/Y') ?></td>
                <td><?php echo $value->nama_lengkap; ?></td>
                <td><?php echo $value->nama; ?></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo strtoupper($value->status); ?></td>
            </tr>
            <?php  
            endforeach;
            ?>
        </table>
        <small style="font-size: 10px;">Total <?php echo count($data_surat) . " dari " . $num_surat . " data"; ?></small>
    </div>
<?php

$this->load->view('print/footer');

/* End of file print-surat-keluar.php */
/* Location: ./application/views/surat-keluar/print-surat-keluar.php */