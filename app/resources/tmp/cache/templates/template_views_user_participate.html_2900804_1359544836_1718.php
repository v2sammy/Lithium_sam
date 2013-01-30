<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<?php echo $this->form->create(null,array('action'=>'/')); ?>
<div id="container">

<!-- Participate Options -->
<div id="container1">
<center>
<legend><b><div style="color:#58ACFA !important;">Would you like to participate?</div></b></legend>
</center>
<div style="margin-left:40px">
<label>
<?php echo $this->form->radio('part',array('id'=>'par_yes','value'=>'Yes','onclick'=>'showdiv("container3"); hidediv("container2")')); ?>
Yes</label>
<label>
<?php echo $this->form->radio('part',array('id'=>'par_no','value'=>'No','onclick'=>'showdiv("container2"); hidediv("container3")')); ?>
No</label>
</div></div>


<!-- End user Options -->
<div id="container2" style="display:none">
<legend style="font-size:20px"></br>Would you like to take Survey as end user?</legend>
<center>
<button type="button" onclick="window.location.href='/profile'" class = "btn btn-primary">Continue</button>
<button type="button" onclick="window.location.href='/logout'" class = "btn btn-primary">Exit</button>
</center>
</div>

<!-- Partner or Provider Options -->
<div id="container3" style="display:none">
<legend></br>Select your Role</legend>
<div style="margin-left:40px">
<label>
<?php echo $this->form->radio('participate',array('id'=>'par_yes','value'=>'Yes','onclick'=>'showdiv("button");')); ?>
 Partner</label>
<label>
<?php echo $this->form->radio('participate',array('id'=>'par_no','value'=>'No','onclick'=>'showdiv("button");')); ?>
 Provider</label>
<div id="button" style="display:none" >
<center>
<button type="button" onclick="window.location.href='/profile'" class = "btn btn-primary">Continue</button>
</center>
</div> </div>
</div>
</div>

<?php echo $this->form->end(); ?>
</div>