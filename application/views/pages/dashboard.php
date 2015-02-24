
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

                <div class="row">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                               <i class="fa fa-pencil-square-o fa-3x"></i>
                                <h3><span class = "counter"><?php foreach($count_quote as $pending_quote){ echo $pending_quote->total; } ?></span></h3>
                            </div>
                            <div class="panel-footer back-footer-green style-font">
                                <p>PENDING QUOTATION LIST</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-flag-o fa-3x"></i>
                                <h3 class = "counter"><?php foreach($count_jobwork as $pending_jobwork){ echo $pending_jobwork->total; } ?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue style-font">
                              <p>ON GOING JOB WORK</p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                             <i class="fa fa-archive fa-3x"></i>
                                <h3 class = "counter">193 </h3>
                            </div>
                            <div class="panel-footer back-footer-red style-font">
                               <p>PENDING JOBWORK CHECKOUT</p> 

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">


                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Bar Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
              
                </div>
