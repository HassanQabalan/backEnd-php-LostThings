<?php

include("config.php");

$username =$_POST["username"];
$password =$_POST["password"];


$t=substr($username,1,9);
$tt='+962'.$t;

$query_phone_number =mysqli_query($con,"select * from user where  phone_number='$username'")or die(mysqli_error($con));
$query_1 =mysqli_query($con,"select * from user where  phone_number='$username' AND password='$password' ")or die(mysqli_error($con));

$query_pho =mysqli_query($con,"select * from user where  phone_number='$tt' ")or die(mysqli_error($con));
$query_phone =mysqli_query($con,"select * from user where  phone_number='$tt' AND password='$password'")or die(mysqli_error($con));

$query_password =mysqli_query($con,"select * from user where password='$password' ")or die(mysqli_error($con));



$rows_phone_number = mysqli_num_rows($query_phone_number);
$rows_password = mysqli_num_rows($query_password);
$rows_query_1 = mysqli_num_rows($query_1);
$rows_query_phone=mysqli_num_rows($query_phone);
$rows_query_pho=mysqli_num_rows($query_pho);




$message=array();

if ($rows_phone_number < 1 && $rows_query_pho <1) {
    
    $message["x"] = "Phone Number isn't Exist";
}
else if($rows_query_1 == 1 ||  $rows_query_phone == 1 )
{
    
  $message["x"] = "success"; 
  
//   $rr =mysqli_query($con,"select first_name from user where  phone_number='$username'")or die(mysqli_error($con));
//   $result=mysqli_fetch_array($rr);
// $message["first_name"]=$result['first_name'];
//  $tt =mysqli_query($con,"select last_name from user where  phone_number='$username'")or die(mysqli_error($con));
// $result2=mysqli_fetch_array($tt);
// $message["last_name"]=$result2['last_name'];

// $stmt =$con->prepare($con,"SELECT first_name,last_name FROM user WHERE  phone_number='079234567'")or die(mysqli_error($con));
// 	$stmt->execute();
// 	$stmt->bind_result($first_name,$last_name);
// 	$res=array();
// 	while($stmt->fetch()){
// 	    $res['first_name']=$first_name;
// 	    $res['last_name']=$last_name;
	  
//  	}
//   array_push($message,$result);


	$stmt3 = $con->prepare("SELECT first_name, last_name ,token FROM  user WHERE  phone_number='$username'");
	$stmt3->execute();
	$stmt3->bind_result($first_name ,$last_name ,$token );
      
 	while($stmt3->fetch()){
	
        $message['first_name']=$first_name;
		$message['last_name'] = $last_name; 
		$message['token'] = $token; 

	}	

array_push($message, $message);




// $mysqle =  "SELECT first_name ,last_name  FROM user WHERE phone_number='079234567'";
// $result = mysqli_query($con,$mysqle);
// $response = array();

// if(mysqli_num_rows($result)!=0){

// while($row=mysqli_fetch_array($result)){
    
//     array_push($response , array('id_user'=>$row[0],'spacification'=>$row[9]));
// }

// echo json_encode(array("hasan"=>$response));
// }

}
else if($rows_phone_number == 1 && $rows_query_1 < 1   || $rows_query_pho == 1 && $rows_query_phone < 1)
{
    
  $message["x"] = "Don't match Phone Number:$username with password:$password Please Try again."; 

}
	 else
  {
	   $message ["x"]=  "Some Error has happend ....";
  }

echo json_encode($message);
print_r($message);
mysqli_close($con);

?>
