<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>PENGANTAR</h4>
                <p class="indent">Puji dan syukur kita panjatkan ke kepada Tuhan Yang Maha Esa, akhirnya "Panduan Penggunaan Sistem Informasi Tempayan" dapat diselesaikan.</p>
                <p class="indent">Dengan diterbitkannya Undang-undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik dan Undang-undang Nomor 25 Tahun 2009 tentang Pelayanan Publik, maka Kecamatan <?php echo $this->option->get('kecamatan') ?> sebagai salah satu OPD yang menyelenggarakan Pelayanan Publik akan melaksanakan amanah tersebut dalam bentuk pengaplikasikan Sistem Informasi Tempayan.</p> 
                <p class="indent">Sistem Informasi Tempayan ini dirancang untuk memenuhi kebutuhan terhadap proses Pelayanan Publik, demi meningkatkan efektivitas dan efisiensi pelayanan publik.</p>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file index.php */
/* Location: ./application/views/userguide/index.php */