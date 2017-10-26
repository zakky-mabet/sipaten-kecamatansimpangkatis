<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Identitas Usaha</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="150"><strong>Nama Usaha</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->nama_perusahaan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Bentuk Usaha</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->bentuk_perusahaan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>NPWP </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->npwp) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Kegiatan Usaha</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->kegiatan_usaha) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Sarana</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->sarana_usaha) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Alamat </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->alamat_perusahaan) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Jumlah Modal</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td>Rp. <?php echo number_format(@$get->isi->jml_modal_usaha) ?>.00 -</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nomor Pendaftaran </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->no_pendaftaran) ?></td>
        </tr>
    </tbody>
</table>