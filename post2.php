<?php 
include("config.php");

$message = $_POST["message"];
$name = $_POST["name"];
$id = $_POST["id"];
$text = $_POST["text"];
$token = $_POST["token"];

mysqli_query($con,"insert into token(name,massage, id , text ,token )values('$name','$message','$id','$text','$token')")or die(mysqli_error($con));

// $stmt = $con->prepare("SELECT name,id,text FROM token ");
// 	$stmt->execute();
// 	$stmt->bind_result($name,$id, $text);
// 	$contact = array(); 
// 	while($stmt->fetch()){
// 		$temp = array();
// 		$temp['name'] = $name; 
// 		$temp['id'] = $id; 
// 		$temp['text'] = $text; 
	
		
// 		array_push($contact, $temp);
// 	}
// 	echo json_encode($contact);
	
	
	
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
	$result = mysqli_query($con,"SELECT massage,token FROM token ");
    $t=array();
    $tokens = array();
    if(mysqli_num_rows($result) > 0 ){
	while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["token"];
		//	$tokens[] = $row["id"];
			 $t=$row["massage"];
		}
		mysqli_close($con);
	}
	
	 
	$message_status = send_notification($tokens, $message);
  	$message = array
            (
  		'body' 	=> $t, 
  		'title'	=> 'Lost Thing');
  	$message_status = send_notification($tokens, $message);	
	
	
?>