<h3> Create new Which </h3>
<?php echo $this->form->create($whats); ?>
<?php echo $this->form->field("name",array("id" => "txtWhat")); ?>
<?php echo $this->form->select('whatname', $whats['name'], array(
    'id' => 'Colors', 'value' => 2 )); ?>
<?php echo $this->form->submit("Create",array("id" => "btnCreateWhat")); ?>
<div id="alertDiv" class="alert alert-danger"> </div>
<?php echo $this->form->end(); ?>
