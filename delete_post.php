<?php 
include("config.php");


	$id_post_del=$_POST['id_post_del'];
	$id_comment2=$_POST['id_comment2'];
	$edit_omment=$_POST['edit_omment'];
	
	
$id_type = mysqli_query($con,"SELECT type FROM post WHERE id ='$id_post_del'");
$result=mysqli_fetch_array($id_type);
$id_type=$result['type'];
	
	//mysqli_query($con,"UPDATE comments SET text='$edit_omment' WHERE id='$id_comment'")or die(mysqli_error($con));
	
	if($id_type==11){
	//wallet
		mysqli_query($con,"	DELETE FROM wallet WHERE id_post='$id_post_del'")or die(mysqli_error($con));

}
else if ($id_type==1 || $id_type==4) {
    //mobile and others 
    mysqli_query($con,"	DELETE FROM others WHERE id_post='$id_post_del'")or die(mysqli_error($con));
}

else if ($id_type==10 ) {
    //jewalery
    mysqli_query($con,"	DELETE FROM jewelery WHERE id_post='$id_post_del'")or die(mysqli_error($con));
}

else if ($id_type==12 ) {
    //money
    mysqli_query($con,"	DELETE FROM money WHERE id_post='$id_post_del'")or die(mysqli_error($con));
}
else if ($id_type==9 ) {
    //off_dec
    mysqli_query($con,"	DELETE FROM offical_doc WHERE id_post='$id_post_del'")or die(mysqli_error($con));
}

	
?>