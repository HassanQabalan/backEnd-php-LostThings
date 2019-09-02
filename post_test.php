<?php 
include("config.php");

$contact = array();

$id_type = mysqli_query($con,"SELECT type FROM post ORDER BY id DESC ");
$result=mysqli_fetch_array($id_type);
$id_type=$result['type'];
	
	switch($id_type){

CASE 11:
$contact_type = array();


$mysqle =  "SELECT * FROM wallet";
$result = mysqli_query($con,$mysqle);



if(mysqli_num_rows($result)!=0  ){

$stmt = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC  ");

	$stmt->execute();
	
	$stmt->bind_result($id_autu,$id,$image1 ,$first_name,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
		    $id_new1= $id_autu; 

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='1';
     		$temp['y']='1';
     	//$temp1['id1'] =  $id_new1; 
     	
        $temp['image1']=$image1;
		$temp['id'] = $id; 
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
		//$temp['amount'] = $amount;
		//	$temp['color'] = "12";
	//	$temp['type_other'] = "5";

    
    		array_push($contact, $temp);
	}
}
//	echo json_encode($contact);

$mysqle =  "SELECT * FROM money";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	
$stmt2 = $con->prepare("SELECT post.id, user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");

	$stmt2->execute();
	$stmt2->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
//		$contact = array();
$id_new2= $id_autu; 
	while($stmt2->fetch()){
		$temp2 = array();
		$temp2['x']='2';
// 		$id_new2= $id_autu;
	//	$temp2['id1'] =  $id_new2; 
			$temp2['y']='1';
		$temp2['id'] = $id; 
		$temp2['image1']=$image1;
		$temp2['first_name']=$first_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';//ata:image/jpeg;base64,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		7PUPkqKKLtnBP//Z';
		$temp2['amount'] = $amount;
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;


    	array_push($contact, $temp2);
    

	}
    
}
	
	$mysqle =  "SELECT * FROM others";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
		$temp3 = array();
	$stmt3 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id_autu,$id,$image1 ,$first_name  ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
 $id_new3= $id_autu;
 
 	while($stmt3->fetch()){
		$temp3['y']='1';
        $temp3['x']='3';
      //  $id_new3= $id_autu;
       // $temp3['id1'] =  $id_new3; 
		$temp3['id'] = $id; 
		$temp3['image1']=$image1;
		$temp3['first_name']=$first_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	

    array_push($contact, $temp3);
    	

	} 
	}
	$mysqle =  "SELECT * FROM jewelery";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt4 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt4->execute();
	$stmt4->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
  $id_new4= $id_autu; 
  
 	while($stmt4->fetch()){
		$temp4 = array();
     //	$id_new= $id_post; 
      $temp4['x']='4';
		$temp4['id'] = $id;
			$temp4['y']='1';
		     //   $id_new4= $id_autu;
		    //    $temp4['id1'] =  $id_new4; 
			$temp4['image1']=$image1;
		$temp4['first_name']=$first_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	
array_push($contact, $temp4);
    	
	}
   
}
	
	$mysqle =  "SELECT * FROM offical_doc";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt5 = $con->prepare("SELECT post.id,user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");	
	$stmt5->execute();
	$stmt5->bind_result( $id_autu,$id,$image1 ,$first_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
  $id_new5= $id_autu; 
 	while($stmt5->fetch()){
		$temp5 = array();
	//	 $id_new5= $id_autu;
		 //	$temp5['id1'] =  $id_new5; 
     //	$id_new= $id_post;
     	$temp5['y']='1';
      $temp5['x']='5';
		$temp5['id'] = $id; 
	  	$temp5['image1']=$image1;
		$temp5['first_name']=$first_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	
    array_push($contact, $temp5);
	}
   
}
	//	if($type_send='no_search'){
	
//	echo "wallet";
	//echo json_encode(array("type"=>"wallet"));
 	echo json_encode(array( "11"=>$contact));

       //	echo json_encode('s'=>$contact);

break;

CASE 4  :
    
    	$mysqle =  "SELECT * FROM others";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
		$temp3 = array();
	$stmt3 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id_autu,$id,$image1 ,$first_name  ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
 $id_new3= $id_autu;
 
 	while($stmt3->fetch()){
	
        $temp3['x']='1';
        	$temp3['y']='2';
      //  $id_new3= $id_autu;
        //$temp3['id1'] =  $id_new3; 
		$temp3['id'] = $id; 
		$temp3['image1']=$image1;
		$temp3['first_name']=$first_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	

    array_push($contact, $temp3);
    	

	} 
	}


//	echo json_encode($contact);

$mysqle =  "SELECT * FROM money";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	
$stmt2 = $con->prepare("SELECT post.id, user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");

	$stmt2->execute();
	$stmt2->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
