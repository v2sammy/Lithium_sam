<?php echo $this->form->create(); ?>
<div class="wrapper" style="height:150px" id="interestsdetails">
<legend>Survey</legend>
<?php
	foreach($interestsArray as $interests)
	{
		foreach($interests[0] as $hows){
			echo $hows['name'];
		}
	} 
?>
<div id="selectInterests">
<select> 
<option value = "1">Hello</option>
</select>
</div>

<?php echo "<TABLE width=650 align=center cellpadding=4 cellspacing=0>"; 
echo "<tr>";
echo "<td width=35%>How</td>";
echo "<td width=35%>What</td>";
echo "<td width=35%>which</td>";
echo "<td width=35%>where</td>";
echo "</tr>"; 				

echo "<tr>";
echo "<td>" . $detail['How'] . "</td>";
echo "<td>" . $detail['What']. "</td>";
echo "<td>" . $detail['Where']. "</td>";
echo "</tr>";
?>
