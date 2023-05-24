<?php 
// checking if the cart is empty or not
session_start();

if( !empty($_SESSION['cart'])){

  // let user enter the checkout page


}
else{
  // send user to home page
  header('location: index.php');
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




    <!-- checkout -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="server_user/place_order.php">
                <p></p>
                <div class="form-gorup checkout-small-element">
                    <label>Full Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name Here" required/> 
                </div>
                <div class="form-gorup checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/> 
                </div>
                <div class="form-gorup checkout-small-element">
                    <label>Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required/> 
                </div>
                <div class="form-gorup checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="city" required/> 
                </div>
                <div class="form-gorup checkout-large-element">
                  <label>Address</label>
                  <input type="address" class="form-control" id="checkout-address" name="address" placeholder="address" required/> 
              </div>
              <div class="form-group checkout-btn-container bold">
              <b><p>Total Amount: Rs. <?php echo ($_SESSION['total'])?></p></b>
              </div>
              <div class="form-gorup checkout-btn-container">
              <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/> 
              </div>            
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