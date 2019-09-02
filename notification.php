<?php 
    require("config.php");
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
	$result = mysqli_query($con,"SELECT id,first_name,token FROM user ");
    $t=array();
    $tokens = array();
    if(mysqli_num_rows($result) > 0 ){
	while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["token"];
			//$tokens[] = $row["id"];
			/// $t[]=$row["massage"];
		}
			//echo json_encode($tokens);
	//	mysqli_close($con);
	}
// 	$temp = array();
// $contact=array();
// 	$stmt = $con->prepare("SELECT id,first_name,token FROM user  ");
// 	$stmt->execute();
// 	$stmt->bind_result($id,$first_name,$token);
// 		 $contact = array();
// 	while($stmt->fetch()){
// // 		$temp['first_name']=$first_name;
// // 		$temp['id']=$id;
// 		$temp['token']=$token;
		

//     	array_push($contact, $temp);
	//}//	echo json_encode($contact);

	 
	$message_status = send_notification($tokens, $message);
  	$message = array
            (
  		'body' 	=>'hasan', 
  		'title'	=> 'ffffffffffffffffffffffffffffffffff');
  	$message_status = send_notification($tokens, $message);	


 ?>

