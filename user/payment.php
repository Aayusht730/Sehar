<?php 
// checking if the cart is empty or not
session_start();

if (!isset($_SESSION['logged_in'])) {
    // Redirect to the login page or show an error message
    header('Location: login.php');
    exit;
  }

if(isset($_POST['order_pay '])){
    $order_status = $_POST['order_status'];
    $total_order = $_POST['total_order'];
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




    <!-- Payment -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">


        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "Not Paid"){ ?>
            <?php $amount = $_POST['total_order'];?>
            <?php //$order_id =$_POST['order_id'];?>
            <b><p>Total Payment: Rs. <?php echo $_POST['total_order'] ?></p></b>
            <div id="paypal-button-container"></div>
            <!-- <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" /> -->
            <!-- <input id="payment-btn" class="btn checkout-btn" type="submit" value="Pay Now"/> -->


        <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
            <?php $amount = $_SESSION['total'];?>
            <?php //$order_id = $_SESSION['order_id']; ?>
          <p><b>Total Amount: Rs. <?php echo $_SESSION['total']; ?></b></p>
          <div id="paypal-button-container"></div>
          <!-- <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" /> -->
          <!-- <input id="payment-btn" class="btn checkout-btn" type="submit" value="Pay Now"/> -->


        

        <?php } else{?>

            <b><p>You don't have an order!</p></b>

        <?php } ?>

        </div>
    </section>

    <!-- <button id="payment-button">Pay with Khalti</button> -->


    <!-- footer -->
    <?php
      include('footer.php');
    ?>
        
                        
    <!-- <linking js cdn  -->
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    

    <!-- PAYPAL -->
    <script src="https://www.paypal.com/sdk/js?client-id=AS28BGj53ZduubF02gMWAy13j_lY144wKiKcbeE14WS6AC6pm7CBZLvs2I8mi28GSlOjdvPtTWPObtKI&currency=USD"></script>
    

    <!-- Paypal script -->
   <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
            return actions.order.create({
            purchase_units: [{
            amount:{
            value: '<?php echo $amount; ?>'// Can reference variables or functions. Examples
              }
            }]
          });
        },
      


      onApprove: function(data, actions){
        return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        console. log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        var transaction = orderData.purchase_units[0].payments.captures[0];
        alert('Transaction '+ transaction.status +': ' + transaction.id + '\n\nSee console for allavailable details');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>";
        // Or go to another URL: actions.redirect(‘thank_you.html')
            });
              }
        }).render('#paypal-button-container');

    </script>


  
  
  </body>
  </html>