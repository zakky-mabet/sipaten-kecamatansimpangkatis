<h6 class="letter-pemohon-icon">Pemohon</h6>
<table>
    <tr>
        <td>NIk</td>
        <td class="center">:</td>
        <td><?php echo $get->nik ?></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td class="center">:</td>
        <td><?php echo $get->nama_lengkap ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td class="center">:</td>
        <td><?php echo $get->tmp_lahir ?>, <?php echo date_id($get->tgl_lahir) ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td class="center">:</td>
        <td><?php echo strtoupper($get->jns_kelamin) ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td class="center">:</td>
        <td><?php echo $get->alamat ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td class="center">:</td>
        <td><?php echo $get->pekerjaan ?></td>
    </tr>
</table>
<h6 class="letter-isian-icon">Isian Surat</h6>
<table>
    <tr>
        <td>Nama Perusahaan</td>
        <td class="center">:</td>
        <td><?php echo $isi->nama_perusahaan ?></td>
    </tr>
                <tr>
                    <td>Kedudukan dalam Perusahaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->kedudukan; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Bentuk Perusahaan</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->bentuk_perusahaan; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Bidang Usaha</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->bidang_usaha; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Kegiatan Usaha</td>
                    <td class="text-center">:</td>
                    <td><?php echo $isi->kegiatan_usaha; ?></td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Jenis Barang Dagangan Utama</td>
                    <td class="text-center">:</td>
                    <td>
                        - <?php echo $isi->jenis_barang_dagang->a; ?> <br>
                        - <?php echo $isi->jenis_barang_dagang->b; ?> <br>
                        - <?php echo $isi->jenis_barang_dagang->c; ?>
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Modal Usaha</td>
                    <td class="text-center">:</td>
                    <td>Rp. <?php echo number_format($isi->modal_usaha); ?>,-</td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Jumlah Tenaga Kerja yang dibayar</td>
                    <td class="text-center">:</td>
                    <td>
                        Laki-laki : <?php echo ($isi->jumlah_pekerja_laki) ? $isi->jumlah_pekerja_laki : '..............'; ?> Orang <br>
                        Wanita &nbsp; : <?php echo ($isi->jumlah_pekerja_wanita) ? $isi->jumlah_pekerja_wanita : '..............'; ?> Orang
                    </td>
                </tr>
            </table>
</table>