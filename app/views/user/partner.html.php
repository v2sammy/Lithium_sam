	<?= $this->form->create();?>
	<div id="div_partner" style="width:800;height:300">
	How&nbsp;<select id="select_how">
		<?php foreach($hows as $how) {
			?>
				<option value="<?=$how['_id']?>">
				<?=$how['name']?>
				</option>
				<?php } ?>
		</select>
	
	What&nbsp;<select id="select_what">
	<?php foreach($whats as $what) {
		?>
			<option value="<?=$what['_id']?>">
			<?=$what['name']?>
			</option>
			<?php } ?>
	</select> 
	Where&nbsp;<select id="select_where"></select>&nbsp;
	Start Date&nbsp;<input type="text" id="datepicker"
			readonly="readonly"/>
	<div>How much would you like to invest as a Partner!</div>
		&nbsp;<input id="txtcontactno" type="text"/>&nbsp;(Rs)
		<br/>
	<?= $this->form->button('Submit',array('class'=>'btn btn-primary','id'=>'partner_submit')) ?>
	</div>
	<?= $this->form->end(); ?>
