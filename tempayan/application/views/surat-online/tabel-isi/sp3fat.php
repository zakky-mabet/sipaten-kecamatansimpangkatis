<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Surat Kuasa dari Lurah / Desa</td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->desa; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="150"><strong>Nomor Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_surat_kuasa; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal Surat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id($get->isi->tgl_surat_kuasa); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tanggal Diketahui</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @date_id($get->isi->tgl_diketahui); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Tanah </td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Letak Tanah</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->letak_tanah; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Luas Tanah</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->luas_tanah; ?> M<sup>3</sup>  </td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Batas Tanah</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <td width="50"><strong>Utara</strong></td>
                        <td width="30" class="text-center">:</td>
                        <td><?php echo @$get->isi->bts_utara->ket.'&nbsp;'.@$get->isi->bts_utara->nama.' M<sup>3</sup'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Timur</strong></td>
                        <td width="30" class="text-center">:</td>
                        <td><?php echo @$get->isi->bts_utara->ket.'&nbsp;'.@$get->isi->bts_utara->nama.' M<sup>3</sup'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Selatan</strong></td>
                        <td width="30" class="text-center">:</td>
                        <td><?php echo @$get->isi->bts_utara->ket.'&nbsp;'.@$get->isi->bts_utara->nama.' M<sup>3</sup'; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Barat</strong></td>
                        <td width="30" class="text-center">:</td>
                        <td><?php echo @$get->isi->bts_utara->ket.'&nbsp;'.@$get->isi->bts_utara->nama.' M<sup>3</sup'; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="vertical-align: top">
            <td><strong>Tahun Kuasa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->tahun_kuasa; ?></td>
        </tr>
    </tbody>
</table>