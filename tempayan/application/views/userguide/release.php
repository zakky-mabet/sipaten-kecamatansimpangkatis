<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('userguide/parent-navigation', $this->data);

?>
   <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body box-userguide release">
            	<h4>Keterangan Rilis</h4>
                <ul id="release-list"></ul>
            </div>
        </div>
    </div>
</div>
<style>
    div.release ul#release-list > li > span {
        font-weight: bold;
        font-size: 20px;
        color: orange;
    }
    div.release ul#release-list > li {
        margin-bottom: 30px;
    }
    div.release div.body-release {
        font-size: 17px;
    }
    div.time-release {
        font-size: 13px;
        font-style: italic;
        margin-bottom: 10px;
    }

    div.body-release p, div.body-release a {
        font-size: 15px;
    }
</style>
<?php
/* End of file release.php */
/* Location: ./application/views/userguide/release.php */