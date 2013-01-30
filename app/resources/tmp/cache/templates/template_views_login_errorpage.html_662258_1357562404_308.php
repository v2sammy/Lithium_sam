<h2> Oops! Something went wrong. Try again. </h2>
<?php echo $this->form->create(null,array('url' => '/', 'action' => 'validatelogin')); ?>
    <?php echo $this->form->field('email'); ?>
    <?php echo $this->form->field('password',array('type'=>'password')); ?>
    <?php echo $this->form->submit('login'); ?>
<?php echo $this->form->end(); ?>
