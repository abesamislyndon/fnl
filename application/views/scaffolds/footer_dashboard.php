            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/morris.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom-scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/js/jquery-ui-1.10.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/stacktable.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
 
   <script type="text/javascript"> 
    $(document).ready(function(){
     $('confirm.div').hide();
      <?php if($this->session->flashdata('msg')){ ?>
      $('.confirm-div').html('<?php echo "<p "."&nbsp;&nbsp;&nbsp;".$this->session->flashdata('msg');"</p>" ?>').fadeIn( "slow").fadeOut(4500);
      });
      <?php } ?>
   </script>
 
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                changeYear:true,
                yearRange: "2005:2015",
                dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                  $( "#to" ).datepicker( "option", "minDate", selectedDate );
                }
              });

  });
  </script>

   <script type="text/javascript" language="javascript">
     $(document).ready(function() {
              jQuery( "#from" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                changeYear:true,
                yearRange: "2005:2015",
                dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                  $( "#to" ).datepicker( "option", "minDate", selectedDate );
                }
              });
              jQuery( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths:1,
                changeYear:true,
                yearRange: "2005:2015",
                dateFormat: "yy-mm-dd",
                onClose: function( selectedDate ) {
                  jQuery( "#from" ).datepicker( "option", "maxDate", selectedDate );
                }
              });
          });
   </script>

  <script type="text/javascript">
  $(document).ready(function () 
  {
     $(function() 
     {
      $("#customFields").keyup(function(event) 
      {
        var total = 0;
        var res2 = 0;
        $("#customFields .targetfields").each(function() 
        {
          var qty = parseFloat($(this).find(".quantity").val());
          var rate = parseFloat($(this).find(".unit_price").val());
          var qty1 = qty.toFixed(2);
          var rate1 = rate.toFixed(2);
          var subtotal =  qty1 * rate1;
          var res = parseFloat($(this).find(".res").val());
          var res1 = subtotal;
      
          $(this).find(".subtotal").val(subtotal.toFixed(2));
          if(!isNaN(subtotal))
          total+=subtotal; 
          gst =   (( 7 * total) / 100 );
          grand_total = gst + total;
          
          if(!isNaN(res))
          res2+=res1;
        });

        $(this).find("#total").val(total.toFixed(2));       
        $(this).find("#gst").val(gst.toFixed(2));  
        $(this).find("#grand_total").val(grand_total.toFixed(2));
        $(this).find(".totalColumn").val(res2.toFixed(2));
      });
     });
   });
  </script>

   <script type="text/javascript"> 
                  jQuery(document).ready(function(){
                      $('#company_name').autocomplete({
                                 source:'<?php echo base_url();?>jobwork/get_company', minLength:1,
                        select:function(evt, ui)
                         {
                          this.form.address.value = ui.item.address;
                          this.form.tel_num.value = ui.item.tel_num;
                          this.form.fax_num.value = ui.item.fax_num;
                          this.form.email.value = ui.item.email;
                        }
                  });
                  });
   </script> 

  <script type="text/javascript"> 
                jQuery(document).ready(function(){
                    $('#search').autocomplete({
                               source:'<?php echo base_url();?>jobwork/get_company', minLength:1,
                });
                });
  </script> 
            
  <script>
      jQuery(document).ready(function( $ ) {
          $('.counter').counterUp({
              delay: 10,
              time: 1000
          });
      });
  </script>

  <script>
    $(document).ready(function() {
      current_page = document.location.href
      if (current_page.match(/dashboard/)) 
      {
      $("ul#main-menu li:eq(1)").addClass('selected');
      } 
      else if (current_page.match(/overdue_quotation_list/)) 
       {
       $("ul#main-menu li:eq(2)").addClass('selected');
      } 
      else if (current_page.match(/quotationlist/)) 
      {
      $("ul#main-menuli:eq(3").addClass('selected');
      }
    
      else if (current_page.match(/jobwork_list/)) 
      {
       $("ul#main-menu li:eq(4)").addClass('selected');
      } 
      else if (current_page.match(/service_report_list/)) 
      {
      $("ul#main-menu li:eq(5)").addClass('selected');
      }  
      else if (current_page.match(/quotation/)) 
      {
      $("ul#main-menu li:eq(6)").addClass('selected');
      } 
      else if (current_page.match(/form/)) 
      {
      $("ul#main-menu li:eq(7)").addClass('selected');
      }
       else if (current_page.match(/description/)) 
      {
      $("ul#main-menu li:eq(8)").addClass('selected');
      }  
      else if (current_page.match(/quotation_search/)) 
      {
      $("ul#main-menu li:eq(9)").addClass('selected');
      }  

     else { // don't mark any nav links as selected
        $("ul#navigation li").removeClass('selected');
  };
  });
  </script>

  <script type="text/javascript">
      jQuery(document).ready(function($) {
            $('form#process').submit(function(e){
                e.preventDefault();
                makeAjaxRequest();
                return false;
            });

            function makeAjaxRequest(){
                $.ajax({
                    url: '<?php echo base_url();?>search/get_result_quotation',
                    type: 'get',
                    data: {name: $('input#search').val()},
                    success: function(response) {
                       $('table#resultTable tbody').html(response);
                    }
                });
            }
      }); 
    </script>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
            $('form#process_company').submit(function(e){
                e.preventDefault();
                makeAjaxRequest();
                return false;
            });

            function makeAjaxRequest(){
                $.ajax({
                    url: '<?php echo base_url();?>search/get_result_company',
                    type: 'get',
                    data: {name: $('input#search').val()},
                    success: function(response) {
                       $('table#resultTable tbody').html(response);
                    }
                });
            }
      }); 
    </script>
    
    <script type="text/javascript">
      jQuery(document).ready(function($) {
            $('form#process_sr').submit(function(e){
                e.preventDefault();
                makeAjaxRequest();
                return false;
            });

            function makeAjaxRequest(){
                $.ajax({
                    url: '<?php echo base_url();?>search/get_result_sr',
                    type: 'get',
                    data: {name: $('input#search').val()},
                    success: function(response) {
                       $('table#resultTable tbody').html(response);
                    }
                });
            }
      }); 
    </script>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
            $('form#process_invoice').submit(function(e){
                e.preventDefault();
                makeAjaxRequest();
                return false;
            });

            function makeAjaxRequest(){
                $.ajax({
                    url: '<?php echo base_url();?>search/get_result_invoice',
                    type: 'get',
                    data: {name: $('input#search').val()},
                    success: function(response) {
                       $('table#resultTable tbody').html(response);
                    }
                });
            }
      }); 
    </script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/spin.js"></script>
