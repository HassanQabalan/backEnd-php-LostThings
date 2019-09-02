<?php

include("config.php");

$phone_number =$_POST["phone_number"];
$password =$_POST["password"];

$query_phone_number=mysqli_query($con,"select * from user where  phone_number='$phone_number'")or die(mysqli_error($con));

$rows_phone_number = mysqli_num_rows($query_phone_number);


$message=array();


if ($rows_phone_number < 1 ) {
    
    $message["x"] = "Username isn't Exist";
}
else if($rows_phone_number == 1 )
{
    mysqli_query($con,"UPDATE user SET password = $password WHERE phone_number = '$phone_number'")or die(mysqli_error($con));

        $message["x"] = "Change Password Successfuly";

}   
else
  {
	   $message ["x"]=  "Some Error has happend ....";
  }
  

echo json_encode($message);

mysqli_close($con);

?>