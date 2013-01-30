<h3>Welcome To Admin Configuration Page</h3>

<?php echo $this->form->create(); ?>

<?php echo $this->form->field('referal_email',array('id' => 'txtrefemail')); ?>
<div id="refemailalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->field('email',array('id' => 'txtuseremail')); ?>
<div id="useremailalertBox" class="alert alert-danger" style="display: none;"></div>

<?php echo $this->form->button('submit user',array('id'=>'submit_user','onclick' => 'validateReferralPage()')); ?>




<div id="alertBox" class="alert alert-danger" style="display: none;"></div>
<?php echo $this->form->end(); ?>


 