<script>
$(document).ready(function() {
    $('#submitbtn').click(function(e) {
        var isValid = true;
        $('input[type="text"].required, textarea').each(function() {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid #e53935",
                    "background": "#ffebee",
                    "color":"#000"
                });
              $(this).attr("placeholder", "empty").addClass('empty1');
            }
            else {
                $(this).css({
                    "border": "",
                    "background": ""
                });
            }
        });
        if (isValid == false) 
            e.preventDefault();
        else 
                    $("#loading").fadeIn();
                var opts = {
                    lines: 12, // The number of lines to draw
                    length: 7, // The length of each line
                    width: 4, // The line thickness
                    radius: 10, // The radius of the inner circle
                    color: '#fff', // #rgb or #rrggbb
                    speed: 1, // Rounds per second
                    trail: 60, // Afterglow percentage
                    shadow: false, // Whether to render a shadow
                    hwaccel: false // Whether to use hardware acceleration
                };
                var target = document.getElementById('loading');
                var spinner = new Spinner(opts).spin(target);
    });
});
</script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>

   <script>
    $(document).ready(function(){
      $("#sn").keyup(function(){
            if($("#sn").val().length >= 1)
            {
             $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>description/check_sn",
                data: "name="+$("#sn").val(),
                success: function(msg)
                {
                    if(msg=="true")
                    {
                        $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>assets/img/yes.png')" });
                    }
                    else
                    {
                        $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>assets/img/no.png')" });
                    }
                }
             });
         
            }
             else 
            {
                $("#usr_verify").css({ "background-image": "none" });
            }
        });
      });
    </script>

