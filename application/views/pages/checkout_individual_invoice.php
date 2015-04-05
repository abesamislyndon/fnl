<div id="page-wrapper" >
   <div id="page-inner">
     <div class="row">
        <div class="col-lg-12">
   			<div class="checkout_style">
   				<div class="result_checkout">
   					<h3>SUCCESSFULLY CHECKOUT</h3>
   					 <?php foreach($quotation_list_individual as $individual):?>
   					<ul>
   						<li><span class = "print1">SERVICE REPORT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href = "<?php echo base_url();?>create_pdf/service_report/<?php echo $individual->quotation_id ?>" class = "print" target = "_blank"><i class="fa fa-print"></i></a></li>
   						<li><span class = "print1">INVOICE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href = "<?php echo base_url();?>create_pdf/invoice_details/<?php echo $individual->quotation_id ?>" class = "print" target = "_blank"><i class="fa fa-print"></i></a></li>
   					</ul>	
   				<?php endforeach; ?>
   				</div>
   			</div>
        </div><!--end of column 12-->
     </div><!--end of row-->
   </div><!-- end of page inner-->
</div><!--end of page-wrapper-->


