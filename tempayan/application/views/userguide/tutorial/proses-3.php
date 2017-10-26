<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Bagaimana Saya memverifikasi sebuah Surat yang diajukan oleh Staff Pelayanan?</h4>
				<p>Untuk memverifikasi sebuah Surat yang diajukan oleh Staff Pelayanan langkah-langkah yang perlu dilakukan adalah :</p>
				<ol class="list-angka">
					<li><p>Pilih menu <strong class="text-orange"><i class="glyphicon glyphicon-envelope"></i> Data Surat Keluar</strong> yang terletak pada navigasi utama pada bagian kiri aplikasi.</p>
                    </li>
                    <li>
                        <p>Kemudian muncul sebuah tabel data surat keluar yang diajukan oleh seluruh staff pelayanan, anda dapat menyaring data tersebut dengan beberapa form yang telah disediakan diatas tabel kemmudian klik <strong class="text-orange"><i class="fa fa-filter"></i> Filter</strong>, data yang ditampilkan pada saat mencetak dan mengunduh sama persis dengan apa yang ditampilkan pada tabel tersebut.</p>
                        <img src="<?php echo base_url("public/image/userguide/filter-surat.png") ?>" alt="filter surat" class="img-responsive">
                    </li>
                    <li>
                        <p>Kemudian Klik tombol <strong class="text-green"><i class="fa fa-check"></i></strong> pada kolom aksi untuk memferifikasi surat dan tombol <strong class="text-red"><i class="fa fa-times"></i></strong> untuk menolak pengajuan surat.</p>
                        <center>
                            <img src="<?php echo base_url("public/image/userguide/tombol-aksi-surat.png") ?>" alt="filter surat" class="img-responsive">
                        </center>
                    </li>
                    <li><p>Selesai! data surat siap dicetak dan ditandatangani.</p></li>
				</ol>
            </div>
            <div class="box-footer with-border">

            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-3.php */
/* Location: ./application/views/userguide/proses-3.php */