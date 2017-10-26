<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Keterangan Domisili perusahaan dari Desa / Kelurahan </td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>No. Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_surat_rek ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Tanggal Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id( $get->isi->tgl_surat_rek ); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Domisili Perusahaan</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Nama Perusahaan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->nama_perusahaan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->alamat_perusahaan ); ?></td>
        </tr>
    </tbody>
</table>