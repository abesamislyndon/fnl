<div id="page-wrapper" >
 <?php echo form_open_multipart('jobwork/do_add_jobwork');?>  
 <?php foreach($jobwork_list_individual as $individual):?>
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                        <div class="panel-heading">
                           Form Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                   
                                        <div class="form-group">
                                            <label>Date :</label>
                                            <input type = "text" name = "date_in" id  = "date_in" class="form-control" value = "<?php echo $individual->date_in ?>">
                                        </div>
                                      <div class="form-group">
                                            <label>Company Name :</label>
                                            <input type = "text" name = "company_name" id = "company_name" class="form-control" value = "<?php echo $individual->company_name ?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Address :</label>
                                            <input type = "text"  name = "address" id = "address" class="form-control" value = "<?php echo $individual->address ?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Tel :</label>
                                            <input type = "text"  name = "tel_num" id = "tel_num" class="form-control" value = "<?php echo $individual->tel_num ?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Fax :</label>
                                            <input type = "text"  name = "fax_num" id = "fax_num" class="form-control" value = "<?php echo $individual->fax_num ?>">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                       <div class="form-group">
                                            <label>Email :</label>
                                            <input type = "text"  name = "email" id = "email" class="form-control" value = "<?php echo $individual->email ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Term of Payment :</label>
                                            <input type = "text" name = "term_payment" class="form-control" value = "<?php echo $individual->term_payment ?>">
                                        </div>
                                           <div class="form-group">
                                            <label>Validity Period :</label>
                                            <input type = "text"  name = "validity_period" class="form-control" value = "<?php echo $individual->validity_period ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Job Description</label>
                                            <textarea class="form-control" name = "job_description" rows="3"><?php echo $individual->job_description ?></textarea>
                                        </div>

                                </div><!--end of coloumn 6-->
                            </div><!--end of row-->
                        </div><!--end of panel body-->
                    </div><!--end of panel-default-->
                </div><!--end of column 12-->
            </div><!--end of row-->

     <div class="row">
        <div class="col-lg-12">
           <div class="panel panel-default">
                        <div class="panel-heading">
                          JOB DETAILS
                        </div>
            <div class="panel-body">
               <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Summary
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="customFields" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th style = "width:10%;">SN</th>
                                            <th>Description</th>
                                            <th style = "width:10%;">Quantity</th>
                                            <th style = "width:10%;">UOM</th>
                                            <th style = "width:10%;">Unit Price</th>
                                            <th style = "width:10%;">Amount</th>
                                             <th style = "width:7%;">action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                               
                                      
                                      <?php foreach($sub_description_individual as $individual):?> 
                                       <tr id="customFields" class = "targetfields">
                                            <td><input type = "text" name = "sn[]" class="form-input" value = "<?php echo $individual->sn?>"></td>
                                            <td><textarea  name = "sub_description[]" class="form-input"><?php echo $individual->sub_description?></textarea></td>
                                            <td><input type = "text" name = "quantity[]" class="form-input quantity" value = "<?php echo $individual->quantity ?>"></td>
                                            <td><input type = "text" name = "uom[]" class="form-input" value = "<?php echo $individual->uom?>"></td>
                                            <td><input type = "text" name = "unit_price[]" class="form-input unit_price" value = "<?php echo $individual->unit_price?>"></td>
                                            <td><input type = "text"  name = "amount[]" class="form-input subtotal res"  value = "<?php echo $individual->amount?>"></td>
                                        </tr>

                                        <?php endforeach; ?>   
                                    </tbody>
                                <?php foreach($overall_total_details as $individual): ?>
                                       <tr>
                                             <td colspan = "4"></td>
                                             <td class = "strong">SUBTOTAL</td>
                                             <td class = "strong"><input type = "text"  name = "sub_total" class="form-input" id = "total" value = "<?php echo $individual->sub_total ?>"></td>
                                        </tr> 
                                         <tr>
                                             <td colspan = "4"></td>
                                             <td class = "strong">7% GST</td>
                                             <td><input type = "text"  name = "gst_total" class="form-input" id = "gst" value = "<?php echo $individual->gst_total ?>"></td>
                                        </tr>  
                                         <tr>
                                             <td colspan = "4"></td>
                                             <td class = "strong"><label></label>GRAND TOTAL</td>
                                             <td><input type = "text"  name = "grand_total" class="form-input" id = "grand_total" value = "<?php echo $individual->grand_total ?>"></td>
                                        </tr>
                                   <?php endforeach; ?> 
                                </table>
                               <a href="javascript:void(0);" id="addCF" class = "add_button">+</a>
                            </div>
                        </div>
                    </div>
                     <div class = "submit_container">
                        <input type = "submit" value ="submit" name = "submit" class = "submit">
                     </div>
                </form>
               <?php endforeach; ?> 
                     <!-- End  Kitchen Sink -->
                </div>
             </div><!--end of panel body-->
          </div><!--end of panel-default-->
        </div><!--end of column 12-->
     </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->


