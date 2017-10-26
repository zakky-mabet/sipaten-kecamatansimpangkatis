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
        <td>Nama Perusahaan</td>
        <td class="center">:</td>
        <td><?php echo $isi->nama_perusahaan ?></td>
    </tr>
    <tr>
        <td>Bentuk Perusahaan</td>
        <td class="center">:</td>
        <td><?php echo $isi->npwp ?></td>
    </tr>
    <tr>
        <td>Kegiatan Usaha</td>
        <td class="center">:</td>
        <td><?php echo $isi->kegiatan_usaha ?></td>
    </tr>
    <tr>
        <td>Sarana Usaha</td>
        <td class="center">:</td>
        <td><?php echo $isi->sarana_usaha ?></td>
    </tr>
    <tr>
        <td>Alamat Perusahaan</td>
        <td class="center">:</td>
        <td><?php echo $isi->alamat_perusahaan ?></td>
    </tr>
    <tr>
        <td>JUMLAH MODAL USAHA</td>
        <td class="text-center">:</td>
        <td>Rp. <?php echo number_format($isi->jml_modal_usaha) ?>,-</td>
    </tr>
    <tr>
        <td>NOMOR PENDAFTARAN</td>
        <td class="text-center">:</td>
        <td><?php echo $isi->no_pendaftaran; ?></td>
    </tr>
</table>