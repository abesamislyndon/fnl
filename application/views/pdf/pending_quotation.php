<table cellspacing="0" style="width: 0%; border: none; text-align: center; font-size: 9pt; padding:4px;margin-left:-25px;">
            <?php 
             if(!empty($quote_details) ) {
               foreach($quote_details as $details): ?>  
            <tr style="border: solid 1px black;">
             <td style="width: 160px; border: solid 1px #000;"><?php echo $details->job_description?></td>
            </tr>
             <?php endforeach; }?>
     
    </table>
    
