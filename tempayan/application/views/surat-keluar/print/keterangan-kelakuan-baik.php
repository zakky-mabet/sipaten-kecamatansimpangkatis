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
    $kepala = $this->option->village_prefix( $isi->desa )['k'];
    $jenis = $this->option->village_prefix( $isi->desa )['j'];
} else {
    $desa = $isi->desa;
    $kepala = $this->option->village_prefix( $dszak->id_desa )['k'];
    $jenis = $this->option->village_prefix( $dszak->desa )['j'];
}


?>
    <style>
        table {
            font-size: 1.2em
        }
        p {
            font-size: 1.2em;
        }
        div.mail-content > p.indent { text-indent: 70px; }
        div.mail-heading > h5.mail-name,
        div.mail-heading > h5.mail-number { font-size: 1.2em; }
        div.mail-footer > table {  margin-top: 100px; }
    </style>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p class="indent">Memperhatikan Surat Keterangan Kelakuan Baik dari <?php echo $kepala.' '.$desa; ?> Kecamatan <?php echo $this->option->get('kecamatan'); ?> Nomor : <?php echo $isi->no_surat_rek; ?> tanggal <?php echo date_id($isi->tgl_surat_rek); ?>, dengan ini Camat  <?php echo $this->option->get('kecamatan'); ?> menerangkan bahwa :</p>
            <table style="margin-left:70px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="180">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($get->nama_lengkap); ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->agama); ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->pekerjaan); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->alamat).' RT.'.$get->rt.' '.strtoupper($jenis).' '.strtoupper($desa).' KEC. '.strtoupper($this->option->get('kecamatan')).' KAB. '.strtoupper($this->option->get('kabupaten')); ?></td>
                </tr>
            </table>
            <p class="indent">Sepanjang sepengetahuan kami bahwa nama tersebut adalah benar berkelakuan baik dalam kehidupan sehari-hari dan dalam kehidupan bermasyarakat.</p>
            <p class="indent">Demikian, Surat Keterangan ini dibuat, sebagai pengantar untuk melengkapi persyaratan <strong>"<?php echo strtoupper($isi->keperluan) ?>"</strong>.</p>
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
                        <strong style="border-bottom: 0.2px solid #444; padding-bottom: 1.5px;"><?php echo ucfirst($get->nama); ?></strong><br>
                        <strong style=" line-height: 2px;"><?php echo ucfirst($get->pangkat); ?></strong><br>
                        <strong>NIP. <?php echo $get->nip; ?></strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php

$this->load->view('print/footer-surat');

/* End of file kelakuan-baik.php */
/* Location: ./application/views/surat-keluar/print/kelakuan-baik.php */