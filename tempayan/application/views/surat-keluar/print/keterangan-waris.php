<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

$date = new DateTime($get->tanggal);

?>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p>Yang bertanda tangan di bawah ini :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="130">Nama</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->pejabat_lurah; ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->nip_pejabat_lurah; ?></td>
                </tr>
                <tr>
                    <td>Perangkat / Golongan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->perangkat_desa; ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->jabatan_pejabat_lurah; ?></td>
                </tr>
            </table>
            <p>Dengan ini menerangkan sebagai berikut :
                <ol>
                    <li>Bahwa berdasarkan Surat Pernyataan Ahli Waris tanggal <?php echo date_id($isi->tgl_surat_waris); ?> yang diketahui oleh <?php echo $isi->diketahui_oleh; ?> tanggal <?php echo date_id($isi->tgl_diketahui); ?>.</li>
                    <li>Bahwa berdasarkan Akta Kematian Nomor : <?php echo $isi->no_akta_kematian; ?> yang ditandatangani oleh <?php echo $isi->akta_ttd; ?> tanggal <?php echo date_id($isi->tgl_akta); ?>.</li>
                </ol>
            </p>
            <p>Sepengetahuan kami benar nama-nama tersebut adalah Para Ahli Waris dari :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="80">Nama</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->nama; ?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->umur; ?> Tahun</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat; ?></td>
                </tr>
            </table>
            <p>Yang meninggal dunia pada hari <?php echo $isi->hari_mati; ?> tanggal <?php echo date_id($isi->tgl_mati); ?> di <?php echo strtoupper($isi->tmp_mati); ?></p>
            <p>Demikian Surat Keterangan ini dibuat untuk dipergunakan seperlunya.</p>
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