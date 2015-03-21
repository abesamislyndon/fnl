<div id="page-wrapper" >
   <div id="page-inner">
        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              SERVICE REPORT LIST
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-style">
                                        <thead>
                                            <tr> 
                                                <th style = "width:8%;">SR #</th>
                                                <th style = "width:8%;">Quotation #</th>
                                                <th style = "width:8%;">Jobwork #</th>
                                                <th style = "width:10%;">Remarks</th>
                                                <th style = "width:7%;">Date of Quote</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Tel no.</th>
                                                <th>JobWork Description</th>
                                                 <th style = "width:7%;">Cost</th>
                                                 <th style = "width:7%;">Service Report</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php if (isset($SR_list) & ($SR_list <> NULL)) {?>  
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
                                                <?php
                                                  $CI =& get_instance();
                                                  $CI->load->model('quotation_model');
                                                  $result = $CI->quotation_model->total1($individual->quotation_id);
                                                 ?>
                                                <?php foreach ($result as $individual1):?>   
                                                <td style = "color:#e53935; font-weight:bolder; font-size:10px; font-family:verdana; text-align:center;"><?php  $sub = $individual1->total; $sub = $individual1->total; $percentage = 7; $gst = ($percentage / 100) * $sub; $final = $sub + $gst; echo number_format((float)$final, 2, '.', '');;  ?></td>
                                                <?php endforeach;?>
                                                <td><a href = "<?php echo base_url();?>create_pdf/service_report/<?php echo $individual->quotation_id ?>" class = "link_button" target = "_blank"><i class="fa fa-print"></i></a></td>
                                                <td><a href = "<?php echo base_url();?>checkout/individual_details/<?php echo $individual->quotation_id ?>" class = "link_button"><i class="fa fa-eye"></i></a></td>
                                               </tr>
                                           <?php endforeach;?>
                                           <?php }?>
                                        </tbody>
                                    </table>
                                </div><!--table-responsive-->
                            </div><!--panel-body-->
                        </div><!--end is panel-default-->
                    </div>
            <div class = "col-md-12 pagination"><p class = "pagination_con"><?php echo $links; ?></p></div>
      </div><!-- end of page inner-->
</div><!--end of page-wrapper-->



