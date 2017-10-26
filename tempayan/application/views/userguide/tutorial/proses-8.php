<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Saya ingin melihat rekam jejak sebuah surat?</h4>
				<p>Untuk melihat rekam jejak suatu pelayanan surat, anda dapat melihatnya dengan mengikuti beberapa langkah berikut :</p>
                <ol class="list-angka">
                    <li><p>Pilih menu <strong class="text-orange"><i class="fa fa-line-chart"></i> Analisa pelayanan</strong> yang terletak pada navigasi utama pada bagian kiri aplikasi.</p>
                    </li>
                    <li>
                        <p>Kemudian masukkan nomor surat yang anda butuhkan sebagai analisa. (<small>Lihat gambar dibawah ini</small>)</p>
                        <img src="<?php echo base_url("public/image/userguide/cari-ana.png") ?>" alt="" class="img-responsive">
                    </li>
                    <li>
                        <p>Kemudian anda akan mendapati beberapa informasi terkait surat yang anda cari.</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-8.php */
/* Location: ./application/views/userguide/proses-8.php */