<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

$date = new DateTime($get->tanggal);


$dszak = $this->db->get_where('desa', array('slug' => $this->slug->create_slug($isi->desa)))->row();

if( is_numeric($isi->desa) )
{
    $desa = $this->option->get_select_desa($get->id_desa, 'nama_desa');
    $kepala =$this->option->village_prefix( $isi->desa )['k'];
    $jenis =$this->option->village_prefix( $isi->desa )['j'];
} else {
    $desa = $isi->desa;
    $kepala = $this->option->village_prefix( $dszak->id_desa )['k'];
    $jenis = $this->option->village_prefix( $dszak->id_desa )['j'];
}
?>
    <style>
        table, table.table-bordered {
            font-size: 1.2em
        }
        p {
            font-size: 1.2em;
        }
    </style>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p>Yang bertanda tangan di bawah ini :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="130">atas Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->pejabat_lurah; ?></strong></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->nip_pejabat_lurah; ?></strong></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->jabatan_pejabat_lurah; ?></strong></td>
                </tr>
            </table>
            <p>Menerangkan dengan sesungguhnya bahwa :</p>
            <table class="table-bordered" width="100%" style="margin-top: 5px; margin-bottom:5px; font-size: 13px;">
                <tr>
                    <th width="40">No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th width="100">Tanggal Lahir</th>
                    <th width="150">SHDK</th>
                </tr>
                <tr>
                    <td class="text-center">1.</td>
                    <td><?php echo $get->nama_lengkap; ?></td>
                    <td class="text-center"><?php echo $get->nik; ?></td>
                    <td class="text-center"><?php echo strtoupper($get->jns_kelamin); ?></td>
                    <td><?php echo ucfirst($get->tmp_lahir) ?></td>
                    <td><?php echo date_id($get->tgl_lahir) ?></td>
                    <td class="text-center"><?php echo strtoupper($get->status_kk) ?></td>
                </tr>
            <?php 
            /* Loop data penduduk */
            $key_no = 1;
            if(count(@$isi->pengikut) < 1) :
            foreach($isi->pengikut as $key => $value) :
                $ikut = $this->db->get_where('penduduk', array('ID' => $value->id))->row();
            ?>
                <tr>
                    <td class="text-center"><?php echo ++$key_no; ?>.</td>
                    <td><?php echo $ikut->nama_lengkap; ?></td>
                    <td class="text-center"><?php echo $ikut->nik; ?></td>
                    <td class="text-center"><?php echo strtoupper($ikut->jns_kelamin); ?></td>
                    <td><?php echo ucfirst($ikut->tmp_lahir) ?></td>
                    <td><?php echo date_id($ikut->tgl_lahir) ?></td>
                    <td class="text-center"><?php echo strtoupper($ikut->status_kk) ?></td>
                </tr>
            <?php endforeach; 
            endif;
            ?>
            </table>
            <p class="indent">Nama-nama tersebut diatas memang benar warga <?php echo $jenis." ".$desa; ?> yang berdomisisli di <?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' '.$jenis." ".$desa.' '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten').' Prov. '.$this->option->get('provinsi'); ?> dan memang benar berdasarkan data pemantauan kami dilapangan yang bersangkutan adalah benar <strong>KELUARGA TIDAK MAMPU</strong>.</p>
            <p class="indent">Demikiaan, Surat Keterangan Kurang Mampu ini dibuat, agar dapat dipergunakan untuk <strong>"<?php echo strtoupper($isi->keperluan); ?>"</strong>.</p>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong><?php echo ucfirst($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?></strong><br>
                        <?php if($get->jabatan != 'CAMAT') : ?>
                        <strong>a.n. CAMAT <?php echo strtoupper($this->option->get('kecamatan')) ?></strong><br>
                        <?php endif; ?>
                        <strong><?php echo $get->jabatan; ?></strong>
                    </td>
                </tr>
                <tr><td colspan="3" style="height: 70px;"></td></tr>
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 20%;"></td>
                    <td style="width: 40%;" class="text-center">
                        <strong style="border-bottom: 0.2px solid #444; padding-bottom: 1.5px;"><?php echo $isi->pejabat_lurah; ?></strong><br>
                        <strong style=" line-height: 2px;"><?php echo $isi->jabatan_pejabat_lurah; ?></strong><br>
                        <strong>NIP. <?php echo $isi->nip_pejabat_lurah; ?></strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php

$this->load->view('print/footer-surat');

/* End of file kelakuan-baik.php */
/* Location: ./application/views/surat-keluar/print/kelakuan-baik.php */