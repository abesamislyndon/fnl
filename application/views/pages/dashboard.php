<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <i class="fa fa-dashboard"></i> Dashboard <small>Notification Summary Results</small>
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row noti">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                       <i class="fa fa1 fa-pencil-square-o fa-3x"></i><hr>
                        <h3><span class = "counter"><?php foreach($count_quote as $pending_quote){ echo $pending_quote->total; } ?></span></h3>
                    </div>
                    <div class="panel-footer back-footer-green style-font wow bounceInUp center" data-wow-delay="0.1s">
                        <p><a href="<?php echo base_url();?>quotation/quotationlist">PENDING QUOTATION LIST</a></p>

                    </div>
                </div>
            </div>

             <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-orange">
                    <div class="panel-body">
                       <i class="fa fa1 fa-clock-o fa-3x"></i><hr>
                        <h3><span class = "counter"><?php foreach($overdue as $pending_quote){ echo $pending_quote->total; } ?></span></h3>
                    </div>
                    <div class="panel-footer back-footer-orange style-font wow bounceInUp center" data-wow-delay="0.2s">
                        <p><a href="<?php echo base_url();?>quotation/overdue_quotation_list">OVERDUE QUOTATION</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-blue ">
                    <div class="panel-body">
                        <i class="fa fa1 fa-flag-o fa-3x"></i><hr>
                        <h3 class = "counter"><?php foreach($count_jobwork as $pending_jobwork){ echo $pending_jobwork->total; } ?></h3>
                    </div>
                    <div class="panel-footer back-footer-blue style-font wow bounceInUp center" data-wow-delay="0.3s">
                      <p><a href="<?php echo base_url();?>jobwork/jobwork_list">ON GOING JOB WORK</a></p> 
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-red">
                    <div class="panel-body">
                     <i class="fa fa1 fa-archive fa-3x"></i><hr>
                        <h3 class = "counter"><?php foreach($job_complete as $complete_jobwork){ echo $complete_jobwork->total; } ?></h3>
                    </div>
                    <div class="panel-footer back-footer-red style-font wow bounceInUp center" data-wow-delay="0.5s">
                       <p><a href="<?php echo base_url();?>service_report/service_report_list">PENDING SERVICE OUT</a></p> 

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Latest Pending Quotation List
                    </div>
                    <div class="panel-body">
                     
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chart
                    </div>
                    <div class="panel-body">
                    
                    </div>
                </div>
            </div>
        </div>
  </div>
