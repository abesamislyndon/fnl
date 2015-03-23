<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>F and L REINSTATEMENT PTE LTD</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/custom-styles.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/css/jquery-ui-1.10.4.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script>
     $(document).ready(function(){
            var FieldCount=1;  
            var autocomp_opt = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description.value = ui.item.sub_description;
                }
              };

             var autocomp_opt1 = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description2.value = ui.item.sub_description;
                }
              };

             var autocomp_opt2 = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description3.value = ui.item.sub_description;
                }
              };
             var autocomp_opt3 = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description4.value = ui.item.sub_description;
                }
              };

             var autocomp_opt4 = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description5.value = ui.item.sub_description;
                }
              };

             var autocomp_opt5 = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description6.value = ui.item.sub_description;
                }
              };
             var autocomp_opt6 = {
               source: "<?php echo base_url();?>description/get_description",
               minLength:1,
               select:function(evt, ui)
               {
                    this.form.sub_description7.value = ui.item.sub_description;
                }
              };
     
             $(document).on("keydown", ".sn", function () { 
             $(this).autocomplete(autocomp_opt);
             });

             $(document).on("keydown", ".sn2", function () { 
              $(this).autocomplete(autocomp_opt1);
             });

             $(document).on("keydown", ".sn3", function () { 
              $(this).autocomplete(autocomp_opt2);
             });

              $(document).on("keydown", ".sn4", function () { 
              $(this).autocomplete(autocomp_opt3);
             });

             $(document).on("keydown", ".sn5", function () { 
              $(this).autocomplete(autocomp_opt4);
             });

              $(document).on("keydown", ".sn6", function () { 
              $(this).autocomplete(autocomp_opt5);
             });

             $(document).on("keydown", ".sn7", function () { 
              $(this).autocomplete(autocomp_opt6);
             });

            $(".add_button").click(function (e) { //on add input button click
              FieldCount++;
              e.preventDefault();
             $("#customFields").append('<tr id="customFields" class = "targetfields"><input type = "hidden" name = "count[]" value = "'+ FieldCount +'"><td><input type = "text" name = "sn1[]" class="form-input sn'+ FieldCount +' id = field_'+ FieldCount +'"><td><textarea name="sub_description1[]" id="sub_description'+ FieldCount +'" value="" class="form-input sub sub_description'+ FieldCount +'" /></textarea></td><td><input type = "text"  name = "quantity1[]" class="form-input quantity"></td><td><input type = "text" name = "uom1[]"  class="form-input"></td><td><input type = "text"  name = "unit_price1[]" class="form-input unit_price"></td><td><input type = "text"  name = "amount1[]" class="form-input subtotal res"></td><td><a href="javascript:void(0);" class="remCF link_button1"><i class="fa fa-trash-o"></i></a></td></tr>');
            });
            $("#customFields").on('click', '.remCF', function(){
              $(this).parent().parent().remove();
            });
      });

    </script>

</head>
<body>
    <?php
      if (!$sock = @fsockopen('www.google.com', 80, $num, $error,5)) {
      echo '<p class = "notice"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;you are offline kindly check your connection</p>';
  }
  else{
    echo '';
  }
?>
 <div id="wrapper">       
 <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>/dashboard">F & L REINSTATEMENT PTE LTD</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
     
