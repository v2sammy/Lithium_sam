<div id="whatsList" class="well" style="text-align : center;">
	<h4> Whats </h4>
	<? foreach($whats as $what) { 
		echo "<div class='whats btn btn-secondary' id='".$what['name']."'>".$what['name']."</div>"; 
	}?>
	<div class="whats btn btn-secondary" id="addWhat" title="Add New" onclick="window.location.href='http://localhost/addwhats';"> <i class="icon-plus-sign"> </i> </div>
</div> <!-- end whatsList div -->

<div id="whichList" class="well" style="display : none;">
	
</div> <!-- end whichList div -->
