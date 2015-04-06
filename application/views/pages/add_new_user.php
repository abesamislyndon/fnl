<div id="page-wrapper" >
 <?php echo form_open_multipart('manage_user_accounts/do_add_user');?>  
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                <div class="panel-heading">Add New User:</div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                   <div class="form-group">
                                            <label>Full name</label>
                                            <input type = "text" name = "full_name"  id = "full_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>username</label>
                                            <input type = "text" name = "username"  id = "username" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label>password</label>
                                            <input type = "password" name = "password"  id = "password" class="form-control">
                                        </div>
                                          <div class="form-group">
                                            <label>repeat password</label>
                                            <input type = "password" name = "password1"  id = "password1" class="form-control">
                                        </div>

                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                 <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role:</label>
                                             <select name = "role_code" class="form-control" id="singleSelect">
                                                <option value="" disabled selected></option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Surveyor</option>
                                              </select>  
                                      </div>
                                        
                              </div>
                            </div><!--end of row-->
                             <div class = "submit_container">
                                <input type = "submit" value ="submit" name = "submit" class = "submit">
                            </div>
                    </form>
                        </div><!--end of panel body-->


                    </div><!--end of panel-default-->
                </div><!--end of column 12-->
            </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->

