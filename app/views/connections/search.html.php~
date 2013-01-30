<?php //use app\models\Users; ?>


<?php
if($users[0]['name']){
?>
<div id="searchResults"> 
	<legend> Search Results </legend>
	<?php foreach($users as $user){
		echo "<div class='searchResults'><strong> Name : </strong>".$user['name'];
		echo "<br><strong> Email : </strong>".$user['email'];				
	 ?>
	<button class="btn btn-secondary pull-right connect" id="<?php echo $user['_id']; ?>">Connect</button>
	<?php echo "</div>"; ?>
<?php
}

?>
</div>
<?php
}
else{
	echo "<h4> No matching results. </h4>";
}
?>
<div id="alertDiv" class="alert alert-danger" style="display:none;"> </div>
