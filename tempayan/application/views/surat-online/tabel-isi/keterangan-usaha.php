<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Keterangan  Usaha dari Kades / Lurah</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Usaha</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Nama Usaha</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->nama_usaha) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->alamat_usaha ); ?></td>
        </tr>
    </tbody>
</table>