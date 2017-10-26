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
        <td>Alamat</td>
        <td class="center">:</td>
        <td><?php echo $isi->alamat_perusahaan ?></td>
    </tr>
    <tr>
        <td>Jenis Bangunan</td>
        <td class="center">:</td>
        <td><?php echo $isi->jenis_bangunan ?></td>
    </tr>
    <tr>
        <td>Lokasi Bangunan</td>
        <td class="center">:</td>
        <td><?php echo $isi->lokasi_bangunan ?></td>
    </tr>
    <tr>
        <td>Luas Bangunan</td>
        <td class="center">:</td>
        <td>
                        Lt. 1 : <?php echo $isi->luas_bangunan[0][0].' M x '.$isi->luas_bangunan[0][1]. ' M = '.$isi->luas_bangunan[0][2]; ?> M<sup>2</sup><br>
                        Lt. 2 : <?php echo ($isi->luas_bangunan[1][0] != '') ? $isi->luas_bangunan[1][0].' M x '.$isi->luas_bangunan[1][1]. ' M = '.$isi->luas_bangunan[1][2].' M<sup>2</sup>' : '-'; ?><br>
                        Lt. 3 : <?php echo ($isi->luas_bangunan[2][0] != '') ? $isi->luas_bangunan[2][0].' M x '.$isi->luas_bangunan[2][1]. ' M = '.$isi->luas_bangunan[2][2].' M<sup>2</sup>' : '-'; ?>
        </td>
    </tr>
    <tr>
        <td>GSB <small>(Garis Sempadan Bangunan)</small></td>
        <td class="center">:</td>
        <td><?php echo $isi->gsb ?></td>
    </tr>
    <tr>
        <td>Nama Pemilik Tanah</td>
        <td class="center">:</td>
        <td><?php echo $isi->nama_pemilik_tanah ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td class="center">:</td>
        <td><?php echo $isi->alamat_pemilik ?></td>
    </tr>
    <tr>
        <td>Jangka Waktu</td>
        <td class="center">:</td>
        <td>
        <?php echo ($isi->jangka_tahun != '') ? $isi->jangka_tahun : '..........' ?> Tahun, dari tanggal <?php echo ($isi->jangka_mulai != '') ? date_id($isi->jangka_mulai) : '.....................' ?> s/d <?php echo ($isi->jangka_akhir != '') ? date_id($isi->jangka_akhir) : '.....................' ?>
        </td>
    </tr>
</table>