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
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p class="indent">
            Yang bertanda tangan di bawah ini <?php echo $kepala ?> : <strong><?php echo strtoupper($desa); ?></strong> <?php echo $this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?>, menerangkan dengan sebenarnya bahwa :
            </p>
            <table style=" margin-top: 10px; margin-bottom:10px;">
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
                    <td>NIK</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat Tinggal</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' '.$jenis.' '.$desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td>Telepon/HP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->telepon; ?></td>
                </tr>
            </table>
            <p>Sedang / akan melakukan kegiatan Mendirikan Bangunan sebagai berikut :</p>
            <table style="margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="230">1. Nama Perusahaan/Perorangan</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($isi->nama_perusahaan); ?></strong></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>2. Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat_perusahaan.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td>3. Jenis Kegiatan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->jenis_bangunan; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>4. Jenis Bangunan</td>
                    <td class="text-center">:</td>
                    <td>Mendirikan bangunan gedung baru/rehabilitas/renovasi/pelestarian (pemugaran) bangunan gedung.</td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>5. Lokasi Bangunan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->alamat_perusahaan.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>6. Luas Bangunan</td>
                    <td class="text-center">:</td>
                    <td>
                        Lt. 1 : <?php echo $isi->luas_bangunan[0][0].' M x '.$isi->luas_bangunan[0][1]. ' M = '.$isi->luas_bangunan[0][2]; ?> M<sup>2</sup><br>
                        Lt. 2 : <?php echo ($isi->luas_bangunan[1][0] != '') ? $isi->luas_bangunan[1][0].' M x '.$isi->luas_bangunan[1][1]. ' M = '.$isi->luas_bangunan[1][2].' M<sup>2</sup>' : '-'; ?><br>
                        Lt. 3 : <?php echo ($isi->luas_bangunan[2][0] != '') ? $isi->luas_bangunan[2][0].' M x '.$isi->luas_bangunan[2][1]. ' M = '.$isi->luas_bangunan[2][2].' M<sup>2</sup>' : '-'; ?>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>7. GSB (Garis Sempadan Bangunan)</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->gsb; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>8. Status Hak Atas Tanah</td>
                    <td class="text-center">:</td>
                    <td>Milik Sendiri / Sewa / Kontrak / Pinjam Pakai</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>9. Bagi mereka yang tempat usahanya bukan milik sendiri</td>
                    <td class="text-center">:</td>
                    <td>
                        <ul style="list-style: lower-alpha; margin: 0px; margin-left: -25px;">
                            <li>Nama Pemilik Tanah : <?php echo $isi->nama_pemilik_tanah; ?></li>
                            <li>Alamat Pemilik Tanah : <?php echo $isi->alamat_pemilik; ?></li>
                            <li>Perjanjian Sewa / kontak : Ada / Tidak / Pinjam</li>
                            <li>Jangka waktu perjanjian sewa : <?php echo ($isi->jangka_tahun != '') ? $isi->jangka_tahun : '..........' ?> Tahun, dari tanggal <?php echo ($isi->jangka_mulai != '') ? date_id($isi->jangka_mulai) : '.....................' ?> s/d <?php echo ($isi->jangka_akhir != '') ? date_id($isi->jangka_akhir) : '.....................' ?></li>
                        </ul>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>10. Keterangan lain-lain</td>
                    <td class="text-center">:</td>
                    <td>Kegiatan tersebut tidak / perlu SIG / HO</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>11. Site Plan dan Gambar Situasi</td>
                    <td class="text-center">:</td>
                    <td>Lampiran</td>
                </tr>
            </table>
            <p class="indent">Atas permohonan tersebut, kami menyatakan bahwa tanah yang dimohonkan IMB benar-benar milik pemohon serta tidak terdapat suatu masalah atau tidak dalam sengketa tanah/bangunan.</p>
            <p class="indent">Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
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