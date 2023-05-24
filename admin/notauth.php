<?php 



session_start(); 

if(isset($_SESSION['status'])){

    echo $_SESSION['status'];
    unset($_SESSION['status']); 
}


?> 

<h1><a href='admin_login.php'>Go Back!</a></h1>
