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
        text-align:center;
        margin:0px;
        font-style: italic; 
    }
    
    h6{
        text-align:left;
        margin:0px;
    }
       
    h4{
        text-align:right;
        margin-top:0px;  
        position: absolute;
        color:red;
    }

</style>

<div>
<h6>From:&nbsp;&nbsp;&nbsp; <?php echo date("d-m-Y", strtotime($from));?>&nbsp;&nbsp;&nbsp; To&nbsp;&nbsp;&nbsp; <?php echo date("d-m-Y", strtotime($to)); ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; REJECTED QUOTATION</h6>
</div>

<table cellspacing="0" style="width: 0%; border: none; text-align: center; font-size: 9pt; padding:4px;margin-left:-25px;">
        <thead>
        <tr>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">QUOTATION ID</th>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">DATE</th>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">COMPANY NAME</th>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">ADDRESS</th>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">TEL #</th>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">JOB DESCRIPTION</th>
            <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">TOTAL</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($result) ) {
               foreach($result as $details): ?>  
            <tr>
             <td style="width: 10px; border: solid 1px #000;"><?php echo $details->quotation_id ?></td>
             <td style="width: 60px; border: solid 1px #000;"><?php echo date("d-m-Y", strtotime($details->date_of_quote)); ?></td>
             <td style="width: 90px; border: solid 1px #000;"><?php echo $details->company_name ?></td>
             <td style="width: 90px; border: solid 1px #000;"><?php echo $details->address ?></td>
             <td style="width: 30px; border: solid 1px #000;"><?php echo $details->tel_num ?></td>
             <td style="width: 160px; border: solid 1px #000;"><?php echo $details->job_description ?></td>
              <td style="width: 20px; border: solid 1px #000;font-weight:bold;color:red;font-size:12px;font-style:italic;text-align:center;"><?php echo $details->grand_total ?></td>
            </tr>
             <?php endforeach; }?>
        </tbody>
     
    </table>
    