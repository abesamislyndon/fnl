<div id="page-wrapper" >
   <div id="page-inner">
        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             USER ACCOUNT LIST
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-style ">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th style = "width:5%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($list) & ($list <> NULL)) {?>  
                                         <?php foreach ($list as $individual):?>   
                                            <tr>
                                                <td ><?php echo $individual->full_name?></td>
                                                <td ><?php echo $individual->username?></td>
                                                <?php if($individual->role_code == "1"){ ?>
                                                    <td>admin</td>    
                                                 <?php }else{ ?>
                                                    <td>Surveyor</td> 
                                                <?php } ?>
                                                <td>
                                                  <div class="btn-group pull-right">
                                                       <button type="button" class="button3 dropdown-toggle" data-toggle="dropdown">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="<?php echo base_url();?>manage_user_accounts/update_user/<?php echo $individual->id?>" role="button" data-toggle="modal" data-load-remote="" data-remote-target="#edit_modal .modal-body"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Edit Username</a></li>
                                                          <li><a href="<?php echo base_url();?>manage_user_accounts/update_user_pwd/<?php echo $individual->id?>" role="button" data-toggle="modal" data-load-remote="" data-remote-target="#edit_modal .modal-body"><i class="fa fa-key"></i></i>&nbsp;&nbsp;Edit Password</a></li>
                                                          <li><a href="<?php echo base_url();?>manage_user_accounts/del_user/<?php echo $individual->id?>" class  =  "delete_item" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
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
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->


