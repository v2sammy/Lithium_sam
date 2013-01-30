<div style="padding : 10px 10px; border-radius : 2px; border:1px solid #CFCFCF;">
<legend> Friends </legend>
<?php
echo "<table class='table-striped' style='width : 100%;text-align : left;'>";
echo "<tr> <th> Name </th> <th> Groups </th> <th style='text-align : right;'> Add to group </th> </tr>";
foreach($userCursor as $friends)
	//echo "<script> console.log('".$userCursor['name']."') </script>";
	foreach($friends as $friend)
	{
		echo "<tr><td>";
		echo $friend['first_name'];
		echo '</td>';
		echo '<td class="span2" > <div class=groupLabel'.$friend["_id"].' > </div></td>';
		
		echo ' <td><div class="btn-group pull-right" style="margin-top : 8px;">
  			<a class="btn dropdown-toggle" data-toggle="dropdown" href="#" id='.$friend['_id'].' class="btnAction">
   				 Groups
    				<span class="caret"></span>
  			</a>
  			<ul class="dropdown-menu">
  				
  				<div class="groups" data-id='.$friend['_id'].'>
    				
    			</div>
    				
    				<li class="divider"> </li>
    				<li><form id="frmNewGroup" class="frmNewGroup">
    				<input type="text" id="txtGroupName" class="txtGroupName" placeholder="Create New Group" style="display : block;" />
    				</form> </li>
  			</ul>
		     </div>';
	        echo "</td></tr>";
	}
echo "</table><br>";
?>
</div>


