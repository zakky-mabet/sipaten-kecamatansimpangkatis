<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Vicky Nitinegoro <pkpvicky@gmail.com>
 **/
$this->load->view('print/header');

$date = new DateTime($get->tanggal);

if($get->no_kk == FALSE)
    exit("Maaf, tidak ada Nomor KK yang terhubung pada data ini.");

$dszak = $this->db->get_where('desa', array('slug' => $this->slug->create_slug($isi->desa)))->row();

if( is_numeric($isi->desa) )
{
    $desa = $this->option->get_select_desa($get->id_desa, 'nama_desa');
    $kepala =$this->option->village_prefix( $isi->desa )['k'];
} else {
    $desa = $isi->desa;
    $kepala = $this->option->village_prefix( $dszak->id_desa )['k'];
}
?>
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <table>
                <tr>
                    <td width="130"></td>
                    <td colspan="4">Yang bertanda tangan dibawah ini <?php echo $kepala.' '.$desa ?> Kecamatan <?php echo $this->option->get('kecamatan'); ?> Kabupaten <?php echo $this->option->get('kabupaten'); ?> dengan ini menerangkan :</td>
                </tr>
                <tr> <td colspan="5" height="10"></td> </tr>
            <?php  
            foreach($this->option->get_parent_kk($get->no_kk) as $key => $value) :
            ?>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"><?php echo ++$key; ?>. </td>
                    <td width="130">Nama <?php echo ucfirst($value->status_kk) ?></td>
                    <td width="30" class="text-center">:</td>
                    <td><?php echo $value->nama_lengkap; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo $value->tmp_lahir.", ".date_id($value->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($value->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Kewarganegaraan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($value->kewarganegaraan); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Agama</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($value->agama); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $value->pekerjaan; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $value->alamat.", ".$this->db->get_where('desa', array('id_desa' => $value->desa))->row('nama_desa').", ".$this->option->get('kecamatan').", ".$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Nomor KTP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $value->nik; ?></td>
                </tr>
                <tr> <td colspan="5" height="10"></td> </tr>
            <?php  
            endforeach;
            ?>
                <tr> <td colspan="5" height="10"></td> </tr>
                <tr>
                    <td width="130"></td>
                    <td colspan="4">Tersebut pada butir 1 dan 2 diatas adalah benar Ayah dan Ibu dari nama tersebut ini :</td>
                </tr>
                <tr> <td colspan="5" height="10"></td> </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"><?php echo count($this->option->get_parent_kk($get->no_kk)) + 1 ?>. </td>
                    <td width="130">Nama</td>
                    <td width="30" class="text-center">:</td>
                    <td><?php echo $get->nama_lengkap; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->tmp_lahir.", ".date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Jenis Kelamin</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->jns_kelamin); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Kewarganegaraan</td>
                    <td class="text-center">:</td>
                    <td><?php echo strtoupper($get->kewarganegaraan); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Agama</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->agama); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->pekerjaan; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.", ".$get->nama_desa.", ".$this->option->get('kecamatan').", ".$this->option->get('kabupaten'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="20" class="text-center"></td>
                    <td>Nomor KTP</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->nik; ?></td>
                </tr>
                <tr> <td colspan="5" height="10"></td> </tr>
                <tr>
                    <td width="130"></td>
                    <td colspan="4">Selanjutnya diterangkan bahwa nama tersebut pada butir 1 dan 2 diatas tidak ada terdaftar G.30S/PKI ataupun Gerakan-gerakan Ekstrim lainnya yang bertentangan dengan PANCASILA.</td>
                </tr>
                <tr> <td colspan="5" height="10"></td> </tr>
                <tr>
                    <td width="130"></td>
                    <td colspan="4">Demikian Surat Keterangan Bersih Lingkungan Keluarga ini Kami buat dengan sebenarnya untuk melengkapi pemberkasan penerimaan <strong><?php echo strtoupper($isi->keperluan); ?></strong>.</td>
                </tr>
            </table>
        </div>
        <div class="mail-footer">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 40%;">
                        Berdasarkan Surat Keterangan <?php echo $kepala ?> <?php echo $desa ?>
                        <br>
                        Nomor : <?php echo $isi->no_surat_ket; ?><br>
                        Tanggal : <?php echo date_id($isi->tgl_surat_ket); ?>
                    </td>
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

/* End of file keterangan-bersih-lingkungan.php.php */
/* Location: ./application/views/surat-keluar/print/keterangan-bersih-lingkungan.php.php */