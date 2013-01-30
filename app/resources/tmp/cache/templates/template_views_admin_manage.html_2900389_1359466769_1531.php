<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<legend><div style="color : #58ACFA !important;"> Manage Roles</div></legend>
<?php echo $this->form->create(); ?>
<span class="label label-info" style="margin-left:15px">Set User Roles</span>
<?php echo $this->form->select('roles',array('Admin','Member','Partner','Provider')); ?>

<div class="control-group" style="margin-Right:10px; margin-top:10px">

<span class="label label-info" style="margin-left:15px">Referrer Email</span>
<?php echo $this->form->email('referal_email',array('id' => 'txtrefemail','autocomplete' => 'off')); ?>
<div id="refemailalertBox" class="alert alert-danger" style="display: none;"></div>
</div>

<div class="control-group" style="margin-left:0px">
<span class="label label-info" style="margin-left:15px">Referral Email</span>
<?php echo $this->form->email('email',array('id' => 'txtuseremail','autocomplete' => 'off')); ?>
<div style="margin-left:150px">
<p><?php echo $this->form->button('Add User',array('class' => 'btn btn-primary')); ?></p>
</div>
<?php echo $this->form->end(); ?>

<?php 
//if($_SESSION['tempuserEmail'] == null || $_SESSION['tempuserEmail'] == "")
//{ 
  if(isset($_POST['email']))
  {
	if($msg != 'success') {
?>

<div id="alertBox" class="wrapper well alert-danger" style="display: block"><center> Error Login <?php echo $h($msg); ?></center></div>
   
<?php } else {?>
	<div id="alertBox" class="wrapper well alert-success" style="display: block"><center> Success: <?php echo $h($random); ?> to continue.</center></div>
<?php 
	  }
  }
//} 
?>
</div>





 