//		$contact = array();
$id_new2= $id_autu; 
	while($stmt2->fetch()){
		$temp2 = array();
		$temp2['x']='2';
// 		$id_new2= $id_autu;
	//	$temp2['id1'] =  $id_new2; 
			$temp2['y']='2';
		$temp2['id'] = $id; 
		$temp2['image1']=$image1;
		$temp2['first_name']=$first_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';//ata:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUTEhIVFRUVFRUVEBcVFRUPFRUSFRUWFhUVFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGy0mICUtLS0tLS8tLS0uLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBFAMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQACAwEGB//EADkQAAEDAgQEAwcEAgEEAwAAAAEAAhEDIQQSMUEFUWFxIoGRBhMyobHR8BRCweFS8YIjYpLSFTNy/8QAGgEAAwEBAQEAAAAAAAAAAAAAAgMEAQUABv/EAC0RAAICAgICAAQFBAMAAAAAAAABAhEDIRIxBEETIlFhFCMygZFCcfDxBaHR/9oADAMBAAIRAxEAPwDwnDA5PGtMILhtJOW07L6fHGkfLeRkuQFncoSUa2itBh0YjmhQ/Mq5SU4dhlkcOsoJZULBSXXUkxFBd/TLOJvxRFWpELJgTuthkC/CQbIXAfDKmiUaSJFJcoBFQjSFTk7BvdKCjC3KpmWg8mUM81g+mUWFHNXmaptF8HXA1RxxghKXU1wUys5HnsMqcR5BQcQQ/uVQ0l6zPlLV+Ik6IMOcTKKdRAaXHYSvL43ir3nIWhhZOaDZ2kG/lA6+i5ZEmkyvx8Ly/p69npHcSY0eIgnkL/PZA1eNTowX0mTz5dkiBJBtpBG0A/Wcw+SuRr017j+ymLZfDwsUe1Y0pcRaToAOmu23mneEcHNkGQdF41/SADtOn9Xt2RWCxr6RlpIEtkHQyATbnvqsWgM/hqS+TTPXCmrFqx4dj21m5hY/uHI/yEU5wCZRx5RlGVMX4mmqYdqIruCyZZYxieqNKt0vr00cXrF4WPZsG0KX4dZMw10zc1VaxL4IpWV0B/p1EdAUW8EZ8RhXDwnFM2SGlVyotuNCJdEeWDk7GgK2YldHEymNFyInnFo0IVci0C6AhF2Ztpq4pLRoWgC0xsEqUELUohMqhSzG1IWjINtgdUALL36GxWJQgroXKi6OJtbGTqyjHSloqSmGDC8nZ6cOKDKdNa+7VjUaxpc4w0CSTyXm8Z7RPc7weFm3M9T9gtStgYcGTM/l/kfupqzGLzQxjna/n5KJpYoiL33Ou+6b8D7lb/4+Vfq/6Hxak2N421pIY3NFpmBPTmheJcTe8ZQYFwY1JEa9OiVtYJIPlvfafn6oeFdjPH8Ct5N/YZVOLVXgsIYAcoMB0w6/0SJ7c1VxPOCT0gE/JMMkCZBtJAGhMgDp/aGZhra33QPHza10dDHjjjVRVF6cmxJIcQHSYzCxGY+XlCu9hcM7iZPP90QNed12lTbpBcSCLCYOgsNf7RNHBmB7wgNbMNm9zf5wmqFBNgJi5i8b/wCWb52WZYY7nuNPrdF+7a3WSf8Ax1j7qDFxGVrRptyOhnUWXnFGneG1XscDBg67SP6ylOv1pKRsxTn2EkwfTV1l39W7Wdjre/M+aXJ+kyXN4yyO/Y69/KnvUto4wExodtpG3miQ5KtkE8Lg6YUHqpcqByhKKwKISqmpC44rCo5C2Go2XNRRCklRDyGcAhtVdlY0wtcq9ZjSQfgXp7hnWXm8O6CnWEqpsXoi8iPsatVgqUjIWi0hZ1q0BWJdC4aq8ZVna4SXiTTBTjPKFxLAVo3G+LPHuYZuqFpTnE4cShnUEhwOpHMmA0ymmDehxQW9OlCKKaBySUkJuLY19VxE+AfC0adz1QjG6m0DYHnayKxdHxuGhG2hvy5hDCxvtp3CrSS6OtijFQSj0E0GacomenM9eiIqiLCNcpvM7yDy0UoMIaCZ8QBjpm19ZCu1g0IE68jYRHKFrkGCtYCL6l2sjlcHeL/VatojqBFtPi3vujMPhp2A0F7kzyHmu1PciziT2t8l7jfZ6xdWMyG23I6rPD4YvMC3M/m/RMGOo7M+Z+ZWlKqzQMj9xudgTz/JRNa0esqKzKbYpi5BzOOp0jtBkoV1UvJnYHzAkieaJfhQRIdADS7xQJlwESInf0QtQC0TOXxcpk6fL1S7PGLaQOWXR/laY1v9B5LFjHG2WdRGmxJE+RKIeW6HpMXkzfdZO0nrf66IWmwiraRgG8ODgCLTA0vqJhZ0WZiADHchosJNzYK7XkGQSDpOh+XdUe0R1MRtEfg9EtwZ4o6tdpF4Df8AtuBEeG/nqi8HjgYa6ZgXjWYH869ENmIPh/a4uabE7ROx0+ZWFU21sNO9pAQSjQM8amqZ6RrVaFjwqoX05d8QOV3fY+iIqNWHHkmpOLB6pQbjKLeJXG0VlWMi0jFrFEa2ioi4A/EKNpwrBq4yqtgEKQLb9meVGYSpCwDVo1iJC5U1Q6oVUY16SUKkI5mIEJhFOGzfEVEvOJupia6EpiVjDhBVsZ0MQrVHoJjVoSvWY4qylVsrI0lu1bNpr1BcqAxRWgpIXi/F6dDw/E/XLy7leaqccruPxR0ytt2kLyorw+Jkyrl0j1j8I11y0EjQ2MJNxnChpaWgTOnPrCDw+Lqa+8Nxe8m1r+S0q1SS0tBJbcFx/gp8YPuyzF4s8c75aDqdxrcC40EC4kHa30VWVGSLzrAPoNr6IHFV5JDfh2E/ayq2jA2FvE46CDqCjpFpMQ5xcQCRDoE2iVKVAk3vYj6ifVVbiG6g6HXrOoG6s2tmGkAkamTfXy8liaZuxnTwtKxe7bxNb/2jWdpW/vsOyP8ApyCHbxPn3+iWVrOdlJjRsOBnTWALeS4ylYixJAOsQBMjvMIqB9B4r0CIyctzKEr4YExTecm9rzYkdRYaoYUD1F1ZtF3P87r1II2Zg6Q1JPnHorO4fROjnt53Dh077oV1Z/P7E9Vw1yNWiJiRbr9ljR4No8HpkgGqbxEMv5XQ+K4U5oljw8biIcJ6ctFZtQPEh0GdNNQeXYKnvS0Ah15Mi8tiMu3MayfLcGqPWLXDY2joQeyxrgWgzIBPR24TLEVQ74hJ/wAhY26IXiFANIgRYAzE5x8WmyVNaCGfss+Q9s2BaY0GY5pMdoTWtTS/2TpQyo7YuAHcC/1TCvVhJ9HF8l/nyr/NAdVsKtJyzxGICGZiLrFJWGoNoctUQzKtlEzkIcGLcHVlNqK89hXQmtPEWSYPRVnx70MQtA8JX+qV210xMneJhz6qwOKKEqViuUmkrOQSxJLYex5KOoMQ+FpJlSppiJskktIzVXlEOYhqwXhUXZxtRTG48UqZdqdGjm46JVi65alOPxbqhHILYtN0WYfF+JJX0AVpe4ucZcSS7uVxtNHYHAGoRYhp/dFjeLTrdeiwnDKNFpeRnNwC6csxYARa6PgkrO1yS0J6FNrAM4Obl0jwiOczvoFz3YIGsxLp0N9r/kK+KBMy2ZLjINyZ1IFhvtuuaaDa+94k/dHGVoyiZYuYHPRs/wAJVxKu52hytFtZnmT3Rr2k3N4ub2/LhKcQHPMDQaJWeTcaQcUE4cQANbR23n6+qMyk3JbYW0kjbzQQ4XXA8Pi6DXylD/pq2bKWuk7EJSnKGuLNtP2Nv1TGgEkb2Bk+iuzjAi1Mk6ySBZDUOFZR47Ryuf6R9JlNo+Hw2u48tOwVMVke3oF0CV+PVBJFJgjmXa84CzwntISYdSBHNpuI72KIxPGqDbCkHxuQCPLMh2Y2k6SxgaewBU9t5Kjl/bQXroaNrMeJFuiGxFG9roR+IPMqxrmYd8RAI1tNwAOohVuSBOGR9Ow1IHqtnvDhvIADr3LhMEjX06LlN7HSCSD3JkrF9KowzFhuDPrH8pUt9GkeYNvLcRMi646mCLnabbbfndVBtv8AbkpzBH0m2pnyQs8eg4HVaylkmS0mTzm8/wAeSD4piY0SqliC289/9eqG4hiSfNTZ3whaIvwn5rl9SV8YphsRJStz0TgzdcqOdymWSxJRPV4cy1RVwj/CFxdVPRyJLYquFz3xRdWmhxSuluLLVJM0oAlH06SphmI6m1OjEnyTM6eHRVGgtaTVsGo0iOeRmlFsIphQzFu1GSyN1hWYtmFWcJWAJ0ee4nQkFKcNgsxnUBxaQDB+Hw/nRem4gwBpJ0ASc4imDMENzS6CCR4bDMCJm9kzFHdnZ8GTlFhVKqKQiXAZfBbXpBNmyCsq+PDi5rzZxkRZpd05feEudirT8V7tM6DQ9PiSzFVjGv4U2cklbOgo2PWNN4sI8R8589Pkq1WF2aAC1kBxnSTqLwTAKxwTXCm2mCMzpmXBoG+U8tAsg8gGNcpiN+ebrBI8tLkpblrRoHjsSS/IAJM5v2gT9pTHDYOcpLdWgg/5cyet0rwlKahcXAEgzJIzE9R3HovV8Hw7cvipB27CYIGoP+xzK9hvbkZJm9PD2noABYgAdQB1SnG4kNcS219Qc0co9Uy4tVbTbcHObZpNmix00Ebc15itimtkmHOOgBuJ3PaPmmymkrZiRvisSGQ5xDiRMXkGTLTbskuNxL6vxaDQCwGy3ymo4mLk2HlzsEfguFvqBwY1pyxMkN1m0+RUmSM82rpDFURLQbmtuNOoVX0SLhMqvD3A5m2Ik3i0ahaNpZwLXIuL2PL85pC8X+iXfphchW3FndEUMXEnMfrN58tFTFYf880udIMKXNPLhdS2gkkx3h8VNied4vBABHUQPmjqOIIP18+m687RqQm1J3hknxTESBAIJmNdeSs8bNyQMlQVXpCMzIjUjcduiDJhGsqz4haZDo2JuJ6f+pQeLgG2huPPZUuSoFGb9PPz/wBX+SxiddN1A6V0pLpmi2o2CRyWuGfBVsay880O0wuDkj8LK0M7R6bDV/ColVHE2UV8cyohlg2OarlkCuucqAqwWloMouR1FyVU3ouhVRpickRxRKIa1C4R0o2UZzp9kaFs1UYtAFolmjVoFRoWrAsAZ572qxWXIwAEnxGeQ0/leZdWmLAQI73Jk+qZ+07HPxZYNcrco/4z90jaUalSPo/Cgo4Yr7X/ACbmqQIGoMg9fwBVwtPM7M7Rvzd+XVKzxPhPaRB6SicP8Gt50g3mTM+gjqvN2yoNsQAbOBzTM5g4CIbG3c721WOIaSc2g2AOhgNk31gD1V6NMNLgXSC0XbDvERIBM23nqNFvUptMAWAm5Mzy7HQI4Rt2wRZhqM1YE8wQC6GgGZA8l67APbTpZ3nK0CS42EA328oXm+FFn6jK7PdpgtAdeLAg7df9oP2l4gXRSafA3XbMdienJKy5fhY5NGU5Sovxbj5rv/6YjZpdBsOQ5oGnh3akG5N9ATvB31WXDcMXSRMi7SBm8W08hO69dR4c4O97VLGw2XGA1gBBG9vwKbx1LKueR/2+gyTUdIXYHBzHkYO8cvX5po3h8zEgX3+UrBnGKNOG02uqkA5f2tvykTe2y0qYTEYkeNzQIn3bTlgbZm6+qvjNf0i39wXHcQo0xDR713IHK3zd9khw9VzajnVARnuJMAHNzOosWr1dH2bHfTpyn+Uj9paTGkUWmXWc865RBhvfeOgUnlRdc72ul9w4tdGWKaJjp/P9JTiGeJM2Ee7bOoEG0WGnmhvd5pcszr40F9Qo6B20lvlsALamZmdIEbb+q2p0v77BahpaeRG9jzHmvY/H4o82YUqhBtor4skhptppqQCTr6FFVMIWta4kEPBIg3EGDO421j5LHGzDZIMEhschqdNCTPminFpVZid9AzQo4wugLhXukaC4jVDEI2tRMZuaDcuH5NubbCiyB6iqVFPYdD5j1eVgCrgrtqZA0aZlenWuspVJXnMzjY/wuKTKjWleVo1CnWCqKiE7IM+FLY9pLdoQ2GcjWBMOZLTOtat6bVVrVwVYWC+zx/t3Qy1GPAHiEOPVsxHkV5pi9f7btL6bSNGul3mIXlKBAInmJHMTdYtyPpPAleBfY2dQaWF7XAZcoLSfE5xmS0clbLAAve4OluymPNPOTTBDTpJnvC47EFwEx4RAtty67+qdqymN9huAJaQ6AYuA67SRbSb6rVz2hpmQ60BsZS3VwN7XiNVSlUa67Zbka1pBcDmJJkt/N1V7ZBMRlEuPnA0FpkBNj0e/uDYb/wCw1JIhpb3lDGmMwc4xBzTIBkXHzRuGaXZoEhvicRGmgt3J9eiE4jRFxM9oIJ6eUfNJnFcW0gl2dqcZcHuewh9RxJe9zG3LvitEHVDYjiTnuHv6j6nQEQOw+EeQQtXCkIc04K5GXLmWmv8AwZGMfQ1/+cawRRohp0zvPvHdwIgH1QFPFvD/AHge4PNy4OId66rDIo5inllyydt9fsFSGNfiuJqfFXqH/kWjzhVp0/dlubUmTPUWPUIKm10pjWwxgFxBdIDYuIiZlV+Pc7nTte2C9aB6r75R5lNMLRFpBDSQCYJj+4ul1PDGfy6Z4ao6GsLvDMtBgDMYEk/dX+MpW3JAS+xo/Dt0zifHIcC0eEeG+5N7LENMTFp1i3OPoj64aco8Lc1y58fEJBAI0bolrqlumsdeyqlSBReIE6TbnJF/LUIWs6StK9S97mBBGmgj5IV7lNlmgkWLlwXMKgk6LuWFLkzUa3QzqUrc0oxmHi4TDC4mbFdxTQk5IRyxsng5QlTESiIqUbqLmvHIs5IYAqwKzULl0eRJRvKgas2FbhHHYD0daEfhqsIFq1Dk2LoTNWekweIlOMIZXjcBiIdC9XgaohURlaOX5OLixk+wSvGV4RlauIXmuL4i8ArXpCsGPlKivEMWXNLeYIXmG2KbkoLEsBMjzQKe9na8WofKcZhs2hB8JdrEdENTMkA2ki/Ja4xmVxy6WiLoSqYTMk0v2LI7HOCoSKpY4HLBi1xPOeQNxOizrvGU6m21gDI9f7SejXgiTAm6YMrai92xbc639PkixZ4zWjXFo34W9uYhxdEQcoDjBzQI3vCpXdOtyTBOpgfnyWWBdBcBcmALTry5FEClmLogQC65DTDfO7uiZB3Ex6ZSgPe5g4y5v+R1btc77QhMThptpyVqzixzXtmR6EciihjKT7yGndrjoe51SnwlcJ/7QW+0KCADDrHnsVZ1Ec+yYvwBrGWw7nlIt9lSlh2hvw6HUa9o/lJ/DO2qVeme5mdGkTFpdMRBm15RD25j0GgXaJLSHMdBgkkEgtmQWyd4+q2wzd1XCHoEGe2COi0w5AJzNzCHACctyPCfI3VX+J8AjlcwPMoghhLcgcPCM0kOl98xEbLfZ5mWOc4NbABiRoATmEyefRLXMedk04iMoa0ggnxXEW/aRzm/ogqtX6X7pOZJvbYSBwwjVdoYYuMmwW+FMuk6D59Cis4lRTp9MXPI1pFWUABAWNWmi5WdQIJRVCFJ2LXiFo2vNipXCDcVLKTg9FKXJBJaurFldREpwfs2mGEKsLchVypjQlM40LUFUhQIk6BezVpUL1mSqyicjKNhUTfh3EjokjWyV6XhGBZE7p2Dk2T+TwUdhzXucEi4o0hy9SylCXcT4dnVU42tEGHKoz30eaqkwshh3HReip8LGiY0eHtA0U7wNvbKn5cY9HmsLwuo4RtyKZ0fZtp+IJ3TytQeO40GaGU5RjFbE/ics3UTtL2XoAeJgK85xjAjD1HXIaSDSy3kH4hP7SEbU9qXGwCqzD1MSCcxBiW9FkZxb+UqxSyQd5Ho83SqFrpGhsexTZ8EABrWlrYcQT4iJvffsk2Nw7qbi14gj59ua34bxBvhY4RFmuGpvMO+gWYs8Yz4S9nSatWgt1IkOMaAT02CW1sJunIotIkuvsN//wBco1CNZg3M8NQOptcPEcs5m9BvCpyYY5FTMUqFWG4VV917wN8IF7xqToN1ak61wDY6315dUx/RuaHMZWe1juYIkayW9UufiK+VzSacBoaJaM0TPg5FeS4KkjLbOYqoDAgAgBtgB4W843mbqPr5G9do5/wsKVMgFzpNrnrbX1WbjmP8rHN19wkktEoWLS4SJkjmdYPdG06wa4uIgAuMAkRrYHVDteQA2bTmubDa4Up4N1VpANpv5f7QuXCOuwZSS3IAxGOc92ZxJsA2TMNGgHRdw9N1Q9N+ydYT2faLvKvxENa3KwQoOGRq5sU/Ki3xgLa9QCwEALNlRYlSVO57DUVQYKi46ohBUXDUXviGcC1dyCeVq9yxIUuWVsfBUUUXYXEgaeidTVMi3WLiuxJI5ibK5FUhbBVehaCTMlxRxWZJS2w0jRok2XouH5mtEJRw7DEm69PQo5QOSr8eL7IvLyL9Ibh3khX92UC3HtaYlFPxrSNVbRzJQkvRZtJSrVDRqhamLAFiEix9eo462S5zURmPC5vYbjsdMwV5zFOLitnPcTCPwnDyVFJvI6OjBRwqwXA8PnVMsRjTQbAR9LDimJK83x/Gh5geac0sWO/YMJPNPfQsx+LNZxLvJAFkIjKumlK5juTuXZ1YNRVIo3GVAIDvoVvS43iAQTUc8CwDyX23AJuEPUYBzlYkI5TywaqT/kZSZ6E+1Gac1IjYQ8vgDYZlKXF6BJztqRlMZQJz7b6LzsLoamx87OtPZnCJviMQ52p8hoE0wvGvd4c0DTDpuHcvuUvwuHnlpN10tE9EcXkheRvbBlxfZocSXxDYjU/ZOMBXgQk7SNrIijUhejmk5XJk+Zc1Q+dXsl2KuuNrKr3SnSnaJIQ4sBqU0NUKOqoKqFDkRbBmOZVLlxyqpHJlCQVg6GcgL1+F9mm5ZjVeQ4XiMlQHZfUOG1w9gI5LqeDGEoXWzm+dknBquhAPZlnJdXoXuuorfhx+hD+IyfU8E51liXKKLnzZ0YonvFV1RRRLcmMpGbTJher4Xw2mW3EqKKzxEmm2SedJxiqAOKPLKjWsH+k7pVpYAVFE7H+pkuVflxYrxWDkzKwc12xUURyQUJugd+YbqtNrnGAVFFLJboov5bGeGwAFymdBvJRRPhFIgnJy7F3tFjYbAXkHOUUUflSfOjreJFLHo5Ks0qKKayphDYOoVH4Zh2jsoomdoVbT0Z/pG8yuvDYiFFEt66Dtvsyc5Z51FEiUmMSLsctmOUUTIMGSCGvV866oqUxDRm9yGqriiCQcAV4WZUUUMlspRVew9lOLH4CooqvBm45aXsR5cFLG		7PUPkqKKLtnBP//Z';
		$temp2['amount'] = $amount;
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;


    	array_push($contact, $temp2);
    

	}
    
}
$mysqle =  "SELECT * FROM wallet";
$result = mysqli_query($con,$mysqle);



