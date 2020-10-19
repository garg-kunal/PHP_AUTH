<?php

include('../db_credentails.php');
include('../utils.php');
include("../middleware.php");

$email = $_POST[$EMAIL];
$pwd = $_POST[$PASSWORD];
$name = $_POST[$OWNER_NAME];
$mobile_number = $_POST[$MOBILE_NUMBER];
$state = $_POST[$STATE];
$opening_time = $_POST[$OPENIND_TIME];
$closing_time = $_POST[$CLOSING_TIME];
$business_name = $_POST[$BUSINESS_NAME];
$description = $_POST[$DESCRIPTION];
$street = $_POST[$STREET];
$landmark = $_POST[$LANDMARK];
$city = $_POST[$CITY];
$pincode = $_POST[$PINCODE];
$payment_method = $_POST[$PAYMENT_METHOD];
$shipping = $_POST[$SHIPPING];
$store_hours = $_POST[$STORE_HOURS];
 $pic = $_POST[$PIC];

$response = new  stdClass();

if ($con && $status) {
    if ($email == "" && $pwd == "" && $name == "" && $mobile_number == "" && $city == "" && $business_name == "" && $payment_method == "") {
        $response->status = "Fields can't be empty";
        $response->code = 100;
    } 
    else {
       


        $query = "UPDATE vendor SET pic='" . $pic. "',mobile_number='" . $mobile_number . "',owner_name='" . $name . "',state='" . $state . "',opening_time='" . $opening_time . "',closing_time='" . $closing_time . "',business_name='" . $business_name . "',description='" . $description . "',street='" . $street . "',landmark='" . $landmark . "',city='" . $city . "',pincode='" . $pincode . "',payment_method='" . $payment_method . "',shipping='" . $shipping . "',store_hours='" . $store_hours . "' WHERE email='" . $email . "'";
        $data = mysqli_query($con, $query);
        if ($data) {
            $response->status = "Profile Updated Successfully";
            $response->code = 200;
        } else {
            $response->status = "Profile Not Updated Try Again After Sometime";
            $response->code = 205;
        }
    }
} else {
    $response->status = "Network Error...";
    $response->code = 400;
}
echo json_encode($response);
mysqli_close($con);
?>

