	<?= $this->form->create();?>
	<div id="div_partner" style="width:800;height:300">
	How&nbsp;<select id="select_how" class="span2">
		<?php foreach($hows as $how) {
			?>
				<option value="<?=$how['_id']?>">
				<?=$how['name']?>
				</option>
				<?php } ?>
		</select>
	
	What&nbsp;<select id="select_what" class="span2">
	<?php foreach($whats as $what) {
		?>
			<option value="<?=$what['_id']?>">
			<?=$what['name']?>
			</option>
			<?php } ?>
	</select> 
	Where&nbsp;<select id="select_where" class="span2"></select>&nbsp;
	Start Date&nbsp;<input type="text" id="datepicker" readonly="readonly" class="span2"/>
	<div>How much would you like to invest as a Partner!</div>
		&nbsp;<input id="txtcontactno" type="text" class="span2"/>&nbsp;(Rs)
		<br/>
	<?= $this->form->button('Submit',array('class'=>'btn btn-primary','id'=>'partner_submit')) ?>
	</div>
	
	<hr>
	<div id="interestsWrapper" class="wrapper">
	<table style="width:100%" class="table-bordered table-striped table-hover"> <tr> <th> What </th><th>Where</th><th>How</th><th>Start Date</th><th>Investment</th></tr>
		
	
	</div>
	
	
	<?= $this->form->end(); ?>
