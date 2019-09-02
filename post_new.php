<?php 
include("config.php");

// 	$stmt = $con->prepare("SELECT id,name FROM type");
// 	$stmt->execute();
// 	$stmt->bind_result($id,$name);
//     $chats = array(); 
// 	while($stmt->fetch()){
// 		$temp = array();
		
// 		$temp['id'] = $id; 
// 		$temp['name'] = $name; 
	    
// 		array_push($chats, $temp);
// 	}
// 	echo json_encode($chats);

// 	$result = mysqli_query($con,"SELECT id,name FROM type ");
//      $s=array();
//      $t=array();
//      	while ($row = mysqli_fetch_assoc($result)) {
     
//      $s[]=$row["id"];
//      $s[]=$row["name"];
     
//      	}mysqli_close($con);
//     //array_push($t, $s);
// 	echo json_encode($s);

$token = $_POST["token"];
$table = $_POST["table"];

$token_fire = $_POST["token_fire"];

$id_users = mysqli_query($con,"SELECT id FROM user WHERE token='$token' ");
$result=mysqli_fetch_array($id_users);
$id_user=$result['id'];

$type = $_POST["type"];
$lost_found = $_POST["lost_found"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$area_name = $_POST["area_name"];
$date_time = $_POST["date_time"];
$reward = $_POST["reward"];
$spacification = $_POST["spacification"];
$pacific_area = $_POST["pacific_area"];
$token= $_POST["token"];


$lost=0;
if($lost_found=="loster"){
$lost=0;    
}
else if($lost_found=="founder"){
  $lost=1; 
}

mysqli_query($con,"insert into post (id_user,type,lost_found,latitude,longitude ,area_name,date_time,reward ,spacification ,token)values('$id_user','$type','$lost','$latitude','$longitude','$area_name','$date_time','$reward','$spacification','$token_fire')")or die(mysqli_error($con));


$id = mysqli_query($con,"SELECT id FROM post ORDER BY id DESC");
$result=mysqli_fetch_array($id);
$id_post=$result['id'];

mysqli_query($con,"insert into spacific_area (id_post,spacific_area)values('$id_post','$pacific_area')")or die(mysqli_error($con));


    if($table =='money'){
    
mysqli_query($con,"insert into money (amount,id_post)values('$amount','$id_post')")or die(mysqli_error($con));
    
}


else   if ($table =='others'||$table=='mobile'){
//     if(image==""){}
// else{}
$color = $_POST["color"];
$image = $_POST["image"];
$type_other = $_POST["type_other"];


$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
 mysqli_query($con,"insert into others (color,image,id_post,type_other) values('$color','$url','$id_post','$type_other')")or die(mysqli_error($con));
 
  }

  else if ($table == "jewelery"){
 $type_jewelery = $_POST["type_jewelery"];

 $image = $_POST["image"];
 $rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
 mysqli_query($con,"insert into jewelery (image,id_post, type_jewelery)
 values('$url','$id_post','$type_jewelery')")or die(mysqli_error($con));
 
      }
    //image	card_id	id_post	type_doc
else if ($table == "offical_doc"){
 $image = $_POST["image"];
 $card_id = $_POST["card_id"];
 $type_doc = $_POST["type_doc"];

 
$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
 mysqli_query($con,"insert into offical_doc (image,card_id,id_post ,type_doc)values('$url','$card_id','$id_post','$type_doc')")or die(mysqli_error($con));
 
      
  }
   
  else if ($table == "wallet"){
 $image = $_POST["image"];
$amount = $_POST["amount"];


$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
 mysqli_query($con,"insert into wallet (amount,image,id_post ,card_id)
 values('$amount','$url','$id_post','$card_id')")or die(mysqli_error($con));
 
      
  }
  
  
  $first_name = mysqli_query($con,"SELECT first_name  FROM user  WHERE token='$token'");
$result=mysqli_fetch_array($first_name );
$first_name=$result['first_name'];

 $last_name = mysqli_query($con,"SELECT  last_name FROM user  WHERE token='$token'");
$result=mysqli_fetch_array($last_name);
$last_name=$result['last_name'];

$first_name.="  ".$last_name;

  
  
  
  function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'notification' => $message
			);
define( 'API_ACCESS_KEY','AAAA0bBB7xQ:APA91bG0ojhoOzWpZYe1AZb5pvYqCeVGwY-s19nH7qI5nsf57MTvtrmidVf2guTVqYTna61KjlqHTG6OsavpRhgPMBOGR7uPLIjKYbzDoPse9xJmtLKZ3s-ULbIlmxbzxeKWqoZ46zE6');

		$headers = array(
			'Authorization:key ='.API_ACCESS_KEY,
			'Content-Type: application/json'
			);

	   $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      $result = curl_exec($ch);           
      if ($result === FALSE) {
          die('Curl failed: ' . curl_error($ch));
      }
      curl_close($ch);
      return $result;
	}
$tokens = array();
// 	$result = mysqli_query($con,"SELECT post.type,post.token,post.spacification ,type.name FROM post , type  ");
    $type=array();
    
//     if(mysqli_num_rows($result) > 0 ){
// 	while ($row = mysqli_fetch_assoc($result)) {
// 		//	$tokens[] = $row["token"];
		 if($table =='money'){
			$type["type"] = "تم نشر بوست عن money ";
		     
		 }
		 else   if ($table =='others'||$table=='mobile'){
		     $type["type"] = "تم نشر بوست عن mobile ";
		 }
		 else if ($table == "jewelery"){
		      $type["type"] = "تم نشر بوست عن jewelery ";
		     
		 }	
		  else if ($table == "wallet"){
		       $type["type"] = "تم نشر بوست عن wallet ";
		  }
		  else if ($table == "offical_doc"){
		      $type["type"] = "تم نشر بوست عن offical_doc ";
		  }
// 			 $message=$row["spacification"];
// 		}
// 	//	mysqli_close($con);
// 	}
	$result = mysqli_query($con,"SELECT token_fire FROM user  WHERE token='$token' ");
    //$type=array();
    
    if(mysqli_num_rows($result) > 0 ){
	while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["token_fire"];
		
		}
		mysqli_close($con);
	}
	

	
	// $type['name_user']=$first_name;
	$message_status = send_notification($tokens, $message);
  	$message = array
            (
  		'body' 	=> $type["type"] , 
  		'title'	=> $first_name );
  	$message_status = send_notification($tokens, $message);	
	
  
  
