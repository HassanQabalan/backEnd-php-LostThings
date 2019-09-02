<?php
include("config.php");
// date_default_timezone_set("Jordan/Amman");
echo "The time is " . date("h:i");
// echo date("d/m/y");
// echo("</br>");
//  echo  date("d-m-yh:i");
//  echo("</br>");
 $day= date("y-m-d");
// echo ($day); 
// echo("</br>");

//year - month - day//
$date = DateTime::createFromFormat('y-m-d',$day);
$date->modify('-30 day');
$last_day= $date->format('y-m-d');

// echo ($last_day); 
// echo("</br>");
$type=$_POST["type_request"];

switch($type){
CASE 'date':
$contact=array();

$stmt = $con->prepare("SELECT start,end,typeTime FROM  family_register WHERE end>='$last_day'");

	$stmt->execute();
	
	$stmt->bind_result($start,$end,$typeTime );

	while($stmt->fetch()){
		$temp = array();
        $temp['start']=$start;
        $temp['end']=$end;
        $temp['typeTime']=$typeTime;    

    		array_push($contact, $temp);
	}
	echo json_encode($contact);
	break;
}
?>