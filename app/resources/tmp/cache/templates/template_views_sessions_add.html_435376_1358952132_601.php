<?php 

use lithium\storage\Session; 

if($_SESSION['loginFailed'] == 1){
?>
<div id="alertBox" class="alert alert-danger" style="display: block;">Login Failed</div>
<?php
}

?>
<h3>Welcome To Login Form</h3>

<?php echo $this->form->create(); ?>
<?php echo $this->form->field('email',array('id' => 'txtemail')); ?>
<?php echo $this->form->field('password',array('type' => 'password','id' => 'txtpassword')); ?>

<p><?php echo $this->form->submit('Login'); ?></p>
<p><a href="registration"><i>New User Click Here</i></a></p>

<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?php echo $this->form->end(); ?>
