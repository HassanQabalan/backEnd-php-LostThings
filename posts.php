<?php 
include("config.php");

// $result = mysqli_query($con,"SELECT COUNT(*) AS `count` FROM `post`");
// $row = mysqli_fetch_assoc($result);
// $count = $row['count'];

//	echo $count;
echo ("good for send data post");
$table = $_POST["table"];

$id_users = mysqli_query($con,"SELECT id FROM user ORDER BY id DESC");
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
//amount = $_POST["amount"];
$x;
$lost=0;
if($lost_found=="loster"){
$lost=0;    
}
else if($lost_found=="founder"){
  $lost=1; 
}

mysqli_query($con,"insert into post (id_user,type,lost_found,latitude,longitude ,area_name,date_time,reward ,spacification ,token)values('$id_user','$type','$lost','$latitude','$longitude','$area_name','$date_time','$reward','$spacification','$token')")or die(mysqli_error($con));


$id = mysqli_query($con,"SELECT id FROM post ORDER BY id DESC");
$result=mysqli_fetch_array($id);
$id_post=$result['id'];

mysqli_query($con,"insert into spacific_area (id_post,spacific_area)values('$id_post','$pacific_area')")or die(mysqli_error($con));


    if($table =='money'){
    
mysqli_query($con,"insert into money (amount,id_post)values('$amount','$id_post')")or die(mysqli_error($con));
    $x='s';
}


else   if ($table =='others'||$table=='mobile'){

$color = $_POST["color"];
$image = $_POST["image"];
$type_other = $_POST["type_other"];


$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
  
 mysqli_query($con,"insert into others (color,image,id_post,type_other) values('$color','$url','$id_post','$type_other')")or die(mysqli_error($con));
 $x='s';
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
 $x='s';
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
$x='s';
      
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
    $x='s';

      
  }
  
 

// $result = mysqli_query($con,"SELECT COUNT(*) AS `count` FROM `post`");
// $row = mysqli_fetch_assoc($result);
// $count1 = $row['count'];


// //	$x=array();
// if($count1>$count){
//   //  $x['x']='1';
    // echo json_encode('1');
// //    	echo $x;
// }
	
	
	
?>