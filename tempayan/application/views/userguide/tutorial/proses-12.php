<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Saya merasa Kata Sandi saya tidak aman lagi, dimana saya menggantinya?</h4>
                <p>Untuk mengganti Password atau kata sandi, ikuti beberapa langkah berikut  :</p>
                <ol class="list-angka">
                    <li><p>Pilih ikon <strong class="text-orange"><i class="glyphicon glyphicon-user"></i></strong> yang terletak pada navigasi bar pada bagian kanan atas aplikasi.</p>
                    <img src="<?php echo base_url("public/image/userguide/navigasi-bar.png") ?>" alt="" class="img-responsive">
                    </li>
                    <li><p>Kemudian isikan password baru anda kemudian masukkan juga password lama anda untuk memastikan keamanan.</p>
                    <img src="<?php echo base_url("public/image/userguide/ganti-password.png") ?>" alt="" class="img-responsive">
                    </li>
                    <li>
                        <p>Setelah selesai, Klik tombol simpan kemudian Log Off atau keluar dari aplikasi dengan mengklik ikon <strong class="text-orange"><i class="fa fa-power-off"></i></strong> yang terletak pada navigasi bar pada bagian kanan atas aplikasi, setelah itu login kembali dengan password yang baru.</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-12.php */
/* Location: ./application/views/userguide/proses-12.php */