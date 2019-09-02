<?php 
include("config.php");


	$id_comment=$_POST['id_comment'];
	$id_comment2=$_POST['id_comment2'];
	$edit_omment=$_POST['edit_omment'];
	
	
	mysqli_query($con,"UPDATE comments SET text='$edit_omment' WHERE id='$id_comment'")or die(mysqli_error($con));
	
		mysqli_query($con,"	DELETE FROM comments WHERE id='$id_comment2'")or die(mysqli_error($con));


	
?>