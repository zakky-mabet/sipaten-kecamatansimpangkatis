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
    <div class="content">
        <div class="mail-heading">
            <h5 class="mail-name upper"><?php echo $get->judul_surat; ?> </h5> <br>
            <h5 class="mail-number">Nomor : <?php echo $get->kode_surat.'/<b>'.$get->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?></h5>
        </div>
        <div class="mail-content">
            <p>Yang bertanda tangan di bawah ini :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="130">NAMA</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->pejabat_lurah; ?></strong></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->nip_pejabat_lurah; ?></strong></td>
                </tr>
                <tr>
                    <td>JABATAN</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $isi->jabatan_pejabat_lurah; ?></strong></td>
                </tr>
            </table>
            <p>Menerangkan dengan sesungguhnya bahwa :</p>
            <table style="margin-left:40px; margin-top: 10px; margin-bottom:20px;">
                <tr>
                    <td width="130">Nama</td>
                    <td class="text-center">:</td>
                    <td><strong><?php echo $get->nama_lengkap; ?></strong></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->tmp_lahir).', '.date_id($get->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->agama); ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo ucfirst($get->pekerjaan); ?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>Alamat</td>
                    <td class="text-center">:</td>
                    <td><?php echo $get->alamat.' RT.'.$get->rt.' RW.'.$get->rw.' '.$kepala.' '.$desa.' Kec. '.$this->option->get('kecamatan').' Kab. '.$this->option->get('kabupaten'); ?></td>
                </tr>
            </table>
            <p>Nama tersebut diatas memang benar mempunyai usaha <strong><?php echo $isi->nama_usaha; ?></strong> yang beralamat di <?php echo $isi->alamat_usaha; ?>.</p>
            <p>Demikiaan, Surat Keterangan Usaha ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.</p>
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

/* End of file keterangan-usaha.php */
/* Location: ./application/views/surat-keluar/print/keterangan-usaha.php */