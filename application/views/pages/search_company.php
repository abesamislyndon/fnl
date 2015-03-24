<div id="page-wrapper" >

   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                <div class="panel-heading"><h3>Search Company</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="get" class="form-search" id = "process_company">
                                    <div class="input-append">
                                        <input type="text" class="span2 search" id = "search" name = "search_input">
                                        <button type="submit" class="button" id = "submit_id">Search</button>
                                    </div>
                                </form>
                            </div>
                      <div class="col-lg-12">
                      <div class="result-search">
                              <h5>Result</h5>
                         
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
                                                <th style = "width:7%;">Print</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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