<?php
session_start();

include('server_user/dbconnection.php');

if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;
}


if(isset($_GET['logout'])) {
  if(isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    header('Location: login.php');
    exit;
  }
}


if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $email = $_SESSION['email'];

   // checks if passwords match
   if($password !== $c_password){
    header('location: account.php?error=Passwords do not match!');
  }
  // checks if password is 8 character long
  elseif(strlen($password) < 8){
    header('location: account.php?error=Password must be 8 characters long!');
  }
  // no error
  else{
    $stm=$con->prepare("UPDATE users SET password=? WHERE email=?");
    
    $stm->bind_param('ss',$password,$email);

    if($stm->execute()){
      header('location: account.php?message=Password updated successfully!');
    }
    else{
      header('location: account.php?error=Could not update password');
    }
  }
}

// get orders
if(isset($_SESSION['logged_in'])){

  // getting userid
  $user_id = $_SESSION['id'];

  $stm = $con->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY order_id DESC");

  $stm->bind_param('i',$user_id); 

  $stm->execute();

  $orders = $stm->get_result();

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



    <!-- account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
        <p class="mt-5 text-center" style='color: green'><b><?php if(isset($_GET['payment_message'])){echo $_GET['payment_message'];} ?></b></p>
          <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
          <p class="text-center" style='color: green'><b><?php if(isset($_GET['register_success'])){echo $_GET['register_success'];} ?></b></p>
           <p class="text-center" style='color: green'><b><?php if(isset($_GET['login_success'])){echo $_GET['login_success'];} ?></b></p>
            <h2 class="font-weight-bold">Account Info</h2>
            <hr>
            <div class="account-info">
              <p>Name: <span><?php if(isset($_SESSION['name'])){echo ($_SESSION['name']);} ?></span></p>
              <p>Email: <span><?php if (isset($_SESSION['email'])){echo ($_SESSION['email']);} ?></span></p>
              <p><a href="#orders" id="order-btn">Your Orders</a></p>
              <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="account-form" method="POST" action="account.php">
              <p style='color:red' class="text-center"><b><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></b></p>
              <p style='color:#71C598' class="text-center bold-message"><?php if(isset($_GET['message'])){echo $_GET['message'];} ?></p>
              <h3>Change Password</h3>
              <hr>
              <div class="form-gorup">
                  <label>Password</label>
                  <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
              </div>
              <div class="form-gorup">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" id="account-password-confirm" name="c_password" placeholder="Confirm Password" required>
              </div>
              <div class="form-gorup">
                  <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
              </div>
            </form>
          </div>
        </div>
    </section>



    <!-- orders -->
    <section id="orders" class="orders container my-4 py-4">
      <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr>
        <table class="table mt-5 pt-5">
          <tr>
              <th>Order Id</th>
              <th>Cost</th>
              <th>Status</th>
              <th>Date</th>
              <th>Order Details</th>
          </tr>

          <?php
            while($row = $orders->fetch_assoc()){
          ?>
          <tr>
            <td>
              <div class="product-info">
                <!-- <img> -->
                <!-- <div>
                  <p class="mt-3"><?php echo $row['order_id']; ?></p>
                </div> 
              </div> -->
              <span><?php echo $row['order_id'] ?></span>
            </td>
            <td>
              <span><?php echo $row['order_cost'] ?></span>
            </td>
            <td>
              <span><?php echo $row['order_status'] ?></span>
            </td>
            <td>
              <span><?php echo $row['order_date'] ?></span>
            </td>
            <td>
              <form method="POST" action="order_details.php">
                <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id">
                <input class="btn orders_details-btn" name="order_details" type="submit" value="Details">
              </form>
            </td>
          </tr>


          <?php 
            }
          ?>

        </table>
    </section>
  
  

  
  <!-- footer -->
  <?php
    include('footer.php');
   ?>
        

    
                            
  
      <!-- <linking js cdn  -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  </html>