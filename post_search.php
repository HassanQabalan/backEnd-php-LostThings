<?php 
include("config.php");
$text_sarch = $_POST["text_sarch"];

$result = $con->prepare(  "SELECT id_post , type_other FROM others WHERE  type_other LIKE '%$text_sarch%'");
//$result = mysqli_query($con,$mysqle);
$result->execute();
$result->bind_result($id,$spec);
$response = array();

//if(mysqli_num_rows($result)!=0){
$x=array();
while($result->fetch()){
    
    $x['id_user']=$id;
    $x['spacification']=$spec;
    	array_push($response, $x);
    
    // array_push($response , array('id_user'=>$row[0],'spacification'=>$row[9]));
//}

}echo json_encode($response);


//else echo "not_found";

mysqli_close($con);


// $mysqle =  "SELECT * FROM post WHERE  spacification LIKE '%$text_sarch%'";
// $result = mysqli_query($con,$mysqle);
// $response = array();

// if(mysqli_num_rows($result)!=0){

// while($row=mysqli_fetch_array($result)){
    
//     array_push($response , array('id_user'=>$row[0],'spacification'=>$row[9]));
// }

// echo json_encode(array("hasan"=>$response));


?>