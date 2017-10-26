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
    <style>
    div.mail-content,
    div.mail-footer {
        font-size: 15pt;
    }
    div.mail-content > p.indent { text-indent: 70px; }
    div.mail-content > p {
       letter-spacing: 0.7px;
       word-spacing: auto;
       line-height: 1.5em;
       text-align: justify;
    }
    div.mail-heading > h5.mail-number { font-size: 1.2em; }
    div.mail-heading { margin-bottom: 20px; margin-top: 20px; }
    div.mail-footer > table {  margin-top: 100px; }
    </style>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p class="indent">Berdasarkan Surat dari <?php echo $isi->sumber_rekomendasi; ?> <?php echo $isi->nama_lembaga; ?> Nomor : <?php echo $isi->no_surat_rek; ?> tanggal <?php echo date_id($isi->tgl_surat_rek); ?> perihal Permohonan dan Perpanjangan Izin Operasional a.n :</p>
            <table style="margin-left:70px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="140">Nama Lembaga</td>
                    <td class="text-center" width="30">:</td>
                    <td><strong><?php echo strtoupper($isi->nama_lembaga); ?></strong></td>
                </tr>
                <tr>
                    <td>Nama Pengelola</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->nama_pengelola); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->alamat_lembaga).' KEC. '.strtoupper($this->option->get('kecamatan')).' KAB. '.strtoupper($this->option->get('kabupaten')); ?></td>
                </tr>
            </table>
            <p class="indent">Dengan maksud mengajukan Permohonan Perpanjangan Izin Operasional. Dan Pihak kami prinsipnya tidak keberatan untuk memberikan rekomendasi Perpanjangan Izin Operasional <?php echo strtoupper($isi->nama_lembaga); ?> sepanjang mematuhi dan mentaati segala peraturan dan perundang-undangan yang berlaku.</p>
            <p class="indent">Demikian, Surat rekomendasi ini dibuat untuk dapat dipergunakan sebagaimana mestinya. Atas perhatiannya kami ucapkan terima kasih.</p>
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

/* End of file perpanjangan-izin-oprasional.php */
/* Location: ./application/views/surat-keluar/print/perpanjangan-izin-oprasional.php */