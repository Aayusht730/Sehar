<?php

session_start();
include('server/dbconnection.php');

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);

    if(mysqli_num_rows($log_query_run) >0){

        foreach($log_query_run as $row){
            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_email = $row['email'];
            $user_password = $row['password'];
            $role = $row['role'];
        }

        $_SESSION['auth'] = "$role";
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'user_password'=>$user_password
        ];

        $_SESSION['status']= "Logged in Successfully!";
        header('Location: index.php');
    }
    else{
        $_SESSION['status']= "Invalid Email or Password!";
        header('Location: admin_login.php');
    }
}

else{
    $_SESSION['status']= "Access Denied";
    header('Location: admin_login.php');
} 


?>