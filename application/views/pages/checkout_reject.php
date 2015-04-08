<div id="page-wrapper" >
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-6">
        <div class="checkout_style">
          <div class="form-group success"><br>
            <h3 class = "wow pulse"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;SUCCESSFULLY CHECKOUT REJECT QUOTATION</h3>
            <br><br><br><hr><br>
             <?php foreach($quotation_list_individual as $individual):?>
              <ul class = "create_new">
              <li><a href = "<?php echo base_url();?>create_pdf/service_report/<?php echo $individual->quotation_id ?>" class = "print1" target = "_blank"><i class="fa fa-print">&nbsp;&nbsp;SERVICE REPORT</i></a></li>
            </ul> 
          <?php endforeach; ?>
          </div>
        </div>
        </div><!--end of column 12-->
  
        <div class="col-lg-6">
            <div class="checkout_style">
               <div class="form-group success">
                  <p>Please choose your next options</p><br>
                    <br><hr>
                     <ul class = "create_new">
                       <li><a href="<?php echo base_url(); ?>quotation/quotationlist" class = "create"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;&nbsp;GO TO → QUOTATION LIST</a></li>
                       <li><a href="<?php echo base_url(); ?>jobwork/jobwork_list" class = "create"><i class="fa fa-fw fa-file"></i></i>&nbsp;&nbsp;&nbsp;GO TO → JOBWORKLIST</a></li>
                       <li><a href="<?php echo base_url(); ?>dashboard" class = "create"><i class="fa fa-tachometer"></i>&nbsp;&nbsp;&nbsp;GO TO → DASHBOARD</a></li>
                   </ul>
               </div> 
            </div>
        </div><!--end of column 12-->
     </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->
