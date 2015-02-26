<div id="page-wrapper" >
 <?php echo form_open_multipart('quotation/do_add_quotation');?>  
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                <div class="panel-heading">Form Details</div>
                    <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date :</label>
                                            <input type = "text" name = "quotation_date_in" id  = "datepicker" class="form-control">
                                        </div>
                                      <div class="form-group">
                                            <label>Company Name :</label>
                                            <input type = "text" name = "company_name" id = "company_name" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label>Address :</label>
                                            <input type = "text"  name = "address" id = "address" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label>Tel :</label>
                                            <input type = "text"  name = "tel_num" id = "tel_num" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label>Fax :</label>
                                            <input type = "text"  name = "fax_num" id = "fax_num" class="form-control">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                       <div class="form-group">
                                            <label>Email :</label>
                                            <input type = "text"  name = "email" id = "email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Term of Payment :</label>
                                            <input type = "text" name = "term_payment" class="form-control">
                                        </div>
                                           <div class="form-group">
                                            <label>Validity Period :</label>
                                            <input type = "text"  name = "validity_period" class="form-control">
                                        </div>
                                         <div class="form-group">
                                            <label>Job Description</label>
                                            <textarea class="form-control" name = "job_description" rows="3"></textarea>
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
             <div class="panel-heading">JOB DETAILS</div>
               <div class="panel-body">
                 <div class="col-md-12">
                  <!--   Kitchen Sink -->
                      <div class="panel panel-default">
                        <div class="panel-heading">Summary</div>
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
                                       <tr id="customFields" class = "targetfields">
                                            <td><input type = "text" name = "sn[]" id = "sn" class="form-input sn"></td>
                                            <td><textarea  name = "sub_description[]" id = "sub_description" class="form-input sub_description"></textarea></td>
                                            <td><input type = "text" name = "quantity[]" class="form-input quantity"></td>
                                            <td><input type = "text" name = "uom[]" class="form-input"></td>
                                            <td><input type = "text" name = "unit_price[]" class="form-input unit_price"></td>
                                            <td><input type = "text"  name = "amount[]" class="form-input subtotal res"></td>
                                        </tr>
                                    </tbody>
                                        <tr class = "total_info">
                                            <td colspan = "4"></td>
                                            <td class = "strong"><label>SUBTOTAL</label></td>
                                            <td class = "strong"><input type = "text"  name = "sub_total" class="form-input" id = "total"></td>
                                        </tr>

                                         <tr>
                                            <td colspan = "4"></td>
                                            <td class = "strong"><label>7% GST</label></td>
                                            <td><input type = "text"  name = "gst_total" class="form-input" id = "gst"></td>
                                        </tr>  
                                         <tr>
                                            <td colspan = "4"></td>
                                            <td class = "strong"><label>GRAND TOTAL</label></td>
                                            <td><input type = "text"  name = "grand_total" class="form-input" id = "grand_total"></td>
                                        </tr>
                                </table>
                               <a href="javascript:void(0);" id="addCF" class = "add_button">+</a>
                            </div>
                        </div>
                     </div>
                     <div class = "submit_container">
                        <input type = "submit" value ="submit" name = "submit" class = "submit">
                     </div>
                    </form>
                   <!-- End  Kitchen Sink -->
                </div>
             </div><!--end of panel body-->
          </div><!--end of panel-default-->
        </div><!--end of column 12-->
     </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->


