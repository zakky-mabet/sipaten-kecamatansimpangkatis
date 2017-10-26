<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Saya ingin mencetak Surat yang keluar pada hari ini?</h4>
                <p>Untuk mencetak surat keluar pada hari yang ditentukan, terlebih dahulu untuk menyaring data surat keluar tersebut. Ikuti beberapa langkah berikut :</p>
                <ol class="list-angka">
                    <li><p>Pilih menu <strong class="text-orange"><i class="glyphicon glyphicon-envelope"></i> Data Surat Keluar</strong> yang terletak pada navigasi utama pada bagian kiri aplikasi.</p>
                    <img src="<?php echo base_url("public/image/userguide/filter-surat.png") ?>" alt="filter surat" class="img-responsive">
                    </li>
                    <li>
                        <p>Kemudian saring data tersebut dengan menggunakan form tanggal, kemmudian klik <strong class="text-orange"><i class="fa fa-filter"></i> Filter</strong>.</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-p10.php */
/* Location: ./application/views/userguide/proses-p10.php */