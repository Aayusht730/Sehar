<?php

session_start();

if(!isset($_SESSION['auth'])){
    $_SESSION['auth_status'] = "Login to access Dashboard";
    header("Location: admin_login.php"); 
    exit(0);
}
else{
    if($_SESSION['auth'] == "1"){

    }
    else{
        $_SESSION['status'] = "You are not authorised as Admin!";
        header('Location: notauth.php'); 
        exit(0);
    }
}

?>