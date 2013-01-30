<div class="wrapper" id="wrapperLogin" style="align:center; margin-top:100px">
<?php echo $this->form->create(); ?>
<legend><div style="color : #58ACFA !important;">Survey Page</div></legend>
<center>

<label> Which
<input type="text" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
</label>
<div style="margin-left:-5px">
<label>Where
<select> 
<option value = "1">Appreciate</option>
<option value = "2">Learn</option>
<option value = "3">Teaching</option>
<option value = "4">Critic</option>
</select>
</label>


<div style="margin-left:15px">
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