<?php

include('./db_credentails.php');
include('./')
// include('../db_credentails.php');
// include('../utils.php');
// include("../middleware.php");


$pic = $_POST[$PIC];
$pic1=$_FILES['pic']['name'];
$path = "pics/$pic1";
$actualpath ="https://team24seven.online/magic-step/$path";

$response = new  stdClass();

if ($con) {
   
       if(move_uploaded_file($path,base64_decode($pic))){
           echo json_encode("Uploaded..");
       }
       else{
           echo (mysqli_errno(($con)));
       }

       
    
} 
$response->post=$_POST;
echo json_encode($response);
mysqli_close($con);
?>

