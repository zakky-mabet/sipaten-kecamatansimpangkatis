<div <?php echo ($this->agent->is_mobile()) ? 'class="container margin-container"' : $browser =" class='container'" ; ?>>
	 <div class="box box-warning">
  <div class="box-header with-border no-print">
  	<section class="content-header">
     <h1>
        <?php echo $crumb ?>
      </h1>
      <ol class="breadcrumb">
        <li class="white"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active white"><?php echo $crumb ?></li>
      </ol>
 	</section>
  </div>
  <div class="box-body">
    <div class="col-md-12">
    	<div id="faq" class="col-md-9">
      <div class="panel-group" id="accordion">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion"
                href="#collapse-<?php echo $value->id; ?>">
              <?php echo $value->title; ?>
              </a>
            </h4>
          </div>
          <div id="collapse-1" class="panel-collapse collapse in">
            <div class="panel-body">
              <?php echo $value->description; ?>
            </div>
            <div class="panel-footer">
              <div class="btn-group btn-group-xs"><span class="btn">Apakah ini berguna untuk anda ?</span><a class="btn btn-success" href="#"><i class="fa fa-thumbs-up"></i> Ya</a> <a class="btn btn-danger" href="#"><i class="fa fa-thumbs-down"></i> Tidak</a></div>
             
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="col-md-3 ">
      
      <div class="list-group">
        <a href="<?php echo site_url('utama/syarat_ijin'); ?>" class="list-group-item bg-orange active">Persyaratan Perizinan</a>
        <a href="<?php echo site_url('utama/prosedur_ijin'); ?>" class="list-group-item bg-yellow">Prosedur Perizinan</a>
       
      </div>
    </div>
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <div class="pull-right">
    klik untuk pilih menu !
    </div>
  </div><!-- /.box-footer-->
</div><!-- /.box -->

</div>

