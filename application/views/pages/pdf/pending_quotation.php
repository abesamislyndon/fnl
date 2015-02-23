<table cellspacing="0" style="width: 0%; border: none; text-align: center; font-size: 9pt; padding:4px;margin-left:-25px;">
  <?php 
     if(!empty($quote_details) ) {
     foreach($quote_details as $details): ?>  
        <tr>
          <td style="width:20%; ">DATE:</td>
          <td colspan="3"><?php echo $item5->date_of_quote?></td>
       </tr>
    <?php endforeach; }?>
</table>
    