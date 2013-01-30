<h3>Welcome To Admin Configuration Page</h3>

<?php echo $this->form->create(); ?>

<?php echo $this->form->field('referral email ',array('type' => 'email','id' => 'txtrefemail')); ?>
<div id="refemailalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('user email',array('type' =>'email', 'id' => 'txtuseremail')); ?>
<div id="useremailalertBox" class="alert alert-danger" style="display: none;"></div>

<p><?php echo $this->form->button('Add User',array('onclick' => 'if(validateRegisterPage())
{
	return true;
}
else{
	return false;
}
')); ?></p>



<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?php echo $this->form->end(); ?>


 