<!--   short pooling sample
<script>
  $(function() {
    setInterval(function() {
        $.ajax({
            type: "GET",

            url: "<?php echo base_url();?>quotation/new_quotation",
            success: function(html) {
                 // html is a string of all output of the server script.
                $("#element").html(html).fadeOut(9500);
           }

        })
    }, 1000);
});
</script>
-->
<script>

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  var barChartData = {
    labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
    datasets : [
      {
        fillColor : "rgba(220,220,220,0.5)",
        strokeColor : "rgba(220,220,220,0.8)",
        highlightFill: "rgba(220,220,220,0.75)",
        highlightStroke: "rgba(220,220,220,1)",
        <?php foreach ($jan_reject as $value) { $jan =  $value->total; } ?>
        <?php foreach ($feb_reject as $value) { $feb =  $value->total; } ?>
        <?php foreach ($march_reject as $value) { $march =  $value->total; } ?>
        <?php foreach ($april_reject as $value) { $april =  $value->total; } ?>
        <?php foreach ($may_reject as $value) { $may =  $value->total; } ?>
        <?php foreach ($jun_reject as $value) { $jun =  $value->total; } ?>
        <?php foreach ($july_reject as $value) { $july =  $value->total; } ?>
        <?php foreach ($aug_reject as $value) { $aug =  $value->total; } ?>
        <?php foreach ($sept_reject as $value) { $sept =  $value->total; } ?>
        <?php foreach ($oct_reject as $value) { $oct =  $value->total; } ?>
        <?php foreach ($nov_reject as $value) { $nov =  $value->total; } ?>
        <?php foreach ($dec_reject as $value) { $dec =  $value->total; } ?>
        
        data: [<?php echo $jan; ?>,<?php echo $feb; ?>, <?php echo $march; ?>, <?php echo $april; ?>, <?php echo $may; ?>, <?php echo $jun; ?>, <?php echo $july; ?>,<?php echo $aug; ?>,<?php echo $sept; ?>,<?php echo $oct; ?>,<?php echo $nov; ?>, <?php echo $dec; ?>]
 
      },

    
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        <?php foreach ($jan_aprov as $value) { $jan =  $value->total; } ?>
        <?php foreach ($feb_aprov as $value) { $feb =  $value->total; } ?>
        <?php foreach ($march_aprov as $value) { $march =  $value->total; } ?>
        <?php foreach ($april_aprov as $value) { $april =  $value->total; } ?>
        <?php foreach ($may_aprov as $value) { $may =  $value->total; } ?>
        <?php foreach ($jun_aprov as $value) { $jun =  $value->total; } ?>
        <?php foreach ($july_aprov as $value) { $july =  $value->total; } ?>
        <?php foreach ($aug_aprov as $value) { $aug =  $value->total; } ?>
        <?php foreach ($sept_aprov as $value) { $sept =  $value->total; } ?>
        <?php foreach ($oct_aprov as $value) { $oct =  $value->total; } ?>
        <?php foreach ($nov_aprov as $value) { $nov =  $value->total; } ?>
        <?php foreach ($dec_aprov as $value) { $dec =  $value->total; } ?>


        data: [<?php echo $jan; ?>,<?php echo $feb; ?>, <?php echo $march; ?>, <?php echo $april; ?>, <?php echo $may; ?>, <?php echo $jun; ?>, <?php echo $july; ?>,<?php echo $aug; ?>,<?php echo $sept; ?>,<?php echo $oct; ?>,<?php echo $nov; ?>, <?php echo $dec; ?>]
 
      }
    ]
  }
  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : true
    });
  }
  </script>


<script>
  $(document).on('click', '#run', function(e) {
    e.preventDefault();
    $('#simple-example-table').stacktable({hideOriginal:true});
    $(this).replaceWith('<span>ran</span>');
  });
   $('#responsive-example-table').stacktable({myClass:'stacktable small-only'});
   $('#card-table').cardtable({myClass:'stacktable small-only' });
   $('#agenda-example').stackcolumns({myClass:'stacktable small-only' });
</script>

  </body>
</html>