<?php 
include("config.php");





$c=array();


$result = mysqli_query($con,"SELECT COUNT(*) AS `count` FROM `build`");
$row = mysqli_fetch_assoc($result);
$count = $row['count'];
$c['c']=$count;
	echo json_encode($c);


?>