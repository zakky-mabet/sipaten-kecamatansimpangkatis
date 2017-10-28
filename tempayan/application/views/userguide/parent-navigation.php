 <div class="row">
    <div class="col-md-3">
        <div class="box box-solid no-print" id="sticker">
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?php echo active_link_method('index','userguide'); ?>">
                        <a href="<?php echo site_url('userguide') ?>" style="padding-left: 30px;"> Pengantar </a>
                    </li>
                    <li class="<?php echo active_link_uri('pengenalan-aplikasi'); ?>">
                        <a href="<?php echo site_url('userguide/read/pengenalan-aplikasi') ?>"><i class="fa fa-caret-right"></i> Pengenalan Aplikasi</a>
                    </li>
                    <li class="<?php echo active_link_uri('syarat-dan-ketentuan') ?>">
                        <a href="<?php echo site_url('userguide/read/syarat-dan-ketentuan') ?>"> <i class="fa fa-caret-right"></i> Syarat dan Ketentuan</a>
                    </li>
                    <li class="<?php echo active_link_uri('tutorial-penggunaan').active_link_method('tutorial'); ?>">
                        <a href="<?php echo site_url('userguide/read/tutorial-penggunaan') ?>"> <i class="fa fa-caret-right"></i> Tutorial Penggunaan</a>
                    </li>
<!--                     <li class="<?php echo active_link_method('release'); ?>">
    <a href="<?php echo site_url('userguide/release') ?>"> <i class="fa fa-caret-right"></i>Keterangan Rilis dan Perubahan</a>
</li> -->
                </ul>
            </div>
        </div>
    </div>
