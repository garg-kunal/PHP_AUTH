<?php

include('../utils.php');
$Email = $_POST[$EMAIL];
$Password = $_POST[$PASSWORD];
include('../db_credentails.php');
$response = new stdClass();

if ($Email != "" && $Password != "") {
    $query = "DELETE from tokens Where email='" . $Email . "'";
    $data = mysqli_query($con, $query);
        $sql = "SELECT * FROM customer WHERE email='" . $Email . "' AND password='" . $Password . "'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 1) {
            $token = rand(100000, 999999);
            $query_1 = "INSERT INTO tokens(email,token) VALUES('" . $Email . "','" . $token . "')";
            $final = mysqli_query($con, $query_1);
            if ($final) {
                $row=mysqli_fetch_assoc($result);
                $response->token = $token;
                $response->name=$row['name'];
                $response->mobile_number=$row['mobile_number'];
                $response->email=$Email;
                $response->status = "Login successful";
                $response->code=200;
            } else {
                $response->token = null;
                $response->status = "Failed Try Again... ";
                $response->code=201;
            }
        }
        else {
            $response->token = null;
            $response->status ="Email and Password didn't match";
            $response->code=205;
        }
} 
else {
    $response->token = null;
    $response->code=400;
    $response->status = "Fields can't be empty";
}

mysqli_close($con);
echo json_encode($response);
?>