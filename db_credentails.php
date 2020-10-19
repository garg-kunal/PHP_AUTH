<?php
	$server="localhost";
	$username="";
	$pwd="";
    $databasename="";

    $con= mysqli_connect($server, $username, $pwd, $databasename);
    if($con){
        echo "";
    }
    else{
        echo mysqli_errno($con);
    }
    

?>