if(mysqli_num_rows($result)!=0  ){

$stmt = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC  ");

	$stmt->execute();
	
	$stmt->bind_result($id_autu,$id,$image1 ,$first_name,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
		    $id_new1= $id_autu; 

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='3';
     		$temp['y']='2';
     	//$temp1['id1'] =  $id_new1; 
     	
        $temp['image1']=$image1;
		$temp['id'] = $id; 
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
		//$temp['amount'] = $amount;
		//	$temp['color'] = "12";
	//	$temp['type_other'] = "5";

    
    		array_push($contact, $temp);
	}
}
	

	$mysqle =  "SELECT * FROM jewelery";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt4 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt4->execute();
	$stmt4->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
  $id_new4= $id_autu; 
  
 	while($stmt4->fetch()){
		$temp4 = array();
     //	$id_new= $id_post; 
     $temp4['y']='2';
      $temp4['x']='4';
		$temp4['id'] = $id;
		
		     //   $id_new4= $id_autu;
		       // $temp4['id1'] =  $id_new4; 
			$temp4['image1']=$image1;
		$temp4['first_name']=$first_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	
array_push($contact, $temp4);
    	
	}
   
}
	
	$mysqle =  "SELECT * FROM offical_doc";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt5 = $con->prepare("SELECT post.id,user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");	
	$stmt5->execute();
	$stmt5->bind_result( $id_autu,$id,$image1 ,$first_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
  $id_new5= $id_autu; 
 	while($stmt5->fetch()){
		$temp5 = array();
	//	 $id_new5= $id_autu;
		// 	$temp5['id1'] =  $id_new5; 
     //	$id_new= $id_post;
     	$temp5['y']='2';
      $temp5['x']='5';
		$temp5['id'] = $id; 
	  	$temp5['image1']=$image1;
		$temp5['first_name']=$first_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	
    array_push($contact, $temp5);
	}
   
}
	//	if($type_send='no_search'){
