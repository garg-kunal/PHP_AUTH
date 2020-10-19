<?php 

 include('../db_credentails.php');
 if($con){
 $query="SELECT * FROM category";
 $result=mysqli_query($con,$query);
 $response=new stdClass();

 if($result){
     $response->data=mysqli_fetch_row($result);
     $response->code=200;
 }
 else{
     $response->data="No Category found";
     $response->code=201;
 }
}
else{
$response->data=null;
$response->code=400;
}
echo json_encode($response);
 ?>