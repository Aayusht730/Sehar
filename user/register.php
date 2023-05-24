<?php 

session_start();

include('server_user/dbconnection.php');

// if user has already register take user to account page     
if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST['register'])){

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];


  // checks if number is 10 character long
  if(strlen($phone) < 8){
    header('location: register.php?error=Enter valid phone!');
  }
  // checks if passwords match
  if($password !== $c_password){
    header('location: register.php?error=Passwords do not match!');
  }
  // checks if password is 8 character long
  elseif(strlen($password) < 8){
    header('location: register.php?error=Password must be 8 characters long!');
  }

  // if there is no error
  else{
    // check whether the email is taken or not
    $stmt = $con->prepare("SELECT count(*) FROM users where email=? ");
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->store_result();
    $stmt->fetch();

    if($num_rows != 0){
      header('location: register.php?error=User with this email already exists!');
    }

    else{

      $stm = $con->prepare("INSERT INTO users (name,email,password)
                    VALUES (?,?,?)");

      $stm->bind_param('sss',$name,$email,md5($password));

      // if acc created success
      if($stm->execute()){
        // userid
        $id = $stm->insert_id;
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register_success=You have registered successfully!');
      }
      // acc couldnot be created
      else{
        header('location: register.php?error=Account cannot be created');
      }
    }
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
    include('navbar.php');
    ?>


          <!-- register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" Action="register.php">
              <p style="color:red" class="text-center"><b><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></b></p>
                <div class="form-gorup">
                    <label>Full Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name Here" required/> 
                </div>
                <div class="form-gorup">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="register-phone" name="phone" placeholder="Phone number" required/> 
                </div>
                <div class="form-gorup">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/> 
                </div>
                <div class="form-gorup">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/> 
                </div>
                <div class="form-gorup">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirn-password" name="c_password" placeholder="Confrim Password" required/> 
                </div>
                <div class="form-gorup">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register"/> 
                </div>
                <div class="form-gorup">
                    <a id="login-url" >Already have an account? <a href="login.php">Login</a></a>
                </div>
                <!-- <div class="form-gorup">
                    <a id="login-url" class="btn">Continue with Google <span>Google</span></a> 
                </div>               -->
            </form>
        </div>
    </section>







    <!-- footer-->
    <?php
      include('footer.php');
    ?>
          
          
            
        
        
        
    <!-- <linking js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>