echo json_encode(array( "11"=>$contact));

break;

CASE 1:
    
    	$mysqle =  "SELECT * FROM others";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
		$temp3 = array();
	$stmt3 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id_autu,$id,$image1 ,$first_name  ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
 $id_new3= $id_autu;
 
 	while($stmt3->fetch()){
	
        $temp3['x']='1';
        	$temp3['y']='2';
      //  $id_new3= $id_autu;
        //$temp3['id1'] =  $id_new3; 
		$temp3['id'] = $id; 
		$temp3['image1']=$image1;
		$temp3['first_name']=$first_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	

    array_push($contact, $temp3);
    	

	} 
	}


//	echo json_encode($contact);

$mysqle =  "SELECT * FROM money";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	
$stmt2 = $con->prepare("SELECT post.id, user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");

	$stmt2->execute();
	$stmt2->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
//		$contact = array();
$id_new2= $id_autu; 
	while($stmt2->fetch()){
		$temp2 = array();
		$temp2['x']='2';
// 		$id_new2= $id_autu;
	//	$temp2['id1'] =  $id_new2; 
			$temp2['y']='2';
		$temp2['id'] = $id; 
		$temp2['image1']=$image1;
		$temp2['first_name']=$first_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';//ata:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUTEhIVFRUVFRUVEBcVFRUPFRUSFRUWFhUVFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGy0mICUtLS0tLS8tLS0uLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBFAMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQACAwEGB//EADkQAAEDAgQEAwcEAgEEAwAAAAEAAhEDIQQSMUEFUWFxIoGRBhMyobHR8BRCweFS8YIjYpLSFTNy/8QAGgEAAwEBAQEAAAAAAAAAAAAAAgMEAQUABv/EAC0RAAICAgICAAQFBAMAAAAAAAABAhEDIRIxBEETIlFhFCMygZFCcfDxBaHR/9oADAMBAAIRAxEAPwDwnDA5PGtMILhtJOW07L6fHGkfLeRkuQFncoSUa2itBh0YjmhQ/Mq5SU4dhlkcOsoJZULBSXXUkxFBd/TLOJvxRFWpELJgTuthkC/CQbIXAfDKmiUaSJFJcoBFQjSFTk7BvdKCjC3KpmWg8mUM81g+mUWFHNXmaptF8HXA1RxxghKXU1wUys5HnsMqcR5BQcQQ/uVQ0l6zPlLV+Ik6IMOcTKKdRAaXHYSvL43ir3nIWhhZOaDZ2kG/lA6+i5ZEmkyvx8Ly/p69npHcSY0eIgnkL/PZA1eNTowX0mTz5dkiBJBtpBG0A/Wcw+SuRr017j+ymLZfDwsUe1Y0pcRaToAOmu23mneEcHNkGQdF41/SADtOn9Xt2RWCxr6RlpIEtkHQyATbnvqsWgM/hqS+TTPXCmrFqx4dj21m5hY/uHI/yEU5wCZRx5RlGVMX4mmqYdqIruCyZZYxieqNKt0vr00cXrF4WPZsG0KX4dZMw10zc1VaxL4IpWV0B/p1EdAUW8EZ8RhXDwnFM2SGlVyotuNCJdEeWDk7GgK2YldHEymNFyInnFo0IVci0C6AhF2Ztpq4pLRoWgC0xsEqUELUohMqhSzG1IWjINtgdUALL36GxWJQgroXKi6OJtbGTqyjHSloqSmGDC8nZ6cOKDKdNa+7VjUaxpc4w0CSTyXm8Z7RPc7weFm3M9T9gtStgYcGTM/l/kfupqzGLzQxjna/n5KJpYoiL33Ou+6b8D7lb/4+Vfq/6Hxak2N421pIY3NFpmBPTmheJcTe8ZQYFwY1JEa9OiVtYJIPlvfafn6oeFdjPH8Ct5N/YZVOLVXgsIYAcoMB0w6/0SJ7c1VxPOCT0gE/JMMkCZBtJAGhMgDp/aGZhra33QPHza10dDHjjjVRVF6cmxJIcQHSYzCxGY+XlCu9hcM7iZPP90QNed12lTbpBcSCLCYOgsNf7RNHBmB7wgNbMNm9zf5wmqFBNgJi5i8b/wCWb52WZYY7nuNPrdF+7a3WSf8Ax1j7qDFxGVrRptyOhnUWXnFGneG1XscDBg67SP6ylOv1pKRsxTn2EkwfTV1l39W7Wdjre/M+aXJ+kyXN4yyO/Y69/KnvUto4wExodtpG3miQ5KtkE8Lg6YUHqpcqByhKKwKISqmpC44rCo5C2Go2XNRRCklRDyGcAhtVdlY0wtcq9ZjSQfgXp7hnWXm8O6CnWEqpsXoi8iPsatVgqUjIWi0hZ1q0BWJdC4aq8ZVna4SXiTTBTjPKFxLAVo3G+LPHuYZuqFpTnE4cShnUEhwOpHMmA0ymmDehxQW9OlCKKaBySUkJuLY19VxE+AfC0adz1QjG6m0DYHnayKxdHxuGhG2hvy5hDCxvtp3CrSS6OtijFQSj0E0GacomenM9eiIqiLCNcpvM7yDy0UoMIaCZ8QBjpm19ZCu1g0IE68jYRHKFrkGCtYCL6l2sjlcHeL/VatojqBFtPi3vujMPhp2A0F7kzyHmu1PciziT2t8l7jfZ6xdWMyG23I6rPD4YvMC3M/m/RMGOo7M+Z+ZWlKqzQMj9xudgTz/JRNa0esqKzKbYpi5BzOOp0jtBkoV1UvJnYHzAkieaJfhQRIdADS7xQJlwESInf0QtQC0TOXxcpk6fL1S7PGLaQOWXR/laY1v9B5LFjHG2WdRGmxJE+RKIeW6HpMXkzfdZO0nrf66IWmwiraRgG8ODgCLTA0vqJhZ0WZiADHchosJNzYK7XkGQSDpOh+XdUe0R1MRtEfg9EtwZ4o6tdpF4Df8AtuBEeG/nqi8HjgYa6ZgXjWYH869ENmIPh/a4uabE7ROx0+ZWFU21sNO9pAQSjQM8amqZ6RrVaFjwqoX05d8QOV3fY+iIqNWHHkmpOLB6pQbjKLeJXG0VlWMi0jFrFEa2ioi4A/EKNpwrBq4yqtgEKQLb9meVGYSpCwDVo1iJC5U1Q6oVUY16SUKkI5mIEJhFOGzfEVEvOJupia6EpiVjDhBVsZ0MQrVHoJjVoSvWY4qylVsrI0lu1bNpr1BcqAxRWgpIXi/F6dDw/E/XLy7leaqccruPxR0ytt2kLyorw+Jkyrl0j1j8I11y0EjQ2MJNxnChpaWgTOnPrCDw+Lqa+8Nxe8m1r+S0q1SS0tBJbcFx/gp8YPuyzF4s8c75aDqdxrcC40EC4kHa30VWVGSLzrAPoNr6IHFV5JDfh2E/ayq2jA2FvE46CDqCjpFpMQ5xcQCRDoE2iVKVAk3vYj6ifVVbiG6g6HXrOoG6s2tmGkAkamTfXy8liaZuxnTwtKxe7bxNb/2jWdpW/vsOyP8ApyCHbxPn3+iWVrOdlJjRsOBnTWALeS4ylYixJAOsQBMjvMIqB9B4r0CIyctzKEr4YExTecm9rzYkdRYaoYUD1F1ZtF3P87r1II2Zg6Q1JPnHorO4fROjnt53Dh077oV1Z/P7E9Vw1yNWiJiRbr9ljR4No8HpkgGqbxEMv5XQ+K4U5oljw8biIcJ6ctFZtQPEh0GdNNQeXYKnvS0Ah15Mi8tiMu3MayfLcGqPWLXDY2joQeyxrgWgzIBPR24TLEVQ74hJ/wAhY26IXiFANIgRYAzE5x8WmyVNaCGfss+Q9s2BaY0GY5pMdoTWtTS/2TpQyo7YuAHcC/1TCvVhJ9HF8l/nyr/NAdVsKtJyzxGICGZiLrFJWGoNoctUQzKtlEzkIcGLcHVlNqK89hXQmtPEWSYPRVnx70MQtA8JX+qV210xMneJhz6qwOKKEqViuUmkrOQSxJLYex5KOoMQ+FpJlSppiJskktIzVXlEOYhqwXhUXZxtRTG48UqZdqdGjm46JVi65alOPxbqhHILYtN0WYfF+JJX0AVpe4ucZcSS7uVxtNHYHAGoRYhp/dFjeLTrdeiwnDKNFpeRnNwC6csxYARa6PgkrO1yS0J6FNrAM4Obl0jwiOczvoFz3YIGsxLp0N9r/kK+KBMy2ZLjINyZ1IFhvtuuaaDa+94k/dHGVoyiZYuYHPRs/wAJVxKu52hytFtZnmT3Rr2k3N4ub2/LhKcQHPMDQaJWeTcaQcUE4cQANbR23n6+qMyk3JbYW0kjbzQQ4XXA8Pi6DXylD/pq2bKWuk7EJSnKGuLNtP2Nv1TGgEkb2Bk+iuzjAi1Mk6ySBZDUOFZR47Ryuf6R9JlNo+Hw2u48tOwVMVke3oF0CV+PVBJFJgjmXa84CzwntISYdSBHNpuI72KIxPGqDbCkHxuQCPLMh2Y2k6SxgaewBU9t5Kjl/bQXroaNrMeJFuiGxFG9roR+IPMqxrmYd8RAI1tNwAOohVuSBOGR9Ow1IHqtnvDhvIADr3LhMEjX06LlN7HSCSD3JkrF9KowzFhuDPrH8pUt9GkeYNvLcRMi646mCLnabbbfndVBtv8AbkpzBH0m2pnyQs8eg4HVaylkmS0mTzm8/wAeSD4piY0SqliC289/9eqG4hiSfNTZ3whaIvwn5rl9SV8YphsRJStz0TgzdcqOdymWSxJRPV4cy1RVwj/CFxdVPRyJLYquFz3xRdWmhxSuluLLVJM0oAlH06SphmI6m1OjEnyTM6eHRVGgtaTVsGo0iOeRmlFsIphQzFu1GSyN1hWYtmFWcJWAJ0ee4nQkFKcNgsxnUBxaQDB+Hw/nRem4gwBpJ0ASc4imDMENzS6CCR4bDMCJm9kzFHdnZ8GTlFhVKqKQiXAZfBbXpBNmyCsq+PDi5rzZxkRZpd05feEudirT8V7tM6DQ9PiSzFVjGv4U2cklbOgo2PWNN4sI8R8589Pkq1WF2aAC1kBxnSTqLwTAKxwTXCm2mCMzpmXBoG+U8tAsg8gGNcpiN+ebrBI8tLkpblrRoHjsSS/IAJM5v2gT9pTHDYOcpLdWgg/5cyet0rwlKahcXAEgzJIzE9R3HovV8Hw7cvipB27CYIGoP+xzK9hvbkZJm9PD2noABYgAdQB1SnG4kNcS219Qc0co9Uy4tVbTbcHObZpNmix00Ebc15itimtkmHOOgBuJ3PaPmmymkrZiRvisSGQ5xDiRMXkGTLTbskuNxL6vxaDQCwGy3ymo4mLk2HlzsEfguFvqBwY1pyxMkN1m0+RUmSM82rpDFURLQbmtuNOoVX0SLhMqvD3A5m2Ik3i0ahaNpZwLXIuL2PL85pC8X+iXfphchW3FndEUMXEnMfrN58tFTFYf880udIMKXNPLhdS2gkkx3h8VNied4vBABHUQPmjqOIIP18+m687RqQm1J3hknxTESBAIJmNdeSs8bNyQMlQVXpCMzIjUjcduiDJhGsqz4haZDo2JuJ6f+pQeLgG2huPPZUuSoFGb9PPz/wBX+SxiddN1A6V0pLpmi2o2CRyWuGfBVsay880O0wuDkj8LK0M7R6bDV/ColVHE2UV8cyohlg2OarlkCuucqAqwWloMouR1FyVU3ouhVRpickRxRKIa1C4R0o2UZzp9kaFs1UYtAFolmjVoFRoWrAsAZ572qxWXIwAEnxGeQ0/leZdWmLAQI73Jk+qZ+07HPxZYNcrco/4z90jaUalSPo/Cgo4Yr7X/ACbmqQIGoMg9fwBVwtPM7M7Rvzd+XVKzxPhPaRB6SicP8Gt50g3mTM+gjqvN2yoNsQAbOBzTM5g4CIbG3c721WOIaSc2g2AOhgNk31gD1V6NMNLgXSC0XbDvERIBM23nqNFvUptMAWAm5Mzy7HQI4Rt2wRZhqM1YE8wQC6GgGZA8l67APbTpZ3nK0CS42EA328oXm+FFn6jK7PdpgtAdeLAg7df9oP2l4gXRSafA3XbMdienJKy5fhY5NGU5Sovxbj5rv/6YjZpdBsOQ5oGnh3akG5N9ATvB31WXDcMXSRMi7SBm8W08hO69dR4c4O97VLGw2XGA1gBBG9vwKbx1LKueR/2+gyTUdIXYHBzHkYO8cvX5po3h8zEgX3+UrBnGKNOG02uqkA5f2tvykTe2y0qYTEYkeNzQIn3bTlgbZm6+qvjNf0i39wXHcQo0xDR713IHK3zd9khw9VzajnVARnuJMAHNzOosWr1dH2bHfTpyn+Uj9paTGkUWmXWc865RBhvfeOgUnlRdc72ul9w4tdGWKaJjp/P9JTiGeJM2Ee7bOoEG0WGnmhvd5pcszr40F9Qo6B20lvlsALamZmdIEbb+q2p0v77BahpaeRG9jzHmvY/H4o82YUqhBtor4skhptppqQCTr6FFVMIWta4kEPBIg3EGDO421j5LHGzDZIMEhschqdNCTPminFpVZid9AzQo4wugLhXukaC4jVDEI2tRMZuaDcuH5NubbCiyB6iqVFPYdD5j1eVgCrgrtqZA0aZlenWuspVJXnMzjY/wuKTKjWleVo1CnWCqKiE7IM+FLY9pLdoQ2GcjWBMOZLTOtat6bVVrVwVYWC+zx/t3Qy1GPAHiEOPVsxHkV5pi9f7btL6bSNGul3mIXlKBAInmJHMTdYtyPpPAleBfY2dQaWF7XAZcoLSfE5xmS0clbLAAve4OluymPNPOTTBDTpJnvC47EFwEx4RAtty67+qdqymN9huAJaQ6AYuA67SRbSb6rVz2hpmQ60BsZS3VwN7XiNVSlUa67Zbka1pBcDmJJkt/N1V7ZBMRlEuPnA0FpkBNj0e/uDYb/wCw1JIhpb3lDGmMwc4xBzTIBkXHzRuGaXZoEhvicRGmgt3J9eiE4jRFxM9oIJ6eUfNJnFcW0gl2dqcZcHuewh9RxJe9zG3LvitEHVDYjiTnuHv6j6nQEQOw+EeQQtXCkIc04K5GXLmWmv8AwZGMfQ1/+cawRRohp0zvPvHdwIgH1QFPFvD/AHge4PNy4OId66rDIo5inllyydt9fsFSGNfiuJqfFXqH/kWjzhVp0/dlubUmTPUWPUIKm10pjWwxgFxBdIDYuIiZlV+Pc7nTte2C9aB6r75R5lNMLRFpBDSQCYJj+4ul1PDGfy6Z4ao6GsLvDMtBgDMYEk/dX+MpW3JAS+xo/Dt0zifHIcC0eEeG+5N7LENMTFp1i3OPoj64aco8Lc1y58fEJBAI0bolrqlumsdeyqlSBReIE6TbnJF/LUIWs6StK9S97mBBGmgj5IV7lNlmgkWLlwXMKgk6LuWFLkzUa3QzqUrc0oxmHi4TDC4mbFdxTQk5IRyxsng5QlTESiIqUbqLmvHIs5IYAqwKzULl0eRJRvKgas2FbhHHYD0daEfhqsIFq1Dk2LoTNWekweIlOMIZXjcBiIdC9XgaohURlaOX5OLixk+wSvGV4RlauIXmuL4i8ArXpCsGPlKivEMWXNLeYIXmG2KbkoLEsBMjzQKe9na8WofKcZhs2hB8JdrEdENTMkA2ki/Ja4xmVxy6WiLoSqYTMk0v2LI7HOCoSKpY4HLBi1xPOeQNxOizrvGU6m21gDI9f7SejXgiTAm6YMrai92xbc639PkixZ4zWjXFo34W9uYhxdEQcoDjBzQI3vCpXdOtyTBOpgfnyWWBdBcBcmALTry5FEClmLogQC65DTDfO7uiZB3Ex6ZSgPe5g4y5v+R1btc77QhMThptpyVqzixzXtmR6EciihjKT7yGndrjoe51SnwlcJ/7QW+0KCADDrHnsVZ1Ec+yYvwBrGWw7nlIt9lSlh2hvw6HUa9o/lJ/DO2qVeme5mdGkTFpdMRBm15RD25j0GgXaJLSHMdBgkkEgtmQWyd4+q2wzd1XCHoEGe2COi0w5AJzNzCHACctyPCfI3VX+J8AjlcwPMoghhLcgcPCM0kOl98xEbLfZ5mWOc4NbABiRoATmEyefRLXMedk04iMoa0ggnxXEW/aRzm/ogqtX6X7pOZJvbYSBwwjVdoYYuMmwW+FMuk6D59Cis4lRTp9MXPI1pFWUABAWNWmi5WdQIJRVCFJ2LXiFo2vNipXCDcVLKTg9FKXJBJaurFldREpwfs2mGEKsLchVypjQlM40LUFUhQIk6BezVpUL1mSqyicjKNhUTfh3EjokjWyV6XhGBZE7p2Dk2T+TwUdhzXucEi4o0hy9SylCXcT4dnVU42tEGHKoz30eaqkwshh3HReip8LGiY0eHtA0U7wNvbKn5cY9HmsLwuo4RtyKZ0fZtp+IJ3TytQeO40GaGU5RjFbE/ics3UTtL2XoAeJgK85xjAjD1HXIaSDSy3kH4hP7SEbU9qXGwCqzD1MSCcxBiW9FkZxb+UqxSyQd5Ho83SqFrpGhsexTZ8EABrWlrYcQT4iJvffsk2Nw7qbi14gj59ua34bxBvhY4RFmuGpvMO+gWYs8Yz4S9nSatWgt1IkOMaAT02CW1sJunIotIkuvsN//wBco1CNZg3M8NQOptcPEcs5m9BvCpyYY5FTMUqFWG4VV917wN8IF7xqToN1ak61wDY6315dUx/RuaHMZWe1juYIkayW9UufiK+VzSacBoaJaM0TPg5FeS4KkjLbOYqoDAgAgBtgB4W843mbqPr5G9do5/wsKVMgFzpNrnrbX1WbjmP8rHN19wkktEoWLS4SJkjmdYPdG06wa4uIgAuMAkRrYHVDteQA2bTmubDa4Up4N1VpANpv5f7QuXCOuwZSS3IAxGOc92ZxJsA2TMNGgHRdw9N1Q9N+ydYT2faLvKvxENa3KwQoOGRq5sU/Ki3xgLa9QCwEALNlRYlSVO57DUVQYKi46ohBUXDUXviGcC1dyCeVq9yxIUuWVsfBUUUXYXEgaeidTVMi3WLiuxJI5ibK5FUhbBVehaCTMlxRxWZJS2w0jRok2XouH5mtEJRw7DEm69PQo5QOSr8eL7IvLyL9Ibh3khX92UC3HtaYlFPxrSNVbRzJQkvRZtJSrVDRqhamLAFiEix9eo462S5zURmPC5vYbjsdMwV5zFOLitnPcTCPwnDyVFJvI6OjBRwqwXA8PnVMsRjTQbAR9LDimJK83x/Gh5geac0sWO/YMJPNPfQsx+LNZxLvJAFkIjKumlK5juTuXZ1YNRVIo3GVAIDvoVvS43iAQTUc8CwDyX23AJuEPUYBzlYkI5TywaqT/kZSZ6E+1Gac1IjYQ8vgDYZlKXF6BJztqRlMZQJz7b6LzsLoamx87OtPZnCJviMQ52p8hoE0wvGvd4c0DTDpuHcvuUvwuHnlpN10tE9EcXkheRvbBlxfZocSXxDYjU/ZOMBXgQk7SNrIijUhejmk5XJk+Zc1Q+dXsl2KuuNrKr3SnSnaJIQ4sBqU0NUKOqoKqFDkRbBmOZVLlxyqpHJlCQVg6GcgL1+F9mm5ZjVeQ4XiMlQHZfUOG1w9gI5LqeDGEoXWzm+dknBquhAPZlnJdXoXuuorfhx+hD+IyfU8E51liXKKLnzZ0YonvFV1RRRLcmMpGbTJher4Xw2mW3EqKKzxEmm2SedJxiqAOKPLKjWsH+k7pVpYAVFE7H+pkuVflxYrxWDkzKwc12xUURyQUJugd+YbqtNrnGAVFFLJboov5bGeGwAFymdBvJRRPhFIgnJy7F3tFjYbAXkHOUUUflSfOjreJFLHo5Ks0qKKayphDYOoVH4Zh2jsoomdoVbT0Z/pG8yuvDYiFFEt66Dtvsyc5Z51FEiUmMSLsctmOUUTIMGSCGvV866oqUxDRm9yGqriiCQcAV4WZUUUMlspRVew9lOLH4CooqvBm45aXsR5cFLG		7PUPkqKKLtnBP//Z';
		$temp2['amount'] = $amount;
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;


    	array_push($contact, $temp2);
    

	}
    
}
$mysqle =  "SELECT * FROM wallet";
$result = mysqli_query($con,$mysqle);



