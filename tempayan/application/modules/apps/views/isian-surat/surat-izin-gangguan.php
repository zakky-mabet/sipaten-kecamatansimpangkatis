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
        <td width="190">Nama Toko/Kios/Perusahaan</td>
        <td class="text-center">:</td>
        <td><strong><?php echo strtoupper($get->nama); ?></strong></td>
    </tr>
    <tr>
        <td>Alamat Tempat Usaha</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->alamat; ?></td>
    </tr>
    <tr>
        <td>Jenis Kegiatan</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->jenis_kegiatan; ?></td>
    </tr>
    <tr>
        <td>Jenis Bangunan</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->jenis_bangunan; ?></td>
    </tr>
    <tr>
        <td>Lokasi Bangunan</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->lokasi_bangunan; ?></td>
    </tr>
</table>