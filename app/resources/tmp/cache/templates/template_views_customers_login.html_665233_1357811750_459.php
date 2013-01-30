<script>
console.log(</script><?php echo $_SESSION['username']; ?><script>);
</script>

<?php echo $this->form->create(); ?>
<?php echo $this->form->field('username',array("id" => "username")); ?>
<?php echo $this->form->field('password',array('type' => 'password','id' => 'password')); ?>
<?php echo $this->form->submit('Login',array('onclick' => 'validateLogin();return false;')); ?>
<br><br>
<div id="errorAlert" class="alert alert-danger" style=""> </div>
<?php echo $this->form->end(); ?>
