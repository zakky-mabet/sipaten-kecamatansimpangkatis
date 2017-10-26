<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Keterangan dari Lurah / Kades </td>
        </tr>
        <tr style="vertical-align: top">
            <td width="180"><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="180"><strong>Nomor Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_surat_ket; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="180"><strong>Tanggal</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo date_id(@$get->isi->tgl_surat_ket) ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Identitas Penduduk</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Nama Lengkap </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->nama_lengkap); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Tempat, Tanggal Lahir </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->tmp_lahir).", ".date_id(@$get->isi->tgl_lahir); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Jenis Kelamin </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->jns_kelamin); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Kewarganegaraan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->kewarganegaraan); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Pekerjaan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->pekerjaan); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Alamat </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->alamat); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Keperluan</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="130"><strong>Keperluan </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo strtoupper(@$get->isi->keperluan); ?></td>
        </tr>
    </tbody>
</table>