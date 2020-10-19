<?php
  include('../middleware.php');
  include('../db_credentails.php');
  include('../utils.php');

  $email=$_POST[$EMAIL];
  $pwd=$_POST[$PASSWORD];
  $name=$_POST[$NAME];
  $mobile_number=$_POST[$MOBILE_NUMBER];
  $response=new  stdClass();
  
  if($con && $status){
      if($email == "" && $pwd=="" && $name=="" && $mobile_number==""){
          $response->status="Fields can't be empty";
          $response->code=100;
      }
      else{
    

        $filename = $_FILES["pic"]["name"];
       
        


        $tempname = $_FILES["pic"]["tmp_name"];
        $folder = "../pics/" . $filename;
        move_uploaded_file($tempname, $folder);


    $query="UPDATE customer SET mobile_number='".$mobile_number."',name='".$name."' WHERE email='".$email."' ";
    $data=mysqli_query($con,$query);
    if($data){
        $response->status="Profile Updated";
        $response->code=200;
    }
    else{
        $response->status="Error Occur Try Again Later";
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






// $di  = "../pics/";
// $pics3 = count($_FILES['pic']['name']);
//   for($i = 0; $i <= $pics3; $i++) {
  
      
//       $pic1 = $di . $_FILES['pic']['name'][$i];
//       $dbpic[] = $_FILES['pic']['name'][$i];
//         $pic = $_FILES['pic']['tmp_name'][$i];
//         move_uploaded_file($pic, $pic1);
        
//         //pass dbfile variable to database to insert all the multiple image file name in db
//   $dbfile = implode(", ", $dbpic);   
//   }    
  
  