if(mysqli_num_rows($result)!=0  ){

$stmt = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC  ");

	$stmt->execute();
	
	$stmt->bind_result($id_autu,$id,$image1 ,$first_name,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
		    $id_new1= $id_autu; 

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='3';
     		$temp['y']='2';
     		
     	//$temp1['id1'] =  $id_new1; 
     	
        $temp['image1']=$image1;
		$temp['id'] = $id; 
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
		//$temp['amount'] = $amount;
		//	$temp['color'] = "12";
	//	$temp['type_other'] = "5";

    
    		array_push($contact, $temp);
	}
}
	

	$mysqle =  "SELECT * FROM jewelery";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt4 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt4->execute();
	$stmt4->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
  $id_new4= $id_autu; 
  
 	while($stmt4->fetch()){
		$temp4 = array();
     //	$id_new= $id_post; 
      $temp4['x']='4';
		$temp4['id'] = $id;
			$temp4['y']='2';
		     //   $id_new4= $id_autu;
		       // $temp4['id1'] =  $id_new4; 
			$temp4['image1']=$image1;
		$temp4['first_name']=$first_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	
array_push($contact, $temp4);
    	
	}
   
}
	
	$mysqle =  "SELECT * FROM offical_doc";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt5 = $con->prepare("SELECT post.id,user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");	
	$stmt5->execute();
	$stmt5->bind_result( $id_autu,$id,$image1 ,$first_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
  $id_new5= $id_autu; 
 	while($stmt5->fetch()){
		$temp5 = array();
	//	 $id_new5= $id_autu;
		// 	$temp5['id1'] =  $id_new5; 
     //	$id_new= $id_post;
     	$temp5['y']='2';
      $temp5['x']='5';
		$temp5['id'] = $id; 
	  	$temp5['image1']=$image1;
		$temp5['first_name']=$first_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	
    array_push($contact, $temp5);
	}
   
}
	//	if($type_send='no_search'){
