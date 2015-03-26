<div id="page-wrapper" >
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                <div class="panel-heading"><h3>Generate Report Job Complete</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo form_open_multipart('report/generate_report_complete');?>  
                                    <div class="input-append">
                                       <span>From</span>
                                        <input type="text"  id  = "from" name = "from" class="span2 search1">
                                        <span>To</span>
                                         <input type="text"  id  = "to"  name = "to" class="span2 search1">
                                        <button type="submit" class="button" id = "submit_id">Generate Report</button>
                                    </div>
                                </form>
                            </div>
                      <div class="col-lg-12">
                      <div class="result-search">
                              <h5>Result</h5>


                      <table class = "from_to">
                       <tr>
                         <td><span class = "to_from">FROM</span>&nbsp;&nbsp;&nbsp;<?php $new_from = date("d-m-Y", strtotime($date_from));  if($new_from === ''){ echo '-';}else{ echo $new_from;} ?></td>
                         <td><span class = "to_from">TO</span><?php $new_to = date("d-m-Y", strtotime($date_to)); echo  $new_to; ?></td>
                       </tr>
                      </table><br>

                      <table class = "from_to">
                       <tr>
                          <td><span class = "print-search"><a href = "<?php echo base_url();?>create_pdf/search_report_complete/<?php echo $date_from; ?>/<?php echo $date_to; ?>" class = "link_button" target = "_blank"><i class="fa fa-print"></i></a>     </span>                              
                          </td>
                       </tr>
                      </table><br>
                
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-style" id = "resultTable">
                                           <thead>
                                            <tr>
                                                <th style = "width:8%;">Quotation #</th>
                                                <th style = "width:7%;">Date</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Tel no.</th>
                                                <th>JobWork Description</th>
                                                <th style = "width:7%;">Cost</th>
                                                <th style = "width:7%;">Remarks</th>
                                                <th style = "width:7%;">Print</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($result == true){ ?>
                                          <?php foreach($result as $value): ?>
                                           <tr>
                                            <td><?php echo $value->quotation_id; ?></td>
                                            <td><?php echo $value->date_of_quote; ?></td>
                                            <td><?php echo $value->company_name; ?></td>
                                            <td><?php echo $value->address; ?></td>
                                            <td><?php echo $value->tel_num; ?></td>
                                            <td><?php echo $value->job_description; ?></td>
                                            <td><?php echo number_format($value->grand_total,2); ?></td>
                                            <td><?php echo $value->remarks; ?></td>
                                            <td><a href = "<?php echo base_url();?>create_pdf/print_pending_quotation/<?php echo $value->quotation_id ?>" class = "link_button" target = "_blank"><i class="fa fa-print"></i></a></td>                                      

                                          </tr>
                                        <?php  endforeach; ?>
                                  

                               <span class = "total">TOTAL :&nbsp;&nbsp;<?php  
                                 if(!empty($result)){
                                          $sum = 0; 
                                           foreach($result as $details):
                                           $sum+=$details->grand_total;
                                           endforeach; 
                                            echo number_format($sum,2);}?>&nbsp;sgd</span>

                                           <?php }else{?>
                                             <tr>
                                               <td colspan = "9">NO RESULT</td>
                                              
                                             </tr>
                                          <?php }?>
                                      
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                         </div>
                    </div><!--end of row-->
                 </div><!--end of panel body-->
             </div><!--end of panel-default-->
          </div><!--end of column 12-->
       </div><!--end of row-->
    </div><!-- end of page inner-->
</div><!--end of page-wrapper-->