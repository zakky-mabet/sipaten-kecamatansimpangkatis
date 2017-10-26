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
    $kepala =$this->option->village_prefix( $isi->desa )['j'];
} else {
    $desa = $isi->desa;
    $kepala = $this->option->village_prefix( $dszak->id_desa )['j'];
}

?>
    <style>
    div.mail-content,
    div.mail-footer {
        font-size: 14pt;
    }
    div.mail-content > p.indent { text-indent: 40px; }
    div.mail-content > p {
       letter-spacing: 0.7px;
       word-spacing: auto;
       line-height: 1.3em;
       text-align: justify;
    }
    div.mail-heading { margin-bottom: 20px; margin-top: -10px; font-size: 1.2em; }
    div.mail-footer > table {  margin-top: 0px; font-size: 13pt; }
    </style>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper">Surat rekomendasi camat <?php echo $this->option->get('kecamatan'); ?></h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-heading" style="margin-bottom:-30px;">
            <h5 class="mail-number upper">Tentang</h5> <br>
            <h5 class="mail-number upper">izin keramaian</h5>
        </div>
        <div class="mail-content">
            <p class="indent">Memperhatikan Surat Pengantar dari <?php echo $kepala ?> <?php echo $this->option->get_select_desa($isi->desa, 'nama_desa'); ?> Kecamatan <?php echo $this->option->get('kecamatan'); ?> Nomor : <?php echo $isi->no_surat_rek; ?> tanggal <?php echo date_id($isi->tgl_surat_rek); ?>, dengan ini Camat  <?php echo $this->option->get('kecamatan'); ?> menerangkan bahwa :</p>
            <table style="margin-top: -14px; margin-bottom:0px;">
                <tr>
                    <td width="170">Nama</td>
                    <td class="text-center" width="20">:</td>
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
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->pekerjaan); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->alamat).' '.strtoupper($kepala).' '.strtoupper($this->option->get_select_desa($isi->desa, 'nama_desa')).' '.strtoupper($get->nama_desa).' KEC. '.strtoupper($this->option->get('kecamatan')).' KAB. '.strtoupper($this->option->get('kabupaten')); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Keperluan</td>
                    <td class="text-center">:</td>
                    <td>Mengurus Izin Keramaian dalam rangka <strong>"<?php echo strtoupper($isi->keperluan); ?>"</strong> yang akan diselenggarakan : 
                    <table style="margin-top: 0px; margin-bottom:-10px;">
                        <tr>
                            <td width="50">Hari</td>
                            <td class="text-center" width="30">:</td>
                            <td><?php echo strtoupper($isi->hari); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td class="text-center">:</td>
                            <td><?php echo strtoupper(date_id($isi->tanggal)); ?></td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td class="text-center">:</td>
                            <td><?php echo strtoupper($isi->waktu); ?></td>
                        </tr>
                        <tr style="vertical-align: top">
                            <td>Tempat</td>
                            <td class="text-center">:</td>
                            <td><?php echo strtoupper($isi->tempat).' '.strtoupper($desa).' KEC. '.strtoupper($this->option->get('kecamatan')).' KAB. '.strtoupper($this->option->get('kabupaten')); ?></td>
                        </tr>
                        <tr style="vertical-align: top;">
                            <td>Hiburan</td>
                            <td class="text-center">:</td>
                            <td><?php echo strtoupper($isi->hiburan) ?></td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>
            <p class="indent">Pada prinsipnya kami tidak keberatan atas penyelenggaraan kegiatan tersebut dengan ketentuan sebagai berikut :
                <ol style="margin-left: -20px; margin-top: -15px;">
                <?php if($isi->jenis_keramaian == 'non retribusi') : ?>
                    <li style="padding-left: 5px;">Harus menjaga ketertiban dan keamanan setempat;</li>
                    <li style="padding-left: 5px;">Harus menjaga kebersihan lokasi;</li>
                    <li style="padding-left: 5px;">Melaporkan kepada Dinas/Instansi terkait sebelum maupun akan berakhirnya keramaian dimaksud;</li>
                    <li style="padding-left: 5px;">Agar berkoordinasi dengan aparat setempat;</li>
                    <li style="padding-left: 5px;">Harus mentaati peraturan perundang-undangan, peraturan daerah dan norma-norma yang berlaku.</li>
                <?php else : ?>
                    <li>Harus meneruskan Rekomendasi ini kepada Bupati <?php echo $this->option->get('kabupaten') ?> Cq. Kepala Dinas Kebudayaan Pariwisata, Kepemudaan, dan Olahraga Kabupaten <?php echo $this->option->get('kabupaten') ?>.</li>
                    <li>Harus menyetor PAD kepada Pemerintah Daerah <?php echo $this->option->get('kabupaten') ?> Cq. Ka. Badan Pengolahan Pajak dan Retribusi Daerah Kab. <?php echo $this->option->get('kabupaten') ?>.</li>
                    <li>Harus menjaga ketertiban dan keamanan setempat.</li>
                    <li>Harus menjaga kebersihan lokasi Acara.</li>
                    <li>Melaporkan kepada Dinas/Instansi terkait sebelum dan setelah berakhirnya keramain dimaksud.</li>
                    <li>Agar berkoordinasi dengan aparat setempat.</li>
                    <li>Harus mentaati peraturan perundang-undangan, peraturan daerah, dan norma-norma yang berlaku.</li>
                <?php endif; ?>
                </ol>
            </p>
        </div>
        <div class="mail-footer">
            <table style="width: 100%; margin-top: -10px;">
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