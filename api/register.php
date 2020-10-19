<?php

  include('../db_credentails.php');
  include('../utils.php');

  $email=$_POST[$EMAIL];
  $pwd=$_POST[$PASSWORD];
  $name=$_POST[$NAME];
  $mobile_number=$_POST[$MOBILE_NUMBER];
  $response=new  stdClass();
  
  if($con){
      if($email == "" && $pwd=="" && $name=="" && $mobile_number==""){
          $response->status="Fields can't be empty";
          $response->code=100;
      }
      else{
    
    $query="INSERT INTO customer(email,password,mobile_number,name) VALUES ('".$email."','".$pwd."','".$mobile_number."','".$name."')";
    $data=mysqli_query($con,$query);
    if($data){
        $response->status="You are registered...";
        $response->code=200;
    }
    else{
        $response->status="Registration fails..(Might Be Same Email Exist)";
        $response->code=205;
    }
  }
  }
  else{
      $response->status="Network Error...";
      $response->code=400;
  }
   echo json_encode($response);
   mysqli_close($con);
?>


