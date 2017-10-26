<table class="table table-bordered">
    <tbody>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Keterangan Tinggal Sementara</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>No. Tanda Masuk</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->no_tanda_masuk; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>Tanggal Tanda Masuk</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo date_id(@$get->isi->tgl_tanda_masuk); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="200"><strong>Alasan Pindah</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @$get->isi->alasan_pindah; ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Desa</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo ucfirst(@$get->isi->desa) ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Kecamatan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->kecamatan ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Kabupaten / Kota </strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->kabupaten ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Provinsi</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->provinsi ); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Penanggung Jawab</td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Nama Lengkap</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->nama ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Alamat</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->alamat ); ?></td>
        </tr>
        <tr style="vertical-align: top">
            <td width="100"><strong>Pekerjaan</strong></td>
            <td class="text-center" style="width: 30px;">:</td>
            <td><?php echo @ucfirst( $get->isi->pekerjaan ); ?></td>
        </tr>
        <tr style="vertical-align: top" class="bg-warning">
            <td colspan="3" class="text-center">Anggota Keluarga Pengikut</td>
        </tr>
        <tr style="vertical-align: top">
            <td colspan="3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat, Tanggal Lahir</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
            /* Loop data penduduk */
            if(@$get->isi->pengikut) :
                foreach($get->isi->pengikut as $key => $value) :
                $ikut = $this->db->get_where('penduduk', array('ID' => $value->id))->row();
            ?>
                <tr>
                    <td class="text-center"><?php echo $ikut->nik; ?>.</td>
                    <td><?php echo $ikut->nama_lengkap; ?></td>
                    <td><?php echo ucfirst($ikut->tmp_lahir).', '.date_id($ikut->tgl_lahir) ?></td>
                    <td class="text-center"><?php echo strtoupper($value->status_hubungan) ?></td>
                </tr>
            <?php 
                endforeach; 
            endif;
            ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>