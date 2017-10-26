<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

$date = new DateTime($get->tanggal);

$kk = $this->surat_keluar->get_kepala_keluarga( $get->no_kk );
?>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <table style="margin-top: 10px; margin-bottom:10px; font-size: 12px;">
                <tr>
                    <td colspan="3"><h3 class="upper" style="margin:0px 0px 10px 0px;">data daerah asal</h3></td>
                </tr>
                <tr>
                    <td width="160">1. Nomor Kartu Keluarga</td>
                    <td class="text-center" style="width: 20px;">:</td>
                    <td><?php echo $get->no_kk ?></td>
                </tr>
                <tr>
                    <td>2. Nama Kepala Keluarga</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper(@$kk->nama_lengkap); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>3. Alamat</td>
                    <td class="text-center">:</td>
                    <td> <?php echo strtoupper(@$kk->alamat); ?>
                        <table>
                            <tr style="vertical-align: top">
                                <td style="width: 100px;">a. Desa/Kelurahan</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper(@$kk->nama_desa); ?></td>
                                <td style="width: 5px;"></td>
                                <td style="width: 100px;">c. Kabupaten/Kota</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($this->option->get('kabupaten')); ?></td>
                            </tr>
                            <tr style="vertical-align: top">
                                <td>b. Kecamatan</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($this->option->get('kecamatan')); ?></td>
                                <td style="width: 5px;"></td>
                                <td>d. Provinsi</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($this->option->get('provinsi')); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>4. NIK Pemohon</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr>
                    <td>5. Nama Lengkap</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->nama_lengkap); ?></td>
                </tr>
                <tr>
                    <td colspan="3"><h3 class="upper" style="margin:10px 0px 10px 0px;">data kepindahan</h3></td>
                </tr>
                <tr>
                    <td width="170">1. Alasan Pindah</td>
                    <td class="text-center" style="width: 15px;">:</td>
                    <td><?php echo strtoupper($isi->alasan_pindah); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>2. Alaat Tujuan Pindah</td>
                    <td class="text-center">:</td>
                    <td> 
                        <table style="margin-top: -2px;">
                            <tr style="vertical-align: top">
                                <td style="width: 120px;">a. Alamat</td>
                                <td width="10" class="text-center">:</td>
                                <td colspan="4"><?php echo strtoupper($isi->alamat_pindah); ?></td>  
                            </tr>
                            <tr style="vertical-align: top">
                                <td style="width: 120px;">b. Desa/Kelurahan</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->desa); ?></td>
                                <td style="width: 5px;"></td>
                                <td style="width: 130px;">d. Kabupaten/Kota</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->kabupaten); ?></td>
                            </tr>
                            <tr style="vertical-align: top">
                                <td>c. Kecamatan</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->kecamatan); ?></td>
                                <td style="width: 5px;"></td>
                                <td>e. Provinsi</td>
                                <td width="10" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->provinsi); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>3. Klasifikasi Pindah</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->klasifikasi_pindah); ?></td>
                </tr>
                <tr>
                    <td>4. Jenis Kepindahan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->jns_kepindahan); ?></td>
                </tr>
                <tr>
                    <td>5. Status KK Bagi Yang &nbsp;&nbsp;&nbsp;&nbsp;Tidak Pindah</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->status_kk_tdk_pindah); ?></td>
                </tr>
                <tr>
                    <td>6. Status KK Bagi Yang &nbsp;&nbsp;&nbsp;&nbsp;Pindah</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->status_kk_pindah); ?></td>
                </tr>
                <tr>
                    <td>7. Keluarga Yang Pindah</td>
                    <td class="text-center">:</td>
                    <td></td>
                </tr>
            </table>
            <table class="table-bordered" width="100%" style="margin-top: 10px; margin-bottom:10px; font-size: 11px;">
                <tr>
                    <th rowspan="2" width="20">No</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="2">JK</th>
                    <th rowspan="2">Tempat, Tanggal Lahir</th>
                    <th rowspan="2">Status Perkawinan</th>
                    <th rowspan="2">NIK</th>
                    <th rowspan="2" width="150">SHDK</th>
                </tr>
                <tr>
                    <th>L</th>
                    <th>P</th>
                </tr>
                <tr>
                    <td class="text-center">1.</td>
                    <td><?php echo $get->nama_lengkap; ?></td>
                    <td class="text-center"><?php if($get->jns_kelamin=='LAKI-LAKI') echo '<i class="fa fa-check"></i>'; ?></td>
                    <td class="text-center"><?php if($get->jns_kelamin=='PEREMPUAN') echo '<i class="fa fa-check"></i>'; ?></td>
                    <td><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                    <td><?php echo $get->status_kawin; ?></td>
                    <td><?php echo $get->nik; ?></td>
                    <td><?php echo strtoupper($get->status_kk); ?></td>
                </tr>
            <?php  
            /* 
            * Loop Data Keluarag 
            * From parent Model
            */
            if($get->no_kk != FALSE) :
                $key_no = 1;
                foreach($this->create_surat->get_keluarga($get->no_kk) as $key => $value) :
                    /* Tidak dengan orang mengajukan */
                    if($get->nik==$value->nik) 
                        continue;
            ?>
                <tr>
                    <td class="text-center"><?php echo ++$key_no; ?>.</td>
                    <td><?php echo $value->nama_lengkap; ?></td>
                    <td class="text-center"><?php if($value->jns_kelamin=='LAKI-LAKI') echo '<i class="fa fa-check"></i>'; ?></td>
                    <td class="text-center"><?php if($value->jns_kelamin=='PEREMPUAN') echo '<i class="fa fa-check"></i>'; ?></td>
                    <td><?php echo ucfirst($value->tmp_lahir).', '.date_id($value->tgl_lahir) ?></td>
                    <td><?php echo $value->status_kawin ?></td>
                    <td><?php echo $value->nik; ?></td>
                    <td><?php echo strtoupper($value->status_kk) ?></td>
                </tr>
            <?php endforeach; else : ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php
            endif;
            ?>
            </table>
        </div>
        <div class="mail-footer">
            <table style="width: 100%; font-size: 13px;">
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