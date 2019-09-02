<?php 
include("config.php");

$id_post=$_POST['id_post'];
$id_user=$_POST['id_user'];
//$id_post=$_POST['id_post'];

$stmt = $con->prepare("SELECT comments.id, user.id, user.image,user.first_name, comments.id_post, comments.id_user,comments.text  FROM  comments JOIN user ON comments.id_post='$id_post' AND user.id='$id_user'  ");
	$stmt->execute();
	$stmt->bind_result($id_comment,$id,$image,$first_name,$id_post,$id_user ,$text );
		 $contact = array();
	while($stmt->fetch()){
		$temp = array();
		$temp['id_comment']=$id_comment;
		$temp['id']=$id;
		$temp['image']=$image;
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['id_user'] = $id_user; 
		$temp['text'] = $text; 
		

    	array_push($contact, $temp);
	}
	echo json_encode($contact);
//	echo $id_post_1;
	
	
	

	
	
	
	
?>