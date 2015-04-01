  <div id="loading">
      <div id="loadingcontent">
          <p id="loadingspinner">
              Please Wait
          </p>
      </div>
   </div>

  <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
           <div class = "confirm-div"></div>
              <div class="panel panel-default">
                 <?php echo validation_errors(); ?>
                   <div class="panel-heading">STATUS MESSAGE</div>
                      <div class="panel-body">
                         <div class="row">
                          <div class="col-lg-12">
                          <div class="checkout_style">
                             <div class="form-group success">
                                  <h3 class = "wow pulse"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;&nbsp;SUCCESSFULLY CREATE SITE SURVEY</h3>
                                  <br><br><hr><br><br>
                                  <p>Please choose your next options</p><br>
                                   <ul class = "create_new">
                                     <li><a href="<?php echo base_url(); ?>quotation/form_surveyor" class = "create"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;&nbsp;CREATE NEW SITE SURVEY</a></li>
                                     <li><a href="<?php echo base_url();?>login/logout" class = "create">LOGOUT</a></li>
                                 </ul>
                             </div> 
                          </div>
                        </div><!--end of column 12-->
                    </div><!--end of panel body-->
                </div><!--end of panel-default-->
           </div><!--end of column 12-->
     </div><!--end of row-->



