


<?php echo $this->form->create(); ?>

<?php echo $this->form->field('old password',array('type' => 'password','id' => 'txtopassword')); ?>
<div id="opasswordalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field(' new password',array('type' => 'password','id' => 'txtnpassword')); ?>
<div id="npasswordalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('confirm password',array('type' => 'password','id' => 'txtcpassword')); ?>
<div id="cpasswordalertBox" class="alert alert-danger" style="display: none;"></div>

<p><?php echo $this->form->button('Update',array('onclick' => 'if(validateRegisterPage())
{
	return true;
}
else{
	return false;
}
')); ?></p>



<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?php echo $this->form->end(); ?>

