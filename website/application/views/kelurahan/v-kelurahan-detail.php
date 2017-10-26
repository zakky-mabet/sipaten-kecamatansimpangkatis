		<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
			<div class="row">			
					<div class="col-md-6">
						<?php echo $this->page_title->show(); ?>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<?php  echo $this->breadcrumbs->show();  ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Banner -->
		
		<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">
					
					<!-- Page Content -->
					<div class="col-md-9 page-content">
						
					<!-- Classic Heading -->
						<h2 class="post-title">Kelurahan/Desa <?php echo $get->nama_desa ?></h2>
                		<div class="post-content">
			                <span><i class="fa fa-user"></i> <?php echo $get->uploaded ?></span> 
			                <span><i class="fa fa-calendar"></i> <?php $cut = substr($get->dates, 0,10); echo date_id($cut); ?></span>
			                <span class="pull-right"><i class="fa fa-eye"></i> <?php echo $get->hits ?> Dilihat	</span>
		                </div>
		                <br>
						<div class="col-md-3">
							<a class="lightbox" title="<?php echo $get->nama_kades?>" href="<?php echo base_url('assets/images/desa/'.$get->foto)  ?>">
			                <img alt="<?php echo $get->nama_kades ?>" src="<?php echo base_url('assets/images/desa/'.$get->foto)  ?>" />
			                </a>
			                <p class="footer-foto text-center">Foto Kades</p>
			
						</div>

	                	<div class="col-md-9">

						<table class="table table-striped">
			                <tr>
			                  <th>Nama Kades</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->nama_kades ?> </td>
			                </tr>
			                <tr>
			                  <th>NIP</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->nip ?> </td>
			                </tr>
			                <tr>
			                  <th>Pangkat</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->pangkat ?> </td>
			                </tr>
			                   <tr>
			                  <th>Jabatan</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->jabatan ?> </td>
			                </tr>
			                <tr>
			                  <th>TTL</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->tmp_lahir.', '. date_id($get->tgl_lahir) ?> </td>
			                </tr>
		       				<tr>
			                  <th>Agama</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->agama ?> </td>
			                </tr>
			                <tr>
			                  <th>Alamat</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->alamat ?> </td>
			                </tr>
			                <tr>
			                  <th>Hobi</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->hobbi ?> </td>
			                </tr>
			                <tr>
			                  <th>Motto Hidup</th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->motto_hidup ?> </td>
			                </tr>
			            </table>

						</div>
						<div class="col-md-12">
							 <div class="hr5" style="margin-top:20px; margin-bottom:35px;"></div>
						</div>
						

						<div class="col-md-3">
							<a class="lightbox" title="<?php echo 'Gedung Kantor '.$get->nama_desa?>" href="<?php echo base_url('assets/images/desa/'.$get->foto_kantor)  ?>">
			                <img alt="<?php echo 'Gedung Kantor '.$get->nama_desa ?>" src="<?php echo base_url('assets/images/desa/'.$get->foto_kantor) ?>" />
			                </a>
			                <p class="footer-foto text-center">Foto Gedung</p>
			              
						</div>

	                	<div class="col-md-9">

						<table class="table table-striped">
			                <tr>
			                  <th>Gedung Kantor </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->nama_desa ?> </td>
			                </tr>
			                <tr>
			                  <th>Alamat Kantor </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->alamat_kantor ?> </td>
			                </tr>
			                <tr>
			                  <th>Alamat Website </th>
			                  <td style="width: 10px">:</td>
			                  <td> <a href="<?php 
			                	$potong = substr($get->alamat_website,0,4);
			                	if ($potong != 'http') {
			                		 echo $url = '#';
			                	}
			                	else {
			                		echo $get->alamat_website;
			                	}
			                   ?>" title="Alamat Website"><?php echo $get->alamat_website ?></a>  </td>
			                </tr>
			                <tr>
			                  <th>Email Kel/Desa </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->email_desa ?> </td>
			                </tr>
			                <tr>
			                  <th>Luas Wilayah </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->luas_wilayah ?> </td>
			                </tr>
			                <tr>
			                  <th>Jumlah RT </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->jmlh_rt ?> </td>
			                </tr>
			                <tr>
			                  <th>Jumlah RW </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->jmlh_rw ?> </td>
			                </tr>
			                <tr>
			                  <th>Jumlah Penduduk </th>
			                  <td style="width: 10px">:</td>
			                  <td> <?php echo $get->jmlh_penduduk ?> </td>
			                </tr>
			            </table>
				     	
						</div>
						<div class="col-md-12">
							 <div class="hr5" style="margin-top:20px; margin-bottom:35px;"></div>
						</div>
						<div class="col-md-3"></div>
						<!-- <div class="col-md-9">
							<h3 class="text-center">Perangkat Kelurahan/Desa</h3>
							<table class="table table-striped">
							 <tr>
				                <th class="text-center">No</th>
				                <th class="text-center">Nama Lengkap</th>
				                <th class="text-center">Pangkat</th>
				                <th class="text-center">Jabatan</th>
			                </tr>
							<?php $no=1; foreach ($get_perangkat as $key => $value): ?>
								
							
			                <tr>
				                <td width="10"><?php echo $no++; ?></td>
				                <td><?php echo $value->nama; ?></td>
				                <td><?php echo $value->pangkat; ?></td>
				                <td><?php echo $value->jabatan; ?></td>
			                </tr>
			              
			              	<?php endforeach ?>

			            </table>

						</div> -->
						<!-- <div class="col-md-12">
							 <div class="hr5" style="margin-top:20px; margin-bottom:35px;"></div>
						</div> -->
					</div>
					<!-- End Page Content-->
					
					<!--Sidebar-->
					<div class="col-md-3 sidebar right-sidebar">
						
						<!-- Popular Posts widget -->
						<div class="widget widget-popular-posts">
							<h4>Berita Terpopuler <span class="head-line"></span></h4>
							<ul>
								<?php foreach ($berita_populer as $key => $value): ?>
              
					                <li>
					                  <div class="widget-thumb">
					                    <a href="<?php echo base_url('berita/get/'.$value->slug) ?>"><img src="<?php echo base_url('assets/images/news/'.$value->foto);?>" alt="<?php echo $value->title ?>" /></a>
					                  </div>
					                  <div class="widget-content">
					                    <h5><a href="<?php echo base_url('berita/get/'.$value->slug) ?>"><?php echo $value->title ?></a></h5>
					                    <span><?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>
					                  </div>
					                  <div class="clearfix"></div>
					                </li>

					              <?php endforeach ?>
							</ul>
						</div>

						
            <!-- Popular Posts widget -->
            <div class="widget widget-popular-posts">
              <h4>Events <span class="head-line"></span></h4>
              <ul>
              <?php foreach ($events_populer as $key => $value): ?>
              
                <li>
                  <div class="widget-thumb">
                    <a href="<?php echo base_url('events/get/'.$value->slug) ?>"><img src="<?php echo base_url('assets/images/news/'.$value->foto);?>" alt="<?php echo $value->title ?>" /></a>
                  </div>
                  <div class="widget-content">
                    <h5><a href="<?php echo base_url('events/get/'.$value->slug) ?>"><?php echo $value->title ?></a></h5>
                    <span><?php $cut = substr($value->dates, 0,10); echo date_id($cut); ?></span>
                  </div>
                  <div class="clearfix"></div>
                </li>

              <?php endforeach ?>
              </ul>
            </div>
					
					
				</div>
			</div>
		</div>
		<!-- End Content -->
