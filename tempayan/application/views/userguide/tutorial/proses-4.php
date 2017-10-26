<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide">
            	<h4>Dimana Saya melihat surat yang pernah Saya ajukan atau periksa?</h4>
				<p>Anda dapat melihat pada halaman <strong class="text-orange"><i class="glyphicon glyphicon-envelope"></i> Data Surat Keluar</strong> kemudian filter data surat keluar tersebut berdasarkan form user, kemudian <strong>Klik</strong> tombol <strong class="text-orange"><i class="fa fa-filter"></i> Filter</strong>. </p>
                <img src="<?php echo base_url("public/image/userguide/filter-surat.png") ?>" alt="filter surat" class="img-responsive">
            </div>
            <div class="box-footer with-border">

            </div>
        </div>
    </div>
</div>

<?php
/* End of file proses-4.php */
/* Location: ./application/views/userguide/proses-4.php */