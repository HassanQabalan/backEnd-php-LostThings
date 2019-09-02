<?php 
include("config.php");




$t= $_POST["search"];
// 	echo $type_send;
//$serch_type=$_post["serch_type"];

//echo $t;


switch($t){

//if ($t==1){
CASE 'wallet' :
    
$stmt = $con->prepare("SELECT user.id , user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id  ORDER BY id_post DESC");
$contact1 = array();
$stmt->execute();
	$stmt->bind_result($id ,$image1,$user_name ,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='1';
		$temp['id'] = $id; 
		$temp['image1'] = $image1; 
		$temp['first_name'] = $user_name;
		
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
	
    	array_push($contact1, $temp);
	}
//	echo $z=1;
	echo json_encode($contact1);
	break;
//}
//else if ($t==2){

CASE 'money':

$stmt2 = $con->prepare("SELECT user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
$contact2 = array();
	$stmt2->execute();
	$stmt2->bind_result($id ,$image1,$user_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
	while($stmt2->fetch()){
		$temp2 = array();
	$temp2['x']='2';
		$temp2['id'] = $id; 
			$temp2['image1'] = $image1; 
		$temp2['amount'] = $amount;
			$temp2['first_name'] = $user_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';
		
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;

	array_push($contact2, $temp2);

    }
 //   echo $z=2;
    echo json_encode($contact2);
//}
break;
//elseif ($t==3or $t==3 ){

CASE  'others' :
	
	$stmt3 = $con->prepare("SELECT user.id , user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id ,$image1,$user_name ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 $contact3 = array();
 	while($stmt3->fetch()){
		$temp3 = array();
     $temp3['x']='3';
		$temp3['id'] = $id; 
			$temp3['image1'] = $image1; 
		$temp3['first_name'] = $user_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	
	array_push($contact3, $temp3);

 	    
 	}
 //	echo $z=3;
echo json_encode($contact3);

//}	
break;

CASE  'mobile' :
	
	$stmt3 = $con->prepare("SELECT user.id , user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id ,$image1,$user_name ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 $contact3 = array();
 	while($stmt3->fetch()){
		$temp3 = array();
     $temp3['x']='3';
		$temp3['id'] = $id; 
			$temp3['image1'] = $image1; 
		$temp3['first_name'] = $user_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	
	array_push($contact3, $temp3);
}//echo $z=3;
echo json_encode($contact3);
//}	
break;

//elseif ($t==4 ){
CASE 'jewellery':
	$stmt4 = $con->prepare("SELECT user.id , user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");
	$stmt4->execute();
	$stmt4->bind_result($id ,$image1,$user_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
$contact4 = array();
 	while($stmt4->fetch()){ 
		$temp4 = array();
      $temp4['x']='4';
		$temp4['id'] = $id; 
			$temp4['image1'] = $image1; 
		$temp4['first_name'] = $user_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	array_push($contact4, $temp4);

	}//echo $z=4;
		echo json_encode($contact4);
//} 
break;
CASE 'officil_document' :

//elseif ($t==5 ){
	$stmt5 = $con->prepare("SELECT user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id  ORDER BY id_post DESC");
	$stmt5->execute();
	$stmt5->bind_result($id ,$image1,$user_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 $contact5 = array();
 	while($stmt5->fetch()){
		$temp5 = array();
      $temp5['x']='5';
		$temp5['id'] = $id; 
			$temp5['image1'] = $image1; 
		$temp5['first_name'] = $user_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	array_push($contact5, $temp5);
	}//echo $z=5;
		echo json_encode($contact5);
//}
break;

}

// // //  $result  =mysqli_query($con,"SELECT * FROM post where spacification like '%g%'")or die(mysqli_error($con));

// // echo $result ;

// // WHERE (description LIKE '%$keywords%' OR item LIKE '%$keywords%')"
// $stmt5 = $con->prepare("SELECT  id_post ,card_id, type_doc, image   FROM offical_doc spacification  LIKE '%{g}%'  ");
// 	$stmt5->execute();
// 	$stmt5->bind_result( $id_post,$card_id, $type_doc ,$image );
//  $contact5 = array();
//  	while($stmt5->fetch()){
// 		$temp5 = array();
     
	
// 		$temp5['id_post'] = $id_post; 
// 		$temp5['image'] = $image; 
// 		$temp5['card_id'] = $card_id;
// 		$temp5['type_doc'] = $type_doc;



//     	array_push($contact5, $temp5);
// 	}
// 		echo json_encode($contact5);





//	if($type_send='money'){

	
// 	}
// else if($type_send='jewellery'){

// 	echo json_encode($contact1);}
	

	
// else	if($type_send='others'){

// 	echo json_encode($contact3);}
	
// else	if($type_send='mobile'){

// 	echo json_encode($contact3);}
	

	
//}
	

	
?>