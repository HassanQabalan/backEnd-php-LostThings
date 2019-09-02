<?php 
include("config.php");

	$id_post_update=$_POST['id_post_update'];
     	$text=$_POST['text'];
	    	$image=$_POST['image'];
	    	$rand = rand(000000,999999);
 $image_url="$rand.$id_user";
 $uploadpath = "image_post/$image_url.jpg";
  $url = "http://track-kids.com/image_post/$image_url.jpg";
  file_put_contents($uploadpath,base64_decode($image));
	
	mysqli_query($con,"UPDATE post SET spacification='$text' WHERE id='$id_post_update'")or die(mysqli_error($con));
	

          if($image  !=""){
     $id_type = mysqli_query($con,"SELECT type FROM post WHERE id ='$id_post_update'");
     $result=mysqli_fetch_array($id_type);
     $id_type=$result['type'];


          if($id_type==11){
	//wallet
	mysqli_query($con,"UPDATE wallet SET image='$url' WHERE id_post='$id_post_update'")or die(mysqli_error($con));
}
else if ($id_type==1 || $id_type==4) {
    //mobile and others 
mysqli_query($con,"UPDATE others SET image='$url' WHERE id_post='$id_post_update'")or die(mysqli_error($con));}

else if ($id_type==10 ) {
    //jewalery
	mysqli_query($con,"UPDATE jewelery SET image='$url' WHERE id_post='$id_post_update'")or die(mysqli_error($con));
}


else if ($id_type==9 ) {
    //off_dec
	mysqli_query($con,"UPDATE offical_doc SET image='$url' WHERE id_post='$id_post_update'")or die(mysqli_error($con));
}
          }
?>