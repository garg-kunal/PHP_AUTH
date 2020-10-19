<?php
 $email=$_POST['email'];
 $token=$_POST['token'];

  include('../db_credentails.php');
  include('../utils.php');
  include('../middleware.php');

  $email=$_POST[$EMAIL];
  $token=$_POST[$TOKEN];

  if($status){
     $query="SELECT * FROM customer WHERE email='".$email."'";
     $data=mysqli_query($con,$query);
     if($data){
        echo json_encode(mysqli_fetch_assoc($data));
     }
     else{
         echo json_encode("Not Profile exist for this user");
     }
    
  }
?>