echo json_encode(array( "11"=>$contact));

break;




CASE 10:
    	$mysqle =  "SELECT * FROM jewelery";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt4 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt4->execute();
	$stmt4->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
  $id_new4= $id_autu; 
  
 	while($stmt4->fetch()){
		$temp4 = array();
     //	$id_new= $id_post; 
      $temp4['x']='1';
		$temp4['id'] = $id;
			$temp4['y']='3';
		     //   $id_new4= $id_autu;
		        $temp4['id1'] =  $id_new4; 
			$temp4['image1']=$image1;
		$temp4['first_name']=$first_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	
array_push($contact, $temp4);
    	
	}
   
}
$mysqle =  "SELECT * FROM money";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	
$stmt2 = $con->prepare("SELECT post.id, user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");

	$stmt2->execute();
	$stmt2->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
//		$contact = array();
$id_new2= $id_autu; 
	while($stmt2->fetch()){
		$temp2 = array();
		$temp2['x']='2';
// 		$id_new2= $id_autu;
		$temp2['id1'] =  $id_new2; 
		$temp2['y']='3';
		$temp2['id'] = $id; 
		$temp2['image1']=$image1;
		$temp2['first_name']=$first_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';//ata:image/jpeg;base64,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		7PUPkqKKLtnBP//Z';
		$temp2['amount'] = $amount;
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;


    	array_push($contact, $temp2);
    

	}
    
}
    
	$mysqle =  "SELECT * FROM others";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
		$temp3 = array();
	$stmt3 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id_autu,$id,$image1 ,$first_name  ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
 $id_new3= $id_autu;
 
 	while($stmt3->fetch()){
	$temp3['y']='3';
        $temp3['x']='3';
      //  $id_new3= $id_autu;
        $temp3['id1'] =  $id_new3; 
		$temp3['id'] = $id; 
		$temp3['image1']=$image1;
		$temp3['first_name']=$first_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	

    array_push($contact, $temp3);
    	

	} 
	}

