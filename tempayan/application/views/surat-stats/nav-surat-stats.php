 <div class="row">
    <div class="col-md-3">
        <div class="box box-solid no-print" id="sticker">
            <div class="box-header with-border">
              	<h3 class="box-title">Filter</h3>
            </div>
            <form action="<?php echo current_url(); ?>" method="get">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Rentan Tanggal :</label>
                    <div class="inner-addon left-addon">
                        <i class="fa fa-calendar"></i>
                        <input type="text" name="start_date" value="<?php echo $this->input->get('start_date') ?>" class="form-control" id="datepicker" placeholder="Mulai..." />
                    </div>
                </div>
                <div class="form-group">
                    <div class="inner-addon left-addon">
                        <i class="fa fa-calendar"></i>
                        <input type="text" name="end_date" value="<?php echo $this->input->get('end_date') ?>" class="form-control" id="datepicker2" placeholder="Sampai..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Bulan :</label>
                    <select name="month" class="form-control">
                        <option value="">-- PILIH --</option>
                    <?php  
                    /**
                     * Loop month
                     *
                     * @var Integer
                     **/
                    for($month = 1; $month <= 12; $month++) :
                    ?>
                        <option value="<?php echo $month; ?>" <?php if($month==$this->input->get('month')) echo "selected"; ?>><?php echo bulan($month); ?></option>
                    <?php  
                    endfor;
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Tahun :</label>
                    <select name="year" class="form-control">
                        <option value="">-- PILIH --</option>
                    <?php  
                    /**
                     * Loop Year start at develepment
                     *
                     * @var Integer
                     **/
                    for($year = 2017; $year <= date('Y-m-d', strtotime('+2 years')); $year++) :
                    ?>
                        <option value="<?php echo $year; ?>" <?php if($year==$this->input->get('year')) echo "selected"; ?>><?php echo $year; ?></option>
                    <?php  
                    endfor;
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">User :</label>
                    <select name="user" class="form-control">
                        <option value="">-- PILIH --</option>
                        <?php  
                        /* Loop Data User */
                        foreach($this->option->get_user() as $row) :
                        ?>
                                <option value="<?php echo $row->user_id; ?>" <?php if($row->user_id==$this->input->get('user')) echo "selected"; ?>><?php echo $row->name; ?></option>
                        <?php  
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <a href="<?php echo current_url(); ?>" class="btn btn-warning hvr-shadow pull-left"><i class="fa fa-times"></i> Reset</a>
                <button type="submit" class="btn btn-warning hvr-shadow pull-right"><i class="fa fa-filter"></i> Filter</button>
            </div>
            </form>
        </div>
    </div>
 