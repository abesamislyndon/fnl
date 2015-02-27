				<footer></footer>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/morris.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom-scripts.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/js/jquery-ui-1.10.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
  <link type="text/css" href="<?php echo base_url(); ?>assets/css/css/jquery-ui-1.10.4.css" rel="stylesheet">
 
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
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
            
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>



</body>
</html>