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
<h6 class="letter-isian-icon">Isian Surat</h6>
<table>
    <tr>
        <td width="80">Nama</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->nama; ?></td>
    </tr>
    <tr>
        <td>Umur</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->umur; ?> Tahun</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->alamat; ?></td>
    </tr>
    <tr>
        <td>Tanggal Kematian </td>
        <td class="text-center">:</td>
        <td><?php echo  $isi->hari_mati; ?>, <?php echo date_id($isi->tgl_mati); ?></td>
    </tr>
    <tr>
        <td>Tempat/Kematian</td>
        <td class="text-center">:</td>
        <td><?php echo strtoupper($isi->tmp_mati); ?></td>
    </tr>
</table>