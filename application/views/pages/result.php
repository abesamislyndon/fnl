<table>
<?php foreach ($res as  $value) {?>

 	<td><?php echo $value->quotation_id; ?></td>
 	<td><?php echo $value->date_of_quote; ?></td>
 	<td><?php echo $value->company_name; ?></td>
 	<td><?php echo $value->address; ?></td>
 	<td><?php echo $value->tel_num; ?></td>
 	<td><?php echo $value->job_description; ?></td>
 	<td><?php echo $value->grand_total; ?></td>
   <td><a href = "<?php echo base_url();?>create_pdf/print_pending_quotation/<?php echo $value->quotation_id ?>" class = "link_button" target = "_blank"><i class="fa fa-print"></i></a></td>
 <?php }?></table>