$mysqle =  "SELECT * FROM wallet";
$result = mysqli_query($con,$mysqle);



if(mysqli_num_rows($result)!=0  ){

$stmt = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC  ");

	$stmt->execute();
	
	$stmt->bind_result($id_autu,$id,$image1 ,$first_name,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
		    $id_new1= $id_autu; 

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='4';
     	$temp['y']='3';
     //	$temp1['id1'] =  $id_new1; 
     	
        $temp['image1']=$image1;
		$temp['id'] = $id; 
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
		//$temp['amount'] = $amount;
		//	$temp['color'] = "12";
	//	$temp['type_other'] = "5";

    
    		array_push($contact, $temp);
	}
}
//	echo json_encode($contact);


	


	
	$mysqle =  "SELECT * FROM offical_doc";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt5 = $con->prepare("SELECT post.id,user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");	
	$stmt5->execute();
	$stmt5->bind_result( $id_autu,$id,$image1 ,$first_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
  $id_new5= $id_autu; 
 	while($stmt5->fetch()){
		$temp5 = array();
	//	 $id_new5= $id_autu;
		 	$temp5['id1'] =  $id_new5;
		 	$temp5['y']='3';
     //	$id_new= $id_post; 
      $temp5['x']='5';
		$temp5['id'] = $id; 
	  	$temp5['image1']=$image1;
		$temp5['first_name']=$first_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	
    array_push($contact, $temp5);
	}
   
}
	//	if($type_send='no_search'){
echo json_encode(array( "11"=>$contact));

break;


CASE 12:
    
    $mysqle =  "SELECT * FROM money";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	
$stmt2 = $con->prepare("SELECT post.id, user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");

	$stmt2->execute();
	$stmt2->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
//		$contact = array();
$id_new2= $id_autu; 
	while($stmt2->fetch()){
		$temp2 = array();
		$temp2['x']='1';
			$temp2['y']='4';
// 		$id_new2= $id_autu;
		$temp2['id1'] =  $id_new2; 
		
		$temp2['id'] = $id; 
		$temp2['image1']=$image1;
		$temp2['first_name']=$first_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';//ata:image/jpeg;base64,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		7PUPkqKKLtnBP//Z';
		$temp2['amount'] = $amount;
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;


    	array_push($contact, $temp2);
    

	}
    
}

$mysqle =  "SELECT * FROM wallet";
$result = mysqli_query($con,$mysqle);



if(mysqli_num_rows($result)!=0  ){

$stmt = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC  ");

	$stmt->execute();
	
	$stmt->bind_result($id_autu,$id,$image1 ,$first_name,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
		    $id_new1= $id_autu; 

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='2';
     	$temp['y']='4';
     	$temp1['id1'] =  $id_new1; 
     	
        $temp['image1']=$image1;
		$temp['id'] = $id; 
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
		//$temp['amount'] = $amount;
		//	$temp['color'] = "12";
	//	$temp['type_other'] = "5";

    
    		array_push($contact, $temp);
	}
}
    
    	$mysqle =  "SELECT * FROM others";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
		$temp3 = array();
	$stmt3 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id_autu,$id,$image1 ,$first_name  ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
 $id_new3= $id_autu;
 
 	while($stmt3->fetch()){
	$temp3['y']='4';
        $temp3['x']='3';
      //  $id_new3= $id_autu;
        $temp3['id1'] =  $id_new3; 
		$temp3['id'] = $id; 
		$temp3['image1']=$image1;
		$temp3['first_name']=$first_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	

    array_push($contact, $temp3);
    	

	} 
	}
	
    	$mysqle =  "SELECT * FROM jewelery";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt4 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt4->execute();
	$stmt4->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
  $id_new4= $id_autu; 
  
 	while($stmt4->fetch()){
		$temp4 = array();
     //	$id_new= $id_post; 
      $temp4['x']='4';
      $temp4['y']='4';
		$temp4['id'] = $id;
		     //   $id_new4= $id_autu;
		        $temp4['id1'] =  $id_new4; 
			$temp4['image1']=$image1;
		$temp4['first_name']=$first_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	
array_push($contact, $temp4);
    	
	}
   
}
//	echo json_encode($contact);


	


	
	$mysqle =  "SELECT * FROM offical_doc";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt5 = $con->prepare("SELECT post.id,user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");	
	$stmt5->execute();
	$stmt5->bind_result( $id_autu,$id,$image1 ,$first_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
  $id_new5= $id_autu; 
 	while($stmt5->fetch()){
		$temp5 = array();
	//	 $id_new5= $id_autu;
		 	$temp5['id1'] =  $id_new5; 
     //	$id_new= $id_post; 
     $temp5['y']='4';
      $temp5['x']='5';
		$temp5['id'] = $id; 
	  	$temp5['image1']=$image1;
		$temp5['first_name']=$first_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	
    array_push($contact, $temp5);
	}
   
}
	//	if($type_send='no_search'){
