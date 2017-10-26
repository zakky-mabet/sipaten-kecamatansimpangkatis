<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Keterangan Waris dari Kades / Lurah</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>Nama Pejabat Lurah / Kades</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->pejabat_lurah; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>NIP</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->nip_pejabat_lurah; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Pangkat / Golongan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->perangkat_desa; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Jabatan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->jabatan_pejabat_lurah; ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Pernyataan Para Ahli Waris</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id( $get->isi->tgl_surat_waris ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Diketahui Oleh</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->diketahui_oleh ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Pada Tanggal</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id( $get->isi->tgl_diketahui ); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Akta Kematian</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nomor Akta</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_akta_kematian ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Ditandatangani Oleh</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->akta_ttd ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id( $get->isi->tgl_akta ); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Kematian</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Nama</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->nama) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Umur</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->umur." Tahun"; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->alamat ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal Kematian</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->hari_mati.', '.@date_id( $get->isi->tgl_mati ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Meninggal Di / Tempat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->tmp_mati ); ?></td>
        </tr>
    </tbody>
</table>