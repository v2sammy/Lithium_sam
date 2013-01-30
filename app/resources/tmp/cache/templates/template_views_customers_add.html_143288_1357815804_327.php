<?php echo $this->form->create($customer); ?>
<?php echo $this->form->field('first_name'); ?>
<?php echo $this->form->field('last_name'); ?>
<?php echo $this->form->field('username'); ?>
<?php echo $this->form->field('email'); ?>
<?php echo $this->form->field('password',array('type' => 'password')); ?>
<?php echo $this->form->submit('SignUp'); ?>
<?php echo $this->form->end(); ?>
