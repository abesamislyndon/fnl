				<footer></footer>
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
 
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
    $(document).ready(function(){
     $('confirm.div').hide();
      <?php if($this->session->flashdata('msg')){ ?>
      $('.confirm-div').html('<?php echo "<p "."&nbsp;&nbsp;&nbsp;".$this->session->flashdata('msg');"</p>" ?>').fadeIn( "slow").fadeOut(4500);
      });
      <?php } ?>
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
  </body>
</html>