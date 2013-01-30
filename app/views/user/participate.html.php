

<h1> Participate Page </h1>
<div id="container">
<div id="container1">
<?= $this->form->create(null,array('action'=>'/')); ?>
<h3>Would you like to participate?</h3>
<label>
<?= $this->form->radio('part',array('id'=>'par_yes','value'=>'Yes','onclick'=>'showdiv("container3"); hidediv("container2")')); ?>
Yes</label>
<label>
<?= $this->form->radio('part',array('id'=>'par_no','value'=>'No','onclick'=>'showdiv("container2"); hidediv("container3")')); ?>
No</label>
</div>


<div id="container2" style="display:none">
<h3>Would you like to take Survey as end user?</h3>
<button type="button" onclick="window.location.href='/profile'">Continue</button>
<button type="button" onclick="window.location.href='/logout'">Exit</button>
</div>


<div id="container3" style="display:none">
<label>
<?= $this->form->radio('participate',array('id'=>'par_yes','value'=>'Yes','onclick'=>'showdiv("button");')); ?>
 Partner</label>
<label>
<?= $this->form->radio('participate',array('id'=>'par_no','value'=>'No','onclick'=>'showdiv("button");')); ?>
 Provider</label>
</div>

<div id="button" style="display:none" >
<button type="button" onclick="window.location.href='/profile'">Continue</button>
</div>

</div>
<?= $this->form->end(); ?>
