<style>
    label{
        color:red;
        font-weight: bold;
    }

    table{
        margin-top:20px;
        border-collapse: collapse !important; 
        word-wrap: break-word;
        table-layout: fixed; 
    }
    td{
       padding:8px;
    }
    tr{
        border-collapse: collapse !important;
    }
    th{
        padding:5px 8px;
        text-align: center;
        background:#ccc;
        border-collapse: collapse;
        border: none;
    }
    hr{
        border:1px solid #000; 
    }
    span{
        margin-left:0px;
    }
    p{
        text-align: center;
        margin:8px; 
    }
    h3{
        text-align: center;
        margin: 0px;
        font-size:26px;
    }
    h5{
        text-align: center;
        margin:0px;
        font-style: italic; 
    }
    h4{
        text-align:right;
        margin-top:0px;  
        position: absolute;
        color:red;
    }


</style>
  <?php 
     if(!empty($quote_details) ) {
     foreach($quote_details as $details): ?>  
    <h4>QUOTATION:&nbsp;&nbsp;<?php echo $details->quotation_id;?></h4>
    <h4>QUOTATION:&nbsp;&nbsp;<?php echo $details->jobwork_id;?></h4> 
    <span><b>Company name:</b>&nbsp;&nbsp;<?php echo $details->company_name;?></span><br>
    <span><b>Address:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->address;?></span><br>
    <span><b>Contact #:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->tel_num;?></span><br>
    <span><b>Fax #:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->fax_num;?></span><br><br><br>

    <span><b>Date:</b>&nbsp;&nbsp;<?php echo $details->date_of_quote ?></span><br>
    <span><b>Terms:</b>&nbsp;&nbsp;<?php echo $details->term_payment ?>&nbsp;days</span><br>
    <span><b>Job Description:&nbsp;&nbsp;<?php echo $details->job_description ?></b></span>

    <table cellspacing="0" style="text-align: center; font-size: 9pt; padding:1px; border-collapse: collapse;">
     <tbody>
    <tr>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">S/No</th>
        <th style="width:40%;border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">DESCRIPTION</th>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">QUANTITY</th>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">UOM</th>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">UNIT PRICE</th>
        <th style="width:13%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">AMOUNT</th>
    </tr>
      
       <?php foreach($sub_desc as $sub_details): ?>
         <tr>
            <td style=" border: solid 1px black; font-style:italic;border-collapse: collapse;"><?php echo $details->sn ?></td>
            <td style="width:350px;height:120px;border: solid 1px black;font-style:italic;border-collapse: collapse; text-align:left;">SCOPE OF WORK:<br><br><?php echo $sub_details->sub_description ?></td>
            <td style=" border: solid 1px black;font-style:italic;border-collapse: collapse;"><?php echo $sub_details->quantity ?></td>
            <td style=" border: solid 1px black; font-style:italic;border-collapse: collapse;"><?php echo $sub_details->uom ?></td>
            <td style=" border: solid 1px black; font-style:italic;border-collapse: collapse;"><?php echo $sub_details->unit_price ?></td>
            <td style=" border: solid 1px black;font-style:italic;border-collapse: collapse;"><?php echo $sub_details->amount?></td> 
          </tr>  
        <?php endforeach; ?>
        </tbody>
    </table>

    <table cellspacing="0" style=" text-align:left; font-size:8pt;padding:4px;border-collapse:collapse;">
        <tr><td>TERMS AND CONDITION:</td></tr>
        <tr><td>1. Any Variation or Additional work contrary to the above quoted shall be quoted and charge separately:</td></tr>
        <tr><td>2. Quotation valid period 7 days</td></tr>
        <tr><td>3. All invoiced payment shall be duly paid according to terms of payment from the date of invoice and delays in remitl payment may render works being interrupted site and /or permature termination of this contract</td></tr>
        <tr><td>4. Deposit / downpayments are not refundable in the event of cacellation of the contract by the buyer / owner</td></tr>
        <tr><td>5. Any parts of works remaining unpaid remains the property of F&L Reinstatement Pte Ltd</td></tr>
        <tr><td>6. No retention. Full payment upon completion</td></tr>
        <tr><td>7. The contractor have the right not to carry out any works not mentioned on the quote.</td></tr>
        <tr><td>8. All works shall be carried out only during nirmal office hours unless specified.</td></tr>
        <tr><td>9. Rate is only valid till our supplier next price revision, without prior notice to us.</td></tr>
    </table>

    <nobreak>
    <table cellspacing="0" style="width: 90%; border: none; text-align: center; font-size: 9pt;">
        <tr>
        <td style="width: 60%; text-align: left;">
        <span style="font-size: 10px; font-weight: normal;">
        <b>Your Sincerely,</b> 
        </span>
        </td>
        <td style="text-align: left;">
        <span style="font-size: 10px; font-weight: normal;">
        <b>Confirmed and Accepted by</b>
        </span>
        </td>
        </tr>
     
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
        <td style="text-align: left;">
            _________________________________
        </td>
        <td style="text-align: left;">
            _________________________________
        </td>
        </tr>
    </table>
    </nobreak>


    <?php endforeach; }?>
    