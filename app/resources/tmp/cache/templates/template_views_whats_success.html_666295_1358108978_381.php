<table class="table-striped">
<? foreach($whats as $what){
	echo "<tr>";
	echo "<th><strong>".$what['name']."</strong></th>";
	foreach($what['which'] as $which){ 
	 	echo "<td>".$which['name']."</td>"; 
	 }
	echo "</tr>";
}?>

</table>
<button class="btn btn-secondary" title="Edit" onclick="window.location.assign('http://localhost/whats');"> <i class="icon-edit"> </i> </button>
