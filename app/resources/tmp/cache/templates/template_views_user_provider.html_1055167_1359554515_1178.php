<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:50px">
<?php echo $this->form->create(); ?>
<legend><div style="color : #58ACFA !important;">Survey</div></legend>
<center>

<div style="margin-left:10px">
<label>Who
<select> 
<option value = "1">Westran</option>
<option value = "2">Indian</option>
<option value = "3">Classical</option>
<option value = "4">Gym</option>
</select>
</label>
</div>

<div style="margin-left:-25px">
<label> Start Date
<input type="text" id="datepicker" readonly="readonly" >
</label>
</div>

<div style="margin-left:-15px">
<label> Duration
<input type="text" id="duration">
</label>
</div>


<label>Where
<select> 
<option value = "1">Auditorium</option>
<option value = "2">House</option>
<option value = "3">School</option>
<option value = "4">Office</option>
</select>
</label>

<div style="margin-left:10px">
<label>How
<select> 
<option value = "1">Appreciate</option>
<option value = "2">Learn</option>
<option value = "3">Teaching</option>
<option value = "4">Critic</option>
</select>
</label>
</div>
</br>
<?php echo $this->form->button('Submit',array('class' => 'btn btn-primary')); ?>
<?php echo $this->form->end(); ?>

</center>
</div>