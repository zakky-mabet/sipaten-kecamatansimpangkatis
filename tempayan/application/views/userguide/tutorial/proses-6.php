<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Saya tidak mendapatkan pemberitahuan dari Petugas verifikasi?</h4>
				<p>Dalam hal ini terdapat 2 hal kemungkinan  yang terjadi :</p>
                <ol class="list-angka">
                    <li><p>Akses Notifikasi Browser anda belum diaktifkan.</p></li>
                    <li><p>Petugas terkait belum memferifikasi atau memberikan umpan balik terhadap pengajuan anda.</p></li>
                </ol>
                <p>Untuk menangani notifikasi browser yang belum diaktifkan, silahkan ikuti beberapa langka berikut : </p>
                <ol class="list-angka">
                    <li><p>Klik icon <strong><i class="fa fa-info-circle"></i></strong> pada bagian address bar browser anda.</p>
                    <img src="<?php echo base_url("public/image/userguide/not.png") ?>" alt="filter surat" class="img-responsive">
                    </li>
                    <li><p>Kemudian pilih <strong>Izinkan</strong>.</p></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-6.php */
/* Location: ./application/views/userguide/proses-6.php */