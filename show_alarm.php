<?php 
include("config.php");




$role= $_POST["role"];



switch($role){


CASE 'supriver' :
    
$stmt = $con->prepare("SELECT allet.id_post JOIN user ON  post.id_user=user.id  ORDER BY id_post DESC");
$contact1 = array();
$stmt->execute();
	$stmt->bind_result($id ,$image1,$user_name ,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );

	while($stmt->fetch()){
		$temp = array();
	
		$temp['id'] = $id; 

		
	
    	array_push($contact1, $temp);
	}
	echo json_encode($contact1);
	break;


CASE 'family':

$stmt2 = $con->prepare("SELECT user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
$contact2 = array();
	$stmt2->execute();
	$stmt2->bind_result($id ,$image1,$user_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
	while($stmt2->fetch()){
		$temp2 = array();

		$temp2['id'] = $id; 
	

	array_push($contact2, $temp2);

    }
    echo json_encode($contact2);

break;


}

	
?>