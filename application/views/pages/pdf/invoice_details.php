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
        h2{
        text-align:right;
        margin-top:17px;  
        position: absolute;
        color:red;
        font-size:17px; 
    }
       h6{
        text-align:right;
        margin-top:34px;  
        position: absolute;
        color:red;
        font-size:17px; 
    }


</style>
  <?php if(!empty($quote_details) ) {foreach($quote_details as $details): ?>  
          <h4>INVOICE #:&nbsp;&nbsp;<?php echo $details->invoice_id;?></h4>
          <h2>QUOTATION #:&nbsp;&nbsp;<?php echo $details->quotation_id;?></h2> 
           <h6>SERVICE REPORT #:&nbsp;&nbsp;<?php echo $details->service_report_id;?></h6> 
    
        <span><b>Company name:</b>&nbsp;&nbsp;<?php echo $details->company_name;?></span><br>
        <span><b>Address:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->address;?></span><br>
        <span><b>Contact #:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->tel_num;?></span><br>
        <span><b>Fax #:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->fax_num;?></span><br><br><br>

        <span><b>Date:</b>&nbsp;&nbsp;<?php echo $details->date_of_quote ?></span><br>
        <span><b>Terms:</b>&nbsp;&nbsp;<?php echo $details->term_payment ?>&nbsp;days</span><br>
        <span><b>Job Description:&nbsp;&nbsp;<?php echo $details->job_description ?></b></span><br>
         <span><b>Sales Executive:&nbsp;&nbsp;<?php echo $details->sales_exe ?></b></span>

    <table cellspacing="0" style="text-align: center; font-size: 9pt; padding:1px; border-collapse: collapse;">
     <tbody>
    <tr>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">SN / CODE</th>
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


 <table cellspacing="0" style="width: 100%;text-align: center; font-size: 9pt;padding:4px;margin-top:-6px;margin-left:90px;border-collapse: collapse;">
        <?php foreach($total as $quotation_subtotal) : ?>  
        <tr style="font-size: 8pt;">
        <td style="width: 8%; border: none;">&nbsp;</td>
        <td style="width: 59%; border: none;">&nbsp;</td>
        <td style="background-color:#e9e6e6; width: 0%; height:1px;border: solid 1px black;font-weight:bold;font-size:10pt;font-style:italic;border-collapse: collapse;"><b>SUB TOTAL</b></td>
        <td style="background-color:#e9e6e6; width: 10%; border: solid 1px black;font-size:10pt;font-style:italic;border-collapse: collapse;"><b><?php echo number_format($quotation_subtotal->sub_total, 2) ?></b></td>
        </tr>
        <?php endforeach; ?>    
        <tr>
        <td colspan="2" align="left">
        <span style="font-size: 8pt; font-weight: normal;">
        </span>
        </td>
        <td style="background-color:#e9e6e6; border: solid 1px black;font-weight:bold;font-size:10pt;font-style:italic; " align="center"><b>7% GST</b></td>
        <td style="background-color:#e9e6e6; border: solid 1px black;font-weight:bold;font-size:10pt;font-style:italic; " align="center"><b><?php echo number_format($quotation_subtotal->gst_total, 2) ?></b></td>
        </tr>
        <tr>
        <td colspan="2" align="left">
        <span style="font-size: 8pt; font-weight: normal;">
        </span>
        </td>
        <td style="background-color:#ccc; border: solid 1px black;font-weight:bold;  font-size:13px;" align="center"><b>TOTAL SGD</b></td>
        <td style="background-color:#ccc; border: solid 1px black;font-size:13px;" align="center"><b><?php echo number_format($quotation_subtotal->grand_total, 2) ?></b></td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;</td>
        </tr>
        </table>

    <table cellspacing="0" style=" text-align:left; font-size:8pt;padding:4px;border-collapse:collapse;margin-top:-135px;">
        <tr><td>NOTE:</td></tr>
        <tr><td>1. All Cheque should be crossed and made payable to "&nbsp;<strong>F & L REINSTATEMENT PTE LTD</strong>&nbsp;"</td></tr>
        <tr><td>2. The company reserved the right to charge interest on amount outstanding after due date.</td></tr>
       </table>

    <nobreak>
    <table cellspacing="0" style="width: 90%; border: none; text-align: center; font-size: 9pt;">
        <tr>
        <td style="width: 60%; text-align: left;">
        <span style="font-size: 10px; font-weight: normal;">
       
        </span>
        </td>
        <td style="text-align: left;">
        <span style="font-size: 10px; font-weight: normal;">
        <b>For <strong>F & L REINSTATEMENT PTE LTD</strong></b>
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
            
        </td>
        <td style="text-align: left;">
            _________________________________
        </td>
        </tr>
    </table>
    </nobreak>


    <?php endforeach; }?>
    