<?php  

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
<h6 class="letter-pemohon-icon">Pemohon</h6>
<table>
    <tr>
        <td>NIk</td>
        <td class="center">:</td>
        <td><?php echo $get->nik ?></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td class="center">:</td>
        <td><?php echo $get->nama_lengkap ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td class="center">:</td>
        <td><?php echo $get->tmp_lahir ?>, <?php echo date_id($get->tgl_lahir) ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td class="center">:</td>
        <td><?php echo strtoupper($get->jns_kelamin) ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td class="center">:</td>
        <td><?php echo $get->alamat ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td class="center">:</td>
        <td><?php echo $get->pekerjaan ?></td>
    </tr>
</table>
<h6 class="letter-pengantar-icon">Surat Pengantar Dari Lurah / Desa</h6>
<table>
    <tr>
        <td colspan="3" class="center"> Surat Pernyataan Pengakuan Fisik Atas Tanah</td>
    </tr>
    <tr>
        <td>Nomor Surat Kuasa</td>
        <td class="center">:</td>
        <td><?php echo $isi->tgl_surat_kuasa; ?></td>
    </tr>
    <tr>
        <td>Tanggal diketahui</td>
        <td class="center">:</td>
        <td><?php echo date_id($isi->tgl_diketahui); ?></td>
    </tr>
</table>
<h6 class="letter-isian-icon">Isian Surat</h6>
<table>
    <tr>
        <td width="150">Letak Tanah</td>
        <td class="center">:</td>
        <td><?php echo $isi->letak_tanah ?></td>
    </tr>
    <tr>
        <td>Luas Tanah</td>
        <td class="center">:</td>
        <td><strong>&plusmn;</strong> <?php echo $isi->luas_tanah ?> M<sup>2</sup> <br><small><i> (Kurang Lebih <?php echo terbilang($isi->luas_tanah, 'ucfirst'); ?> Meter Persegi)</i></small></td>
    </tr>
    <tr>
        <td>Sebelah Utara berbatasan dengan </td>
        <td class="text-center">:</td>
        <td><?php echo $isi->bts_utara->ket.' '.$isi->bts_utara->nama; ?> M<sup>3</sup></td>
    </tr>
    <tr>
        <td>Sebelah Timur berbatasan dengan </td>
        <td class="text-center">:</td>
        <td><?php echo $isi->bts_timur->ket.' '.$isi->bts_timur->nama; ?> M<sup>3</sup></td>
    </tr>
    <tr>
        <td>Sebelah Selatan berbatasan dengan </td>
        <td class="text-center">:</td>
        <td><?php echo $isi->bts_selatan->ket.' '.$isi->bts_selatan->nama; ?> M<sup>3</sup></td>
    </tr>
    <tr>
        <td>Sebelah Barat berbatasan dengan </td>
        <td class="text-center">:</td>
        <td><?php echo $isi->bts_barat->ket.' '.$isi->bts_barat->nama; ?> M<sup>3</sup></td>
    </tr>
    <tr>
        <td>Tahun Kuasa</td>
        <td class="center">:</td>
        <td><?php echo $isi->tahun_kuasa; ?></td>
    </tr>
</table>