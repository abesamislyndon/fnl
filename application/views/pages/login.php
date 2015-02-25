<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>SUPPLY CHAIN</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <?php echo link_tag('assets/css/templatemo_main.css'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<script type="text/javascript">
$(document).ready(function() {
  $(".username").focus(function() {
    $(".user-icon").css("left","48px");
  });
  $(".username").blur(function() {
    $(".user-icon").css("left","-48px");
  });
  
  $(".password").focus(function() {
    $(".pass-icon").css("left","48px");
  });
  $(".password").blur(function() {
    $(".pass-icon").css("left","-48px");
  });
});
</script>
<style>
  .notice{
    background:#f44336;
    padding:20px;
    text-align: center;
    font-size:24px;
    color:#fff;   
}
</style>
  
  </head>
 <body>
<?php
  if (!$sock = @fsockopen('www.google.com', 80, $num, $error,5)) {
      echo '<p class = "notice"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;you are offline kindly check your connection</p>';
  }
  else{
    echo '';
  }
?>
<div id="wrapper">    

<div class="user-icon"></div>
<div class="pass-icon"></div>

<form class="login-form" action="<?php echo base_url()?>verifylogin" method="post">
    <div class="header">
    <h5>&nbsp;&nbsp;PROJECT MANAGEMENT SYSTEM</h5><!--END TITLE-->
    <p><?php echo validation_errors(); ?></p>        
    </div>

    <div class="content">
     <input name="username" type="text" class="input username" value="Username" onfocus="this.value=''" /><!--END USERNAME-->
     <input name="password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
 
    <div class="footer">
    <input type="submit" name="login" value="LOGIN" class="button" />
    </div>
</form>
<span class = "login-span">F & L REINSTATEMENT PTE LTD</span>
</div>
<div class="gradient"></div>

</body>
</html>