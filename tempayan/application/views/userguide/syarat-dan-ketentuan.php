<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Syarat dan Ketentuan </h4>
				<h5>A. Ketentuan Umum</h5>
				<ol class="list-angka">
					<li>Tempayan adalah Aplikasi yang dibuat dengan tujuan mempermudah proses Manajemen Surat serta Pelayanan Publik pada Kecamatan <?php echo $this->option->get('kecamatan') ?>.</li>
					<li>Aplikasi Tempayan adalaha aplikasi berbasis Web yang dikembangkan dalam Bahasa Pemrograman PHP. </li>
				</ol>
				<h5>B. Penggunaan dan Administrator</h5>
				<ol class="list-angka">
					<li>Administrator Hak sepenuhnya terhadap fitur yang ada pada aplikasi Tempayan.</li>
					<li>Administrator bertanggung jawab atas pemeliharaan, privasi data yang terkandung pada aplikasi Tempayan</li>
					<li>Pengguna diharuskan melakukan tugas yang diberikan oleh Administrator.</li>
					<li>Petugas pelayanan diwajibkan memberikan pengarahan kepada penduduk untuk memberikan penilaian pada Mesin Penilaian.</li>
				</ol>
				<h5>C. Tanggung Jawab dan Akibat</h5>
				<h5>D. Hak Cipta</h5>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file ketentuan-umum.php */
/* Location: ./application/views/userguide/ketentuan-umum.php */