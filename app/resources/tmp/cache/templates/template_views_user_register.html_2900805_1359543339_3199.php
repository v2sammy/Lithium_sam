<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:50px">
<legend> <div style="color : #58ACFA !important;">Register</div></legend>
<?php if($_SESSION['tempuserEmail'] == null || $_SESSION['tempuserEmail'] == ""){ ?>
<?php 
if($isRegistered == '1')
{?>
   <div id="alertBox" class="wrapper well alert-success" style="display: block"><center> Thank you for Registering with Youdyog. Please <strong> <a href="/login">Click here</a></strong> to continue.</center></div>
<?php } else {?>
	<div id="alertBox" class="wrapper well alert-danger" style="display: block"><center><strong> Oops! </strong> The URL seems to be broken.</center></div>
<?php }} 
else  {
?>

<?php echo $this->form->create(); ?>
<center>
<label>First Name
<?php echo $this->form->text('first_name',array('class'=>'input-large','id' => 'txtfname','placeholder'=>'', 'autocomplete' => 'off')); ?>
<div id="fnamealertBox" class="alert alert-danger" style="display: none;"></div>
</label>
<label>Last Name
<?php echo $this->form->text('last_name',array('class'=>'input-large','id' => 'txtlname' ,'placeholder'=>'' , 'autocomplete' => 'off')); ?>
<div id="lnamealertBox" class="alert alert-danger" style="display: none;"></div>
</label>

<div style="margin-left:35px">
<label>Email
<?php echo $this->form->text('email',array('class'=>'input-large','type' =>'email' ,'id' => 'txtemail' , 'autocomplete' => 'off','value'=>$_SESSION['tempuserEmail'],'readonly'=>'readonly')); ?>
<div id="emailalertBox" class="alert alert-danger" style="display: none;"></div>
</label>
</div>

<div style="margin-left:5px">
<label>Password
<?php echo $this->form->password('password',array('class'=>'input-large','type' => 'password','id' => 'password' ,'name'=>'password', 'onCopy' => 'return false', 'onPaste' => 'return false',
'onblur'=>'passwordStrength(this.value,document.getElementById("strendth"),document.getElementById("passError"))')); ?>
</label>
<span id="passError"></span><span id="strendth"></span>
</div>

<div style="margin-left:-50px">
<div id="passwordalertBox" class="alert alert-danger"," style="display: none;"></div>
<label >Confirm Password
<input type="password" id="txtcpass" onblur="comp_pass();" onCopy="return false" onPaste="return false" />
<div id="cpasswordalertBox" class="alert alert-danger" style="display: none;"></div>
</label>
</div>

<div style="margin-left:-5px">
<label>Contact No: 
<?php echo $this->form->text('contact no',array('placeholder'=>'Optional' ,'class'=>'input-large','id' => 'txtcontactno', 'autocomplete' => 'off')); ?>
<!-- <div id="contactnoalertBox" class="alert alert-danger" style="display: none;"></div>  -->
</label>
</div>

<div style="margin-left:15px">
<label>Location
<?php echo $this->form->text('location',array('placeholder'=>'Optional','class'=>'input-large','id' => 'txtlocation', 'autocomplete' => 'off')); ?>
<div id="locationalertBox" class="alert alert-danger" style="display: none;"></div>
</label>
</div>

<p><?php echo $this->form->button('Register',array('class' => 'btn btn-primary','onclick' => 'if(validateRegisterPage())
{
	return true;
}
else{
	return false;
}
')); ?></p>
</center>
<div id="alertBox" class="alert alert-danger" style="display: none;"></div>


<?php echo $this->form->end(); ?>
<?php } ?>

</div>