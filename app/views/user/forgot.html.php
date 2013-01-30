<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<legend> <div style="color : #58ACFA !important;">Account Recovery Page</div> </legend>

<div id="emailContainer" class="control-group" style="margin-left:50px">
<label class="control-label" for="inputEmail" style="margin-right:10px">Email
	<?= $this->form->email('email',array('id' => 'txtForgotEmail','autocomplete' => 'off')); ?>
</label>
<button id="btnSubmitEmail" class="btn btn-primary" style="margin-left:100px">Submit</button>
</div>
</div>
