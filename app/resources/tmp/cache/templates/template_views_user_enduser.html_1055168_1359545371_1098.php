<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<?php echo $this->form->create(); ?>
<legend><div style="color : #58ACFA !important;">Survey Page</div></legend>
<center>

<div class="dropdown">
  <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Which
    <b class="caret"></b>
  </a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   
  </ul>
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

<div style="margin-left:-45px">
<label>Invest Money
<input id=" " type="text">
</label>
</div>
</br>
<?php echo $this->form->button('Submit',array('class' => 'btn btn-primary')); ?>
<?php echo $this->form->end(); ?>

</center>
</div>