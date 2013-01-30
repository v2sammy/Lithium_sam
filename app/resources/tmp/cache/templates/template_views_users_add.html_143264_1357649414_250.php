 <h2>Add user</h2>
    <?php echo $this->form->create($user); ?>
        <?php echo $this->form->field('email'); ?>
        <?php echo $this->form->field('password', array('type' => 'password')); ?>
        <?php echo $this->form->submit('SignUp'); ?>
    <?php echo $this->form->end(); ?>
