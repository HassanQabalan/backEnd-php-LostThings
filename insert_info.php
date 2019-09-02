<?php

include("config.php");

$first_name= $_POST["first_name"];
$last_name =$_POST["last_name"];
$token =$_POST["token"];
$image=$_POST["image"];
$last_refresh =$_POST["last_refresh"];
$country =$_POST["country"];
$area =$_POST["area"];
$gender =$_POST["gender"];
$evaluate =$_POST["evaluate"];
$phone_number =$_POST["phone_number"];
$email =$_POST["email"];
$status =$_POST["status"];
$password =$_POST["password"];
$date_of_birth =$_POST["date_of_birth"];
$token_fire = $_POST["token_fire"];

$image = $_POST["image"];

$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));


//mysqli_query($con,"insert into user (first_name)values('$first_name')")or die(mysqli_error($con));


mysqli_query($con,"insert into user (first_name,last_name,token,last_refresh,image,country,area,gender,evaluate,phone_number,email,status,password,date_of_birth,token_fire)values('$first_name','$last_name','$token','$last_refresh','$url','$country','$area','$gender','$evaluate','$phone_number','$email','$status','$password','$date_of_birth','$token_fire')")or die(mysqli_error($con));


mysqli_close($con);

?>