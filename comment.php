<?php 
include("config.php");


// $new_update_comment=$_POST['new_update_comment'];

// 	mysqli_query($con,"UPDATE comments SET text='$new_update_comment' WHERE id=16")or die(mysqli_error($con));

$id_user=$_POST['id_user'];
$id_post=$_POST['id_post'];
$comment_text=$_POST['comment_text'];
$id_post_1=$_POST['id_post_1'];
mysqli_query($con,"insert into comments (id_post ,id_user ,text )values('$id_post','$id_user','$comment_text')")or die(mysqli_error($con));




// $stmt = $con->prepare("SELECT id, id_post, id_user,text  FROM  comments WHERE id_post='$id_post'  ");
// 	$stmt->execute();
// 	$stmt->bind_result($id,$id_post,$id_user ,$text );
// 		 $contact = array();
// 	while($stmt->fetch()){
// 		$temp = array();
// 		$temp['id']=$id;
// 		$temp['id_post'] = $id_post; 
// 		$temp['id_user'] = $id_user; 
// 		$temp['text'] = $text; 
		

//     	array_push($contact, $temp);
// 	}
// 	echo json_encode($contact);

// $stmt = $con->prepare("SELECT id_user,text  FROM  comments WHERE id_post='424'  ");
// 	$stmt->execute();
// 	$stmt->bind_result($id_user ,$text );
// 		 $contact = array();
// 	while($stmt->fetch()){
// 		$temp = array();
// 		$temp['id_user'] = $id_user; 
// 		$temp['text'] = $text; 
		

//     	array_push($contact, $temp);
// 	}
// 	echo json_encode($contact);
// 	echo $id_post_1;
	
	
	

	
	
	
	
?>