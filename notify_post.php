<?php 
    require("config.php");
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'notification' => $message
			);
define( 'API_ACCESS_KEY','AAAAwGuHXqY:APA91bGEByOPSlFzyuZc5V7hcD7eGV_iDrrv4_9chRDoqXoLtqsPCPAxXoOv6A3SCiFSGkXwPVvB_HO1cyoGrEA5fbJMfFURy1DEHmu3sFxkp9Dnl_yOmZpuAlgXYxZG4T-NwzfMMqgt');

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
	$result = mysqli_query($con,"SELECT id,massage,token FROM token ");
    $t=array();
    $tokens = array();
    if(mysqli_num_rows($result) > 0 ){
	while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["token"];
			$tokens[] = $row["id"];
			 $t[]=$row["massage"];
		}
		mysqli_close($con);
	}
	
	 
	$message_status = send_notification($tokens, $message);
  	$message = array
            (
  		'body' 	=> $t, 
  		'title'	=> 'ffffffffffffffffffffffffffffffffff');
  	$message_status = send_notification($tokens, $message);	


 ?>

