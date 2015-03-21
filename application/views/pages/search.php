<div id="page-wrapper" >

   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                <div class="panel-heading">Search - Company, Jobwork, Quotation, Invoice</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                 <form class="form-search">
                                    <div class="input-append">
                                        <input type="text" class="span2 search" id = "search" name = "search_input">
                                        <button type="submit" class="button" >Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-12">
                                <div class="result-search">
                                    <h5>Result</h5>
                       <form class="form-horizontal" role="form" method="get">
                            <div class="table-responsive" id = "resultTable">
                                    <table class="table table-striped table-bordered table-hover table-style">
                                        <thead>
                                            <tr>
                                                <th style = "width:8%;">Quotation #</th>
                                                <th style = "width:8%;">Jobwork #</th>
                                                <th style = "width:7%;">Date</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Tel no.</th>
                                                <th>JobWork Description</th>
                                                 <th style = "width:7%;">Cost</th>
                                                 <th style = "width:7%;">Print</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($SR_list as $individual):?>   
                                            <tr>
                                                <td style = "text-align:center;"><?php echo $individual->service_report_id ?></td>
                                                <td style = "text-align:center;"><?php echo $individual->quotation_id ?></td>
                                                <td style = "text-align:center;"><?php if($individual->status == "4"){echo "<strong>-</strong>";}elseif($individual->status == "3"){ echo $individual->jobwork_id;}?></td>
                                                <td style = "text-align:center;"><?php if($individual->status == "4"){echo "<strong>REJECT QUOTATION</strong>";}else{echo "<strong>JOB WORK COMPLETE</strong>";}?></td>
                                                <td ><?php echo $individual->date_of_quote?></td>
                                                <td ><?php echo $individual->company_name?></td>
                                                <td ><?php echo $individual->address?></td>
                                                <td ><?php echo $individual->tel_num?></td>
                                                <td><?php echo $individual->job_description?></td>
                                                <td><a href = "<?php echo base_url();?>create_pdf/service_report/<?php echo $individual->quotation_id ?>" class = "link_button" target = "_blank"><i class="fa fa-print"></i></a></td>
                                                <td><a href = "<?php echo base_url();?>checkout/individual_details/<?php echo $individual->quotation_id ?>" class = "link_button"><i class="fa fa-eye"></i></a></td>
                                               </tr>
                                           <?php endforeach;?>
                                        </tbody>
                                    </table>

                                </div>


                                </div>
                            </div>
                    
                        </div><!--end of row-->
                    </form>
                </div><!--end of panel body-->
            </div><!--end of panel-default-->
         </div><!--end of column 12-->
      </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->

