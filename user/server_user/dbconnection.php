<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "sehar";

// connection

$con = mysqli_connect("$host","$username","$password","$database")
or die("Couldn't connect to");


//check connection

// if(!$con)
// {
//     header("Location: ../errors/dberror.php");
//     die();
//     // die(mysqli_connect_errno($con));
// }
// // else{
// //     echo "database connected.!"; 
// // }

// ?>