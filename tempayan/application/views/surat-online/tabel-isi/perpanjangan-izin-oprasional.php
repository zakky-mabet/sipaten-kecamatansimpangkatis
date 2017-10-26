<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Rekomendasi dari pengelola</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>Nomor Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_surat_rek; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo date_id(@$get->isi->tanggal_surat); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Lembaga </td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>Nama Lembaga</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->nama_lembaga; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nama Pengelola</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->nama_pengelola; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->alamat_lembaga; ?></td>
        </tr>
    </tbody>
</table>