<div id="page-wrapper" >
 <?php echo form_open_multipart('description/do_update_description');?>  
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
         <div class = "confirm-div"></div>
           <div class="panel panel-default">
            <?php echo validation_errors(); ?>
                <div class="panel-heading">Description Details</div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>SN / CODE</label>

                                            <?php foreach ($desc_list as  $value): ?>
                                            <input type = "hidden" name = "sn"  id = "sn" value = "<?php echo $value->sn ?>">
                                            <input type = "text" name = "sn"  id = "sn" class="form-control" value = "<?php echo $value->sn_id ?>" disabled>
                                             <?php endforeach; ?>
                                        </div>
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Job Description</label>
                                            <?php foreach ($desc_list as  $value): ?>
                                            <textarea class="form-control myTextEditor" name = "sub_description" rows="3"><?php echo $value->sub_description ?></textarea>
                                          <?php endforeach; ?>
                                        </div>
                                </div><!--end of coloumn 6-->
                            </div><!--end of row-->
                             <div class = "submit_container">
                                <input type = "submit" value ="submit" name = "submit_desc" class = "submit">
                            </div>
                    </form>
                        </div><!--end of panel body-->


                    </div><!--end of panel-default-->
                </div><!--end of column 12-->
            </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->

