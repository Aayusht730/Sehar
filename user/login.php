<?php

session_start();

include('server_user/dbconnection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stm = $con->prepare("SELECT id,name,email,password FROM users WHERE email = ? AND password = ? LIMIT 1");

  $stm->bind_param('ss',$email,$password);
  
  if($stm->execute()){
    $stm->bind_result($id,$name,$email,$password);
    $stm->store_result();

    if($stm->num_rows()==1){
    $stm->fetch();

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['logged_in'] = true;

    header('location: account.php?login_success=Logged In Successfully!');
    }
  else{
    header('location: login.php?error= Could not verify your account!');
  }
}
else{
  // error
  header('location: login.php?error=Something Went Wrong!');
}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehar</title>

    <!-- linking bootstarp cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- <linking fontaswome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <!-- linking style.css  -->
    <link rel="stylesheet" href="assets/css/style.css" />

</head>
<body>

       <!-- navbar -->
    <?php 
    include ('navbar.php');
    ?>


        <!-- Login -->
        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Login</h2>
            </div>
            <div class="mx-auto container">
              <form id="login-form" action="login.php"  method="POST">
                <p style="color:red;" class="text-center"><b><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></b></p>
                  <div class="form-gorup">
                      <label>Email</label>
                      <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/> 
                  </div>
                  <div class="form-gorup">
                      <label>Password</label>
                      <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/> 
                  </div>
                  <div class="form-gorup">
                      <input type="submit" class="btn" id="login-btn" name=login_btn value="Login"/> 
                  </div>
                  <div class="form-gorup">
                      <a id="registerurl">Don't have an account? 
                        <a href="register.php"> Register</a>
                      </a> 
                  </div>           
                  <!-- <div class="form-gorup">
                      <a id="login-url" class="btn">Continue with Google <i class="fas fa-google"></i></a> 
                  </div>   -->
              </form>
            </div>
        </section>

        

        <!-- footer -->
        <?php
          include('footer.php');
        ?>
        
                  
  



    <!-- <linking js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>