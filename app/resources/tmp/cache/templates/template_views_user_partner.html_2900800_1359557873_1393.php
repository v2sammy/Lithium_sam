<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:50px">
<?php echo $this->form->create(); ?>
<legend><div style="color : #58ACFA !important;">Survey</div></legend>
<center>
<label>What
<select id="select_what"> 
<option value = "1">Westran</option>
<option value = "2">Indian</option>
<option value = "3">Classical</option>
<option value = "4">Gym</option>
</select>
</label>

<div style="margin-left:-25px">
<label> Start Date
<input type="text" id="datepicker" readonly="readonly" >
</label>
</div>

<label>Where
<select id="select_where"> 
<option value = "1">Auditorium</option>
<option value = "2">House</option>
<option value = "3">School</option>
<option value = "4">Office</option>
</select>
</label>

<div style="margin-left:10px">
<label>How
<select id="select_how"> 
<option value = "1">Appreciate</option>
<option value = "2">Learn</option>
<option value = "3">Teaching</option>
<option value = "4">Critic</option>
</select>
</label>
</div>

<legend><div style="color : black;">Invest Money</div>
<div style="color:blue; font-size:17px; margin-top:-15px">How much would you like to invest as a Partner!</div>
<div style="margin-left:-45px">
<label>Rs (₹)
<input id="txtcontactno" type="text">
</label>
</div>
</legend>
</br>
<?php echo $this->form->button('Submit',array('class' => 'btn btn-primary','id'=>'partner_submit')); ?>
<?php echo $this->form->end(); ?>

</center>
</div>