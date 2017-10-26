        <div class="box box-solid no-print" id="sticker">
            <div class="box-header with-border">
              	<h3 class="box-title">Statistik Kependudukan</h3>
            </div>
            <div class="box-body no-padding">
              	<ul class="nav nav-pills nav-stacked">
                	<li class="<?php echo active_link_method('index', 'stats_people'); ?>">
                        <a href="<?php echo site_url('stats_people') ?>">Populasi Penduduk Desa </a>
                    </li>
                	<li class="<?php echo active_link_method('gender', 'stats_people'); ?>">
                        <a href="<?php echo site_url('stats_people/gender') ?>">Jenis Kelamin</a>
                    </li>
                	<li class="<?php echo active_link_method('status_kawin', 'stats_people'); ?>">
                        <a href="<?php echo site_url('stats_people/status_kawin') ?>"> Status Perkawinan</a> 
                    </li>
                	<li class="<?php echo active_link_method('religion', 'stats_people'); ?>">
                        <a href="<?php echo site_url('stats_people/religion') ?>"> Agama</a>
                    </li>
                	<li class="<?php echo active_link_method('warga_negara', 'stats_people'); ?>">
                        <a href="<?php echo site_url('stats_people/warga_negara') ?>"> Warga Negara</a> 
                    </li>
                    <li class="<?php echo active_link_method('golongan_darah', 'stats_people'); ?>">
                        <a href="<?php echo site_url('stats_people/golongan_darah') ?>"> Golongan Darah</a> 
                    </li>
              	</ul>
            </div>
        </div>