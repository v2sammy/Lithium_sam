<h3> Create new WHAT </h3>
<?php echo $this->form->create($what); ?>
<?php echo $this->form->field("name",array("id" => "txtWhat")); ?>
<?php echo $this->form->submit("Create",array("id" => "btnCreateWhat")); ?>
<div id="alertDiv" class="alert alert-danger"> </div>
<?php echo $this->form->end(); ?>
