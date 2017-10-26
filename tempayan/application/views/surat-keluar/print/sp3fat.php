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
            <p>Yang bertanda tangan dibawah ini :</p>
             <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="80">Lurah / Kades</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->desa ?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($this->option->get('kecamatan')) ?></td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($this->option->get('kabupaten')) ?></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($this->option->get('provinsi')) ?></td>
                </tr>
            </table>
            <p>Dengan ini menerangkan sebagai berikut :</p>
            <p>
                <ol style="list-style:">
                    <li><p>
                        Bahwa berdasarkan Surat Pernyataan Pengakuan Fisik Atas Tanah tanggal <?php echo date_id($isi->tgl_surat_kuasa); ?> diketahui <?php echo $kepala ?> <?php echo $isi->desa ?> tanggal <?php echo date_id($isi->tgl_diketahui); ?> Nomor : <?php echo $isi->no_surat_kuasa; ?> berupa tanah pekarangan yang terleak di <?php echo $isi->letak_tanah; ?> dengan luas <strong>&plusmn; <?php echo $isi->luas_tanah; ?> M<sup>2</sup> (Kurang Lebih <?php echo terbilang($isi->luas_tanah, 'ucfirst'); ?> Meter Persegi)</strong> <br></p>
                        <p>Dengan Batas-batas sebagai berikut :</p>
                        <table>
                            <tr>
                                <td width="230">Sebelah Utara berbatasan dengan </td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->bts_utara->ket.' '.$isi->bts_utara->nama; ?> M<sup>3</sup></td>
                            </tr>
                            <tr>
                                <td width="230">Sebelah Timur berbatasan dengan </td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->bts_timur->ket.' '.$isi->bts_timur->nama; ?> M<sup>3</sup></td>
                            </tr>
                            <tr>
                                <td width="230">Sebelah Selatan berbatasan dengan </td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->bts_selatan->ket.' '.$isi->bts_selatan->nama; ?> M<sup>3</sup></td>
                            </tr>
                            <tr>
                                <td width="230">Sebelah Barat berbatasan dengan </td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->bts_barat->ket.' '.$isi->bts_barat->nama; ?> M<sup>3</sup></td>
                            </tr>
                            <tr>
                                <td colspan="4">(Gambar Denah Sementara Terlampir)</td>
                            </tr>
                        </table>
                        <p>Adalah benar tanah yang dikuasai oleh :</p>
                        <table>
                            <tr>
                                <td width="150">Nama </td>
                                <td class="text-center">:</td>
                                <td><?php echo $get->nama_lengkap; ?> </td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td class="text-center">:</td>
                                <td><?php echo $get->tmp_lahir.', '.date_id($get->tgl_lahir); ?> </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td class="text-center">:</td>
                                <td><?php echo strtoupper($get->jns_kelamin); ?> </td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td class="text-center">:</td>
                                <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' Kelurahan '.$get->nama_desa.' Kec. '.$this->option->get('kecamatan'); ?></td>
                            </tr>
                            <tr>
                                <td>Agama </td>
                                <td class="text-center">:</td>
                                <td><?php echo strtoupper($get->agama); ?> </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan </td>
                                <td class="text-center">:</td>
                                <td><?php echo ucfirst($get->pekerjaan); ?> </td>
                            </tr>
                            <tr>
                                <td>NIK </td>
                                <td class="text-center">:</td>
                                <td><?php echo $get->nik; ?> </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <p>
                            Bahwa tanah pekarangan atau kebun tersebut diusahakan oleh yang bersangkutan sejak Tahun <?php echo $isi->tahun_kuasa; ?> dan didapat/diperoleh dari Tanah negara yang sampai saat ini disusahakan/dikuasai secara terus menerus secara aktif.
                        </p>
                    </li>
                    <li>
                        <p>
                            Bahwa tanah tersebut belum dipindahtangankan degan pihak lain, tidak sengketa, tidak dalam perkara, tidak diborgkan/jaminan hutang pada pihak lain dan bukan merupakan tanah warisan/milik bersama yang belum dibagi-bagikan.
                        </p>
                    </li>
                </ol>
            </p>
            <p>Demikian Surat Keterangan Penguasaan Fisik Atas Tanah ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana   mestinya dan akan diperbaiki apabila terjadi kekeliuran.</p>
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

/* End of file sp3fat.php */
/* Location: ./application/views/surat-keluar/print/sp3fat.php */