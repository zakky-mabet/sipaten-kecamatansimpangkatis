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
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="140">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($isi->ttd_desa); ?></strong></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->jabatan_desa; ?></td>
                </tr>
            </table>
            <p>Menerangkan dengan sesungguhnya dan sebenarnya bahwa :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="140">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($get->nama_lengkap); ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->pekerjaan; ?></td>
                </tr>
                <tr>
                    <td>Alamat Tinggal</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
            </table>
            <p>Sedang / akan melakukan kegiatan Gangguan sebagai berikut :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="190">1. Nama Toko/Kios/Perusahaan</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($get->nama); ?></strong></td>
                </tr>
                <tr>
                    <td>2. Alamat Tempat Usaha</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td>3. Jenis Kegiatan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->jenis_kegiatan; ?></td>
                </tr>
                <tr>
                    <td>4. Jenis Bangunan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->jenis_bangunan; ?></td>
                </tr>
                <tr>
                    <td>5. Lokasi Bangunan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->lokasi_bangunan.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
            </table>
            <p class="indent">Demikian Surat Rekomendasi ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="mail-footer">
            <table align="left" style="margin-right: 11%;margin-bottom:50px;">
                <tr style="text-align:left">
                    <td>Nomor</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->no_surat_rek; ?></td>
                </tr>
                <tr>
                    <td>Tanggal </td>
                    <td class="text-center">:</td>
                    <td><?php echo date_id($isi->tgl_surat_rek); ?></strong></td>
                </tr>
            </table>
            <table align="right" style="margin-right: 8%;margin-bottom:30px;">
                <tr style="text-align:left">
                    <td>Dikeluarkan</td>
                    <td class="text-center">:</td>
                    <td>Koba</td>
                </tr>
                <tr>
                    <td>Pada Tanggal </td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($this->option->get('kecamatan')) ?>, <?php echo date_id($get->tanggal); ?></strong></td>
                </tr>
            </table>
            <table style="width: 100%;" align="center">
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