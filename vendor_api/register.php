<?php

  include('../db_credentails.php');
  include('../utils.php');

  $email=$_POST[$EMAIL];
  $pwd=$_POST[$PASSWORD];
  $name=$_POST[$OWNER_NAME];
  $mobile_number=$_POST[$MOBILE_NUMBER];
  $state=$_POST[$STATE];
  $opening_time=$_POST[$OPENIND_TIME];
  $closing_time=$_POST[$CLOSING_TIME];
  $business_name=$_POST[$BUSINESS_NAME];
  $description=$_POST[$DESCRIPTION];
  $street=$_POST[$STREET];
  $landmark=$_POST[$LANDMARK];
  $city=$_POST[$CITY];
  $pincode=$_POST[$PINCODE];
  $payment_method=$_POST[$PAYMENT_METHOD];
  $shipping=$_POST[$SHIPPING];
  $store_hours=$_POST[$STORE_HOURS];

  $response=new  stdClass();
  
  if($con){
      if($email == "" && $pwd=="" && $name=="" && $mobile_number=="" && $city=="" && $business_name=="" && $payment_method==""){
          $response->status="Fields can't be empty";
          $response->code=100;
      }
      else{
    
    $query="INSERT INTO vendor(email,password,mobile_number,name,state,opening_time,closing_time,business_name,description,street,landmark,city,pincode,payment_method,shipping,store_hours) 
                           VALUES ('".$email."','".$pwd."','".$mobile_number."','".$name."','".$state."','".$opening_time."','".$closing_time."','".$business_name."','".$description."','".$street."','".$landmark."','".$city."','".$pincode."','".$payment_method."','".$shipping."','".$store_hours."')";
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


