<style>
    label{
        color:red;
        font-weight: bold;
    }
    span{
        font-weight: normal;
        margin-left:10px;
    }
</style>
  <?php 
     if(!empty($quote_details) ) {
     foreach($quote_details as $details): ?>  

        <label for="company">Company name:&nbsp;</label>
        <span><?php echo $details->company_name;?></span><br>

        <label for="company">Address:</label>
        <span><?php echo $details->address;?></span><br>

        <label for="company">Contact #:&nbsp;</label>
        <span><?php echo $details->tel_num;?></span><br>

        <label for="company">Fax #:&nbsp;</label>
        <span><?php echo $details->fax_num;?></span>


    <?php endforeach; }?>
    