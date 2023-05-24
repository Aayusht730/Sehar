<?php

session_start();


/*not paid
  shipped
  delivered
*/




include('server_user/dbconnection.php');



if(isset ($_POST['order_details']) && isset($_POST ['order_id'])){

    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stm = $con->prepare("SELECT * FROM order_items WHERE order_id=? ");
    
    $stm->bind_param('i',$order_id);

    $stm->execute();

    $order_details = $stm->get_result();

    $total_order = calculateTotalOrder($order_details);


}
else{
    header('location: account.php');
    exit;
 
}

function calculateTotalOrder($order_details){
    // $_SESSION['total'] = 0; 
    $total = 0;
    
    foreach($order_details as $row){

        $price = $row['price'];
        $qty = $row['qty'];

        $total = $total + ($price * $qty); 

    }
    return $total;
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




    <!-- orders -->
    <section id="orders" class="orders container my-5 py-5">
        <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr>
        <table class="table mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>

            <?php
                foreach($order_details as $row){
            ?>
            <tr>
            <td>
                <div class="product-info">
                    <img src="../admin/uploads/product/<?php echo $row['image1'];?>"  style="width: 100px; height: auto;">
                    <div>
                        <P class="nt-3"><?php echo $row['name'];?> </p>
                    </div>
                </div>
            </td>
            <td>
                <span>Rs.: <?php echo $row['price'];?> </span>
            </td>
            <td>
                <span><?php echo $row['qty'];?></span>
            </td>
           
            <!-- <td>
                <form action="">
                <input class="btn orders_details-btn" type="submit" value="Details">
                </form>
            </td> -->
            </tr>


            <?php 
                }
            ?>


        </table>

        <?php
            if($order_status == "Not Paid"){
        ?>
            <form style="float: right;" method="POST" action="payment.php">
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <input type="hidden" name="total_order" value="<?php echo $total_order; ?>">
                <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
                <input type="submit" name="order_pay" class="btn button" value="Pay Now">    
            </form>

        <?php 
        }
        ?>
        
    </section>



 
  <!-- footer -->
    <?php
        include('footer.php');
    ?>
        

    
                            
  
      <!-- <linking js cdn  -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  </html>