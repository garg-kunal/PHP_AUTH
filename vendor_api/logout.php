<?php
 include('../utils.php');
 include('../db_credentails.php');
 include('../middleware.php');

 $email=$_POST[$EMAIL];
 
 $response=new stdClass();
 if($status){
    $query = "DELETE from tokens Where email='" . $email . "'";
    $data = mysqli_query($con, $query);
    if($data){
       $response->code=200;
       $response->status="Logout Succesfully";
    }
    else{
       $response->code=400;
       $response->status="Try Again After Sometime";
    }
 }
 
 echo json_encode($response);
 mysqli_close($con);
?>



