<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<legend> <div style="color : #58ACFA !important;">Login </div></legend>
<?= $this->form->create(null,array('action'=>'/','class'=>'form-horizontal')); ?>


<div class="control-group" style="margin-left:-50px">
<label class="control-label" for="inputEmail" style="margin-right:10px">Email</label>
<?= $this->form->email('email',array('id' => 'txtemail','class'=>'input-large','autocomplete' => 'off')); ?>
</div>
<div class="control-group" style="margin-left:-50px">
<label class="control-label" for="inputEmail" style="margin-right:10px">Password</label>
<?= $this->form->password('password',array('type' => 'password','id' => 'txtpassword','class' => 'input-medium')); ?>
</div>
<?= $this->form->button('Login',array('style'=>'margin-left: 285px; margin-top:-91px','class' => 'btn btn-primary' ,'onclick' => 'if(!validateLogin())
{
	$("#alertBox").css("display","block").hide().fadeIn(200);
	$("#alertBox").html("User fields cannot be empty.");
	return false;
}
else{
	return true;
}
')); ?>
<a href="/forgot" style="margin-left : 270px;">Forgot Password</a>
<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<center>
<?php 
session_start();
use lithium\storage\Session; 
if(isset($_SESSION['loginFailed']) && $_SESSION['loginFailed'] == 1)
{
  echo '<div id="alertBox" class="alert alert-danger" style="display: block;">Login Failed</div>';
  $_SESSION['count'] += 1;
  if($_SESSION['count'] > 2)
  {
       echo "<div id='captcha'>";
       $publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
       echo recaptcha_get_html($publickey);
       echo "</div><br/>";
  }
}

?>
</center>
<?= $this->form->end(); ?>


</div> <!-- end wrapper div -->
