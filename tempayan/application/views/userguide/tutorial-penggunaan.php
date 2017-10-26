<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Tutorial Penggunaan</h4>
				<p>Terkait Proses Sistem Tempayan Bekerja :</p>
				<ul class="list-userguide">
					<li><a href="<?php echo site_url('userguide/tutorial/proses-1.php') ?>">Bagaimana Membuat Surat Non Perizinan?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-2.php') ?>">Bagaimana Membuat Surat Perizinan?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-3.php') ?>">Bagaimana Saya memverifikasi sebuah Surat yang diajukan oleh Staff Pelayanan?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-4.php') ?>">Dimana Saya melihat surat yang pernah Saya ajukan atau periksa?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-5.php') ?>">Surat yang Saya ajukan terdapat kesalahan data, apa yang harus saya lakukan?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-6.php') ?>">Saya tidak mendapatkan pemberitahuan dari Petugas verifikasi?</a></li>
				</ul>
				<p>Umpan-balik terhadap Pelayanan :</p>
				<ul class="list-userguide">
					<li><a href="<?php echo site_url('userguide/tutorial/proses-7.php') ?>">Seberapa baikkah pelayan hari ini?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-8.php') ?>">Saya ingin melihat rekam jejak sebuah surat?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-9.php') ?>">Surat apa yang paling sering diajukan oleh masyarakat?</a></li>
				</ul>
				<p>Laporan dan Hasil Data :</p>
				<ul class="list-userguide">
					<li><a href="<?php echo site_url('userguide/tutorial/proses-10.php') ?>">Saya ingin mencetak Surat yang keluar pada hari ini?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-11.php') ?>">Format laporan Surat Keluar yang inginkan tidak sesuai, bagaiman Saya merubahnya?</a></li>
				</ul>
				<p>Privasi, KIOSK (<i>Mesin Penilaian</i>) dan Pengaturan :</p>
				<ul class="list-userguide">
					<li><a href="<?php echo site_url('userguide/tutorial/proses-12.php') ?>">Saya merasa Kata Sandi saya tidak aman lagi, dimana saya menggantinya?</a></li>
					<li><a href="<?php echo site_url('userguide/tutorial/proses-13.php') ?>">Saya ingin menjadikan salah satu petugas pelayanan menjadi petugas pemeriksa  <br><span style="padding-left: 40px; font-size: 15px;">atau memblokir salah satu fitur kepada kepada petugas pelayanan.</span></a></li>
				</ul>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file tutoria-penggunaan.php */
/* Location: ./application/views/userguide/tutoria-penggunaan.php */