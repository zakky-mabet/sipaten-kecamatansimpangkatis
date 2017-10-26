                   <h6 class="letter-pengantar-icon">Surat Pengantar Dari Lurah / Desa</h6>
                   <table>
                       <tr>
                           <td>Nomor Surat</td>
                           <td class="center">:</td>
                           <td><?php echo $isi->no_surat_rek; ?></td>
                       </tr>
                       <tr>
                           <td>Tanggal</td>
                           <td class="center">:</td>
                           <td><?php echo date_id($isi->tanggal); ?></td>
                       </tr>
                       <tr>
                           <td>Desa / Kelurahan</td>
                           <td class="center">:</td>
                           <td><?php echo $this->db->get_where('desa', array('id_desa' => $isi->desa))->row('nama_desa') ?></td>
                       </tr>
                   </table>
                   <h6 class="letter-isian-icon">Isian Surat</h6>
                   <table>
                       <tr>
                           <td>Keperluan</td>
                           <td class="center">:</td>
                           <td><?php echo $isi->keperluan ?></td>
                       </tr>
                   </table>