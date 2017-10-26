<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Saya ingin menjadikan salah satu petugas pelayanan menjadi petugas pemeriksa</h4>
                <p>Untuk menjadikan salah satu petugas pelayanan menjadi petugas pemeriksa, ikuti beberapa langkah berikut  :</p>
                <ol class="list-angka">
                    <li><p>Pilih menu <strong class="text-orange"><i class="fa fa-wrench"></i> Pengaturan</strong> yang terletak pada navigasi utama pada bagian kiri aplikasi.</p>
                    </li>
                    <li>
                        <p>Kemudian klik sub menu <strong class="text-orange"><i class="fa fa-angle-double-right"></i> Pengguna Sistem</strong>.</p>
                    </li>
                    <li>
                        <p>
                        kemudian pilih salah satu petugas pelayan, lalu klik tombol <strong class="text-blue"><i class="fa fa-pencil"></i></strong> pada kolom aksi.
                        </p>
                    </li>
                    <li>
                        <p>
                            Ubah Level akses petugas menjadi verifikator. (<small>Lihat gambar dibawah</small>)
                            <img src="<?php echo base_url("public/image/userguide/list-akses.png") ?>" alt="filter surat" class="img-responsive">
                        </p>
                    </li>
                    <li>
                        <p>
                            Untuk mengubah status petugas menjadi non aktif atau terblokir, pilih form status. (<small>Lihat gambar dibawah</small>)
                            <img src="<?php echo base_url("public/image/userguide/form-status.png") ?>" alt="filter surat" class="img-responsive">
                        </p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-13.php */
/* Location: ./application/views/userguide/proses-13.php */