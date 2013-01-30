<h4> Welcome To Registartion Form </h4>
<a href="/sessions" style="float:right;">Login  </a> 



<?php echo $this->form->create(); ?>

<?php echo $this->form->field('first name',array('id' => 'txtfname')); ?>
<div id="fnamealertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('last name',array('id' => 'txtlname')); ?>
<div id="lnamealertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('email',array('id' => 'txtemail')); ?>
<div id="emailalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('password',array('type' => 'password','id' => 'txtpassword')); ?>
<div id="passwordalertBox" class="alert alert-danger" style="display: none;"></div>

<?//= $this->form->field('confirm password',array('type' => 'password','id' => 'txtcpass'));<div id="cpasswordalertBox" class="alert alert-danger" style="display: none;"></div> ?>


<?php echo $this->form->field('contact no',array('id' => 'txtcontactno')); ?>
<div id="contactnoalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('location',array('id' => 'txtlocation')); ?>
<div id="locationalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('status',array('id' => 'txtstatus')); ?>

<p><?php echo $this->form->button('Register',array('onclick' => 'if(validateRegisterPage())
{
	return true;
}
else{
	return false;
}
')); ?></p>



<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?php echo $this->form->end(); ?>

