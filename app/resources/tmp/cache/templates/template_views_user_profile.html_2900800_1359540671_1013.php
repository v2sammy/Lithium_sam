<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<?php echo $this->form->create(); ?>
<legend><div style="color : #58ACFA !important;">Survey</div></legend>

<label>Which
<select> 
<option value = "1">Westran</option>
<option value = "2">Indian</option>
<option value = "3">Classical</option>
<option value = "4">Gym</option>
</select>
</label>

<label>Where
<select> 
<option value = "1">Auditorium</option>
<option value = "2">House</option>
<option value = "3">School</option>
<option value = "4">Office</option>
</select>
</label>

<label>How
<select> 
<option value = "1">Appreciate</option>
<option value = "2">Learn</option>
<option value = "3">Teaching</option>
<option value = "4">Critic</option>
</select>
</label>

<label> Start Date
<input type="text" id="datepicker">
</label>


<label> Duration
<input type="text" id="duration">
</label>

<label>Invest Money
<input id=" " type="text">
</label>


<?php echo $this->form->button('Submit',array()); ?>
<?php echo $this->form->end(); ?>


</div>