<?php
 include('./db_credentails.php');
 include('./utils.php');
  
 $email=$_POST[$EMAIL];
 $token=$_POST[$TOKEN];
 $response=new stdClass();

 $query = "SELECT * FROM tokens WHERE email='" . $email . "' AND token='".$token."'";
 $data = mysqli_query($con, $query);
 if (mysqli_num_rows($data) == 1) {
    $status=true;
    $response->code=200;
    $response->status="Already sign in";
 } 
 else{
    $response->code=400;
   $response->status="Session Expires.Login Again..";
 }
 echo json_encode($response);
 mysqli_close($con);
?>









