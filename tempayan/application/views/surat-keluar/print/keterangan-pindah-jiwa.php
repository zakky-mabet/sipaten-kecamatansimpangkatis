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
    if($dszak == TRUE) 
    {
        $desa = $isi->desa;
        $kepala = $this->option->village_prefix( $dszak->id_desa )['j'];  
    } else {
        $desa = $isi->desa;
        $kepala = 'Desa';
    }
}
?>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <td width="150">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo strtoupper($get->nama_lengkap); ?></strong></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->tmp_lahir).', '.strtoupper(date_id($get->tgl_lahir)); ?></td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->kewarganegaraan); ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->agama); ?></td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->status_kawin); ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->pekerjaan); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->alamat).' RT.'.$get->rt.' '.strtoupper($kepala).' '.strtoupper($desa).' KEC. '.strtoupper($this->option->get('kecamatan')).' KAB. '.strtoupper($this->option->get('kabupaten')); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Pindah Ke </td>
                    <td class="text-center">:</td>
                    <td>
                        <table>
                            <tr>
                                <td>Desa/Kelurahan</td>
                                <td width="40" class="text-center">:</td>
                                <td><?php echo strtoupper($desa); ?></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td width="40" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->kecamatan); ?></td>
                            </tr>
                            <tr>
                                <td>Kabupaten/Kota</td>
                                <td width="40" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->kabupaten); ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td width="40" class="text-center">:</td>
                                <td><?php echo strtoupper($isi->provinsi); ?></td>
                            </tr>
                            <tr>
                                <td>Pada Tanggal</td>
                                <td width="40" class="text-center">:</td>
                                <td><?php echo strtoupper(date_id($isi->tgl_pindah)); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alasan Pindah </td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($isi->alasan_pindah); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Pengikut </td>
                    <td class="text-center">:</td>
                    <td><?php echo (property_exists($isi, 'pengikut')) ? count($isi->pengikut)." ORANG" : '-'; ?></td>
                </tr>
            </table>
            <table class="table-bordered" width="100%" style="margin-top: 10px; margin-bottom:10px;">
                <tr>
                    <th width="40">No</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th width="150">SHDK</th>
                </tr>
            <?php 
            /* Loop data penduduk */
            $key_no = 1;
            if(property_exists($isi, 'pengikut')) :
            foreach($isi->pengikut as $key => $value) :
                $ikut = $this->db->get_where('penduduk', array('ID' => $value->id))->row();
            ?>
                <tr>
                    <td class="text-center"><?php echo $key_no++; ?>.</td>
                    <td><?php echo $ikut->nama_lengkap; ?></td>
                    <td><?php echo ucfirst($ikut->tmp_lahir).', '.date_id($ikut->tgl_lahir) ?></td>
                    <td class="text-center"><?php echo strtoupper($ikut->status_kk) ?></td>
                </tr>
            <?php endforeach; 
            else :
            ?>
                <tr style="height: 25px;">
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