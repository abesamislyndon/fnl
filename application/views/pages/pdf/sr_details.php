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


</style>
  <?php 
     if(!empty($quote_details) ) {
     foreach($quote_details as $details): ?>  
    <h4>SERVICE REPORT #:&nbsp;&nbsp;<?php echo $details->service_report_id;?></h4>
    <h2>QUOTATION #:&nbsp;&nbsp;<?php echo $details->quotation_id;?></h2> 

    <span><b>Company name:</b>&nbsp;&nbsp;<?php echo $details->company_name;?></span><br>
    <span><b>Address:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->address;?></span><br>
    <span><b>Contact #:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->tel_num;?></span><br>
    <span><b>Fax #:&nbsp;</b>&nbsp;&nbsp;<?php echo $details->fax_num;?></span><br><br><br>

    <span><b>Date:</b>&nbsp;&nbsp;<?php $today = date("d M Y ");echo $today;?></span><br>
    <span><b>Terms:</b>&nbsp;&nbsp;<?php echo $details->term_payment ?>&nbsp;days</span><br>
    <span><b>Job Description:&nbsp;&nbsp;<?php echo $details->job_description ?></b></span><br>
    <span><b>Sales Representative:&nbsp;&nbsp;<?php echo $details->sales_exe ?></b></span>

    <table cellspacing="0" style="text-align: center; font-size: 9pt; padding:1px; border-collapse: collapse;">
     <tbody>
    <tr>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">SN / CODE</th>
        <th style="width:40%;border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">DESCRIPTION</th>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">QUANTITY</th>
        <th style="width:9%; border: solid 1px black;font-weight:bold; font-style:italic;border-collapse: collapse;">UOM</th>
    </tr>
      
       <?php foreach($sub_desc as $sub_details): ?>
         <tr>
            <td style=" border: solid 1px black; font-style:italic;border-collapse: collapse;"><?php echo $details->sn ?></td>
            <td style="width:505px;height:120px;border: solid 1px black;font-style:italic;border-collapse: collapse; text-align:left;">SCOPE OF WORK:<br><br><?php echo $sub_details->sub_description ?></td>
            <td style=" border: solid 1px black;font-style:italic;border-collapse: collapse;"><?php echo $sub_details->quantity ?></td>
            <td style=" border: solid 1px black; font-style:italic;border-collapse: collapse;"><?php echo $sub_details->uom ?></td>
          </tr>  
        <?php endforeach; ?>
        </tbody>
    </table>

    <nobreak>
    <table cellspacing="0" style="width: 90%; border: none; text-align: center; font-size: 9pt;">
        <tr>
        <td style="width: 60%; text-align: left;">
        <span style="font-size: 10px; font-weight: normal;">
        <b>Certified Job Completed Satisfactorily:</b> 
        </span>
        </td>
        <td style="text-align: left;">
        <span style="font-size: 10px; font-weight: normal;">
        <b>Jobe Done by:</b>
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
            _________________________________ <br><br>
            Company Chop and Signature
        </td>
        <td style="text-align: left;">
            _________________________________<br><br>
            For - F & L REINSTATEMENT PTE LTD
        </td>
        </tr>
    </table>
    </nobreak>


    <?php endforeach; }?>
    