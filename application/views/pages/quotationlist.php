<div id="page-wrapper" >
   <div id="page-inner">
        <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                              QUOTATION LIST
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-style">
                                        <thead>
                                            <tr>
                                                <th style = "width:8%;">Quotation #</th>
                                                <th style = "width:7%;">Date</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Tel no.</th>
                                                <th>JobWork Description</th>
                                                 <th style = "width:7%;">Cost</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (isset($quotation_list) & ($quotation_list <> NULL)) {?>  
                                         <?php foreach ($quotation_list as $individual):?>   
                                            <tr>
                                                <td style = "text-align:center;"><?php echo $individual->quotation_id ?></td>
                                                <td ><?php echo $individual->date_in?></td>
                                                <td ><?php echo $individual->company_name?></td>
                                                <td ><?php echo $individual->address?></td>
                                                <td ><?php echo $individual->tel_num?></td>
                                                <td><?php echo $individual->job_description?></td>
                                                 <td style = "color:#e53935; font-weight:bolder; font-size:10px; font-family:verdana; text-align:center;"><?php echo $individual->grand_total?></td>
                                                <td><a href = "<?php echo base_url();?>quotation/individual_details/<?php echo $individual->quotation_id ?>" class = "link_button"><i class="fa fa-eye"></i></td>
                                            </tr>
                                           <?php endforeach;?>
                                           <?php }?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                        <div class = "col-md-12 pagination"><p class = "pagination_con"><?php echo $links; ?></p></div>
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->


