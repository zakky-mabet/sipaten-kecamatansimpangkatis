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
            <p>Yang bertanda tangan di bawah ini, menerangkan bahwa :</p>
            <table style="margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="180">1. Nama Lengkap Pemohon</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nama_lengkap; ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>2. NIK Pemohon</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>3. Nomor Kartu Keluarga</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->no_kk; ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>4. Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->jns_kelamin); ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>5. Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->tmp_lahir.", ".date_id($get->tgl_lahir) ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>6. Status Perkawinan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->status_kawin) ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>7. No dan Tanggal Masuk</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->no_tanda_masuk; ?> <br> <?php echo date_id($isi->tgl_tanda_masuk); ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>8. Alamat Asal</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat; ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>9. Alamat Sekarang</td>
                    <td class="text-center">:</td>
                    <td>
                        <table>
                            <tr style="vertical-align: top;">
                                <td>a. Desa/Kelurahan</td>
                                <td class="text-center" width="10">:</td>
                                <td><?php echo $isi->desa_pindah; ?></td>
                                <td width="30"></td>
                                <td>c. Kab/Kota</td>
                                <td class="text-center" width="10">:</td>
                                <td><?php echo $isi->kabupaten_pindah; ?></td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>b. Kecamatan</td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->kecamatan_pindah; ?></td>
                                <td width="30"></td>
                                <td>d. Provinsi</td>
                                <td class="text-center" width="10">:</td>
                                <td><?php echo $isi->provinsi_pindah; ?></td>
                            </tr>
                        </table> 
                    </td>
                </tr>
                <t  style="vertical-align: top;">
                    <td>10. Kode Pos</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->kd_pos_pindah ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>11. Alasan Pindah</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($isi->alasan_pindah); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>12. Golongan Darah</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->gol_darah); ?></td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td>13. Penanggung Jawab</td>
                    <td class="text-center">:</td>
                    <td>
                        <table>
                            <tr>
                                <td>a. Nama</td>
                                <td class="text-center" width="30">:</td>
                                <td><?php echo $isi->nama; ?></td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>b. Alamat</td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->alamat; ?></td>
                            </tr>
                            <tr style="vertical-align: top;">
                                <td>c. Pekerjaan</td>
                                <td class="text-center">:</td>
                                <td><?php echo $isi->pekerjaan ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr  style="vertical-align: top;">
                    <td colspan="3">14. Nama dan NIK anggota keluarga pengikut :</td>
                </tr>
            </table>
            <table class="table-bordered" width="100%" style="margin-top: 10px; margin-bottom:10px; font-size: 11px;">
                <tr>
                    <th width="40">No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th width="100">Tanggal Lahir</th>
                    <th width="150">Hubungan dengan Pemohon</th>
                </tr>
            <?php 
            /* Loop data penduduk */
            if( is_array($isi->pengikut) ):
                foreach($isi->pengikut as $key => $value) :
                $ikut = $this->db->get_where('penduduk', array('ID' => $value->id))->row();
            ?>
                <tr>
                    <td class="text-center"><?php echo ++$key; ?>.</td>
                    <td><?php echo $ikut->nama_lengkap; ?></td>
                    <td class="text-center"><?php echo $ikut->nik; ?></td>
                    <td class="text-center"><?php echo strtoupper($ikut->jns_kelamin); ?></td>
                    <td><?php echo ucfirst($ikut->tmp_lahir) ?></td>
                    <td><?php echo date_id($ikut->tgl_lahir) ?></td>
                    <td class="text-center"><?php echo strtoupper($value->status_hubungan) ?></td>
                </tr>
            <?php endforeach; 
            endif;
            ?>
            </table>
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

/* End of file keterangan-tinggal-sementara.php */
/* Location: ./application/views/surat-keluar/print/keterangan-tinggal-sementara.php */