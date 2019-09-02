<?php 
include("config.php");
$name = $_POST["name"];
$chat = $_POST["chat"];
$number = $_POST["number"];
 
if ($name != null){
mysqli_query($con,"insert into chat (name,text_chat,id_sender,date)values('$name','$chat','$number','$date')")or die(mysqli_error($con));
}
	$stmt = $con->prepare("SELECT name, text_chat,id_sender,date FROM chat ");
	$stmt->execute();
	$stmt->bind_result($name,$text_chat, $id_sender,$date);
    $chats = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['name'] = $name; 
		$temp['text_chat'] = $text_chat; 
		$temp['id_sender'] = $id_sender; 
		$temp['date'] = $date;
		array_push($chats, $temp);
	}
	echo json_encode($chats);

	?>