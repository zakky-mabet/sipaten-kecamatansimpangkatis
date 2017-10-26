<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Rekomendasi Kades / Lurah</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="150"><strong>Nomor Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_surat_rek; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id($get->isi->tgl_surat_rek); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Ditandatangani Oleh</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->ttd_desa; ?> - <?php echo @$get->isi->jabatan_desa; ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Melakukan kegiatan Gangguan</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nama Toko / Kios / Perusahaan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->nama; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->alamat; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Jenis Kegiatan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->jenis_kegiatan; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Jenis Bangunan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->jenis_bangunan; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Lokasi Bangunan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->lokasi_bangunan; ?></td>
        </tr>
    </tbody>
</table>