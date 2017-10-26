<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Kelurahan / Desa </td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Izin Keterangan Mendirikan Bangunan</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nama Perusahaan/Perseroan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->nama_perusahaan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->alamat_perusahaan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Jenis Bangunan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->jenis_bangunan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Lokasi Bangunan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->lokasi_bangunan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Luas Bangunan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td>
            <?php 
            foreach(@$get->isi->luas_bangunan as $key => $value) 
                echo "Lantai ".++$key." : ".$value[0]." x ".$value[1]." x ".$value[2]." M<sup>3</sup> <br>"; 
            ?>
            </td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>GSB <br>(<small>Garis Sempadan Bangunan</small>) </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->gsb) ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Bagi mereka yang tempat usahanya bukan milik sendiri</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nama Pemilik Tanah</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->nama_pemilik_tanah) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Alamat Pemilik Tanah </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->alamat_pemilik_tanah) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Jangka Waktu </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->jangka_tahun." Tahun<br>".@date_id(@$get->isi->jangka_mulai)." S.d ".@date_id(@$get->isi->jangka_akhir) ?></td>
        </tr>
    </tbody>
</table>