//   function send_notification ($tokens, $message)
// 	{
// 		$url = 'https://fcm.googleapis.com/fcm/send';
// 		$fields = array(
// 			 'registration_ids' => $tokens,
// 			 'notification' => $message
// 			);
// define( 'API_ACCESS_KEY','AAAA0bBB7xQ:APA91bG0ojhoOzWpZYe1AZb5pvYqCeVGwY-s19nH7qI5nsf57MTvtrmidVf2guTVqYTna61KjlqHTG6OsavpRhgPMBOGR7uPLIjKYbzDoPse9xJmtLKZ3s-ULbIlmxbzxeKWqoZ46zE6');

// 		$headers = array(
// 			'Authorization:key ='.API_ACCESS_KEY,
// 			'Content-Type: application/json'
// 			);

// 	   $ch = curl_init();
//       curl_setopt($ch, CURLOPT_URL, $url);
//       curl_setopt($ch, CURLOPT_POST, true);
//       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
//       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//       $result = curl_exec($ch);           
//       if ($result === FALSE) {
//           die('Curl failed: ' . curl_error($ch));
//       }
//       curl_close($ch);
//       return $result;
// 	}
// // 	$result = mysqli_query($con,"SELECT id,token FROM post ");
// //     $t=array();
// //     $tokens = array();
// //     if(mysqli_num_rows($result) > 0 ){
// // 	while ($row = mysqli_fetch_assoc($result)) {
// // 			$tokens[] = $row["token"];
// // 			$tokens[] = $row["id"];
// // 		//	 $t[]=$row["massage"];
// // 		}
// // 	//	mysqli_close($con);
// //	}
	
	 
// 	$message_status = send_notification($tokens, $message);
//   	$message = array
//             (
//   		'body' 	=> 'x', 
//   		'title'	=> 'ffffffffffffffffffffffffffffffffff');
//   	$message_status = send_notification($tokens, $message);
  
  
  
   
// $id_new=0;
// $stmt = $con->prepare("SELECT id_post , amount, image FROM wallet ");
// 	$stmt->execute();
// 	$stmt->bind_result($id_post , $amount ,$image);
// 		$contact = array(); 
// 	while($stmt->fetch()){
// 		$temp = array();
// 	  $id_new= $id_post; 
// 		$temp['image'] = $image; 
// 		$temp['amount'] = $amount;
		
// 		array_push($contact, $temp);
// 	}
// 	$stmt1 = $con->prepare("SELECT type ,lost_found  ,latitude ,longitude ,area_name ,date_time  ,reward  ,spacification FROM post where id ='$id_new'  ");
//     $stmt1->execute();
// 	$stmt1->bind_result( $type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification);
	
// 		while($stmt1->fetch()){
// 		$temp = array();
// 		$temp['type'] = $type;
// 		$temp['lost_found'] = $lost_found;
// 		$temp['latitude'] = $latitude;	
// 		$temp['longitude'] = $longitude;
// 		$temp['area_name'] = $area_name;
// 		$temp['date_time'] = $date_time;
// 		$temp['reward'] = $reward;
// 		$temp['spacification'] = $spacification;	
// 		array_push($contact, $temp);
// 		}
// 	echo json_encode($contact);
		
		
	
	
//	$result = mysqli_query($con,"SELECT COUNT(*) AS `count` FROM `post`");
// $row = mysqli_fetch_assoc($result);
// $count1 = $row['count'];

// 	echo $count1;
// 	$x=array();
// if($count1>$count){
//     $x['x']='1';
//     echo json_encode($x);
// }
	
	

	
	
	
	
?>