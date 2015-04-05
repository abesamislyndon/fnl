<div id="page-wrapper" >
   <div id="page-inner">
        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              SUB DESCRIPTION LIST
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-style">
                                        <thead>
                                            <tr>
                                                <th style = "width:8%;">Serial No.</th>
                                                <th>Description Destails</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($desc_list) & ($desc_list <> NULL)) {?>  
                                         <?php foreach ($desc_list as $individual):?>   
                                            <tr>
                                               <td ><?php echo $individual->sn?></td>
                                               <td ><?php echo $individual->sub_description ?></td>
                                                <td>
                                                      <div class="btn-group pull-right">
                                                       <button type="button" class="button3 dropdown-toggle" data-toggle="dropdown">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="<?php echo base_url();?>description/update_description_individual/<?php echo $individual->sn?>"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;update</a></li>
                                                          <li><a href="<?php echo base_url();?>description/del_desc/<?php echo $individual->sn_id?>" class  =  "delete_item" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
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