echo json_encode(array( "11"=>$contact));

break;

	
	
	
	
	
	
	CASE 9:
	    
	    	$mysqle =  "SELECT * FROM offical_doc";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt5 = $con->prepare("SELECT post.id,user.id , user.image,user.first_name, offical_doc.id_post ,offical_doc.card_id, offical_doc.type_doc, offical_doc.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM offical_doc JOIN post ON post.id = offical_doc.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC");	
	$stmt5->execute();
	$stmt5->bind_result( $id_autu,$id,$image1 ,$first_name ,$id_post,$card_id, $type_doc ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
  $id_new5= $id_autu; 
 	while($stmt5->fetch()){
		$temp5 = array();
	//	 $id_new5= $id_autu;
	  $temp5['y']='5';
		 	$temp5['id1'] =  $id_new5; 
     //	$id_new= $id_post; 
      $temp5['x']='1';
		$temp5['id'] = $id; 
	  	$temp5['image1']=$image1;
		$temp5['first_name']=$first_name;
		$temp5['id_post'] = $id_post; 
		$temp5['image'] = $image; 
		$temp5['card_id'] = $card_id;
		$temp5['type_doc'] = $type_doc;
		$temp5['type'] = $type;
		$temp5['lost_found'] = $lost_found;
		$temp5['latitude'] = $latitude;	
		$temp5['longitude'] = $longitude;
		$temp5['area_name'] = $area_name;
		$temp5['date_time'] = $date_time;
		$temp5['reward'] = $reward;
		$temp5['spacification'] = $spacification;


    	
    array_push($contact, $temp5);
	}
   
}
    
    $mysqle =  "SELECT * FROM money";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	
$stmt2 = $con->prepare("SELECT post.id, user.id , user.image,user.first_name, money.id_post , money.amount,  post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM  money JOIN post ON post.id = money.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");

	$stmt2->execute();
	$stmt2->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $amount ,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
//		$contact = array();
$id_new2= $id_autu; 
	while($stmt2->fetch()){
		$temp2 = array();
		$temp2['x']='2';
// 		$id_new2= $id_autu;
		$temp2['id1'] =  $id_new2; 
		$temp2['y']='5';
		
		$temp2['id'] = $id; 
		$temp2['image1']=$image1;
		$temp2['first_name']=$first_name;
		$temp2['id_post'] = $id_post;  
		$temp2['image']='http://track-kids.com/image_post/294432.435.jpg';//ata:image/jpeg;base64,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		7PUPkqKKLtnBP//Z';
		$temp2['amount'] = $amount;
		$temp2['type'] = $type;
		$temp2['lost_found'] = $lost_found;
		$temp2['latitude'] = $latitude;	
		$temp2['longitude'] = $longitude;
		$temp2['area_name'] = $area_name;
		$temp2['date_time'] = $date_time;
		$temp2['reward'] = $reward;
		$temp2['spacification'] = $spacification;


    	array_push($contact, $temp2);
    

	}
    
}
   	$mysqle =  "SELECT * FROM others";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
		$temp3 = array();
	$stmt3 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, others.id_post , others.color, others.image ,  others.type_other, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    others JOIN post ON post.id = others.id_post  JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt3->execute();
	$stmt3->bind_result($id_autu,$id,$image1 ,$first_name  ,$id_post , $color ,$image,$type_other,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
 $id_new3= $id_autu;
 
 	while($stmt3->fetch()){
	$temp3['y']='5';
        $temp3['x']='3';
      //  $id_new3= $id_autu;
        $temp3['id1'] =  $id_new3; 
		$temp3['id'] = $id; 
		$temp3['image1']=$image1;
		$temp3['first_name']=$first_name;
		$temp3['id_post'] = $id_post; 
		$temp3['image'] = $image; 
		$temp3['color'] = $color;
		$temp3['type_other'] = $type_other;
		$temp3['type'] = $type;
		$temp3['lost_found'] = $lost_found;
		$temp3['latitude'] = $latitude;	
		$temp3['longitude'] = $longitude;
		$temp3['area_name'] = $area_name;
		$temp3['date_time'] = $date_time;
		$temp3['reward'] = $reward;
		$temp3['spacification'] = $spacification;
	

    array_push($contact, $temp3);
    	

	} 
	}
    	$mysqle =  "SELECT * FROM jewelery";
$result = mysqli_query($con,$mysqle);


if(mysqli_num_rows($result)!=0 ){
	$stmt4 = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, jewelery.id_post , jewelery.type_jewelery, jewelery.image , post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM   jewelery JOIN post ON post.id = jewelery.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC ");
	$stmt4->execute();
	$stmt4->bind_result($id_autu,$id,$image1 ,$first_name ,$id_post , $type_jewelery ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
 
  $id_new4= $id_autu; 
  
 	while($stmt4->fetch()){
		$temp4 = array();
     //	$id_new= $id_post; 
      $temp4['x']='4';
		$temp4['id'] = $id;
		     //   $id_new4= $id_autu;
		     $temp4['y']='5';
		        $temp4['id1'] =  $id_new4; 
			$temp4['image1']=$image1;
		$temp4['first_name']=$first_name;
		$temp4['id_post'] = $id_post; 
		$temp4['image'] = $image; 
		$temp4['type_jewelery'] = $type_jewelery;
		$temp4['type'] = $type;
		$temp4['lost_found'] = $lost_found;
		$temp4['latitude'] = $latitude;	
		$temp4['longitude'] = $longitude;
		$temp4['area_name'] = $area_name;
		$temp4['date_time'] = $date_time;
		$temp4['reward'] = $reward;
		$temp4['spacification'] = $spacification;
	
array_push($contact, $temp4);
    	
	}
   
}
    
 

$mysqle =  "SELECT * FROM wallet";
$result = mysqli_query($con,$mysqle);



if(mysqli_num_rows($result)!=0  ){

$stmt = $con->prepare("SELECT post.id, user.id, user.image,user.first_name, wallet.id_post , wallet.amount, wallet.image, post.type ,post.lost_found  ,post.latitude ,post.longitude ,post.area_name ,post.date_time  ,post.reward  ,post.spacification  FROM    wallet JOIN post ON post.id = wallet.id_post JOIN user ON  post.id_user=user.id ORDER BY id_post DESC  ");

	$stmt->execute();
	
	$stmt->bind_result($id_autu,$id,$image1 ,$first_name,$id_post , $amount ,$image,$type ,$lost_found,$latitude ,$longitude,$area_name ,$date_time ,$reward ,$spacification );
		    $id_new1= $id_autu; 

	while($stmt->fetch()){
		$temp = array();
		$temp['x']='5';
     	$temp['y']='5';
     	$temp1['id1'] =  $id_new1; 
     	
        $temp['image1']=$image1;
		$temp['id'] = $id; 
		$temp['first_name']=$first_name;
		$temp['id_post'] = $id_post; 
		$temp['image'] = $image; 
		$temp['amount'] = $amount;
		$temp['type'] = $type;
		$temp['lost_found'] = $lost_found;
		$temp['latitude'] = $latitude;	
		$temp['longitude'] = $longitude;
		$temp['area_name'] = $area_name;
		$temp['date_time'] = $date_time;
		$temp['reward'] = $reward;
		$temp['spacification'] = $spacification;
		//$temp['amount'] = $amount;
		//	$temp['color'] = "12";
	//	$temp['type_other'] = "5";

    
    		array_push($contact, $temp);
	}
}
//	echo json_encode($contact);


	


	

	//	if($type_send='no_search'){
echo json_encode(array( "11"=>$contact));
break;
	





	
	}
	
	
	
	
	

	
	

	


    
	
?>