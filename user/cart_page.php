<?php 

session_start();

// session_unset();


// $_SESSION['total'] = 0; 


// checks if user is logged in
if (!isset($_SESSION['logged_in'])) {
  // Redirect to the login page or show an error message
  header('Location: login.php');
  exit;
}


// fetch products from the single product page.
  if(isset($_POST['add_to_cart'])){
    
    // if user already has product in the cart
    if (isset($_SESSION['cart'])){
      $product_id = $_POST['product_id'];
      $email = $_SESSION['email'];


      $product_array_ids = array_column($_SESSION['cart'],"product_id");

      // if the product has already been added to cart or not
      if(!in_array($_POST['product_id'], $product_array_ids)){

        $product_array = array( 'product_id' => $_POST['product_id'],
                                'image1' => $_POST['image1'],
                                'name' => $_POST['name'],
                                'price' => $_POST['price'],
                                'email' => $email ?? "",
                                'qty' => $_POST['qty']);
      $_SESSION['cart'][$product_id]= $product_array;
      }
      // if the product has already been added
      else{
        echo'<script>alert("Product was already added to the cart")</script>';

    }
  }
  else{
    // if this is the first product
    $product_id = $_POST['product_id'];
    $email = $_SESSION['email'];
    $image1 = $_POST['image1'];
    $name = $_POST['name'];
    $price = $_POST['price'];  
    $qty = $_POST['qty'];
    
    $product_array = array('product_id'=> $product_id,
                            'image1'=> $image1,
                            'name'=> $name,
                            'price'=> $price,
                            'email' => $email ?? "",
                            'qty'=> $qty );

    $_SESSION['cart'][$product_id] = $product_array;
  }

  // calculate total
  calculateTotal();

} 



// remove product from the cart
else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

  // calculate total
  calculateTotal();
}

//editing quantity  
else if (isset($_POST['edit_qty'])){

  // getting id and qty from the form 
  $product_id = $_POST['product_id'];
  $qty = $_POST['qty'];

  // getting product array form the session 
  $product_array = $_SESSION['cart'][$product_id];

  // updaating new qty
  $product_array['qty'] = $qty;

  // returning array
  $_SESSION['cart'][$product_id] = $product_array;


  // calculate total
  calculateTotal();

}

else{
  // header('Location: index.php');
}


function calculateTotal(){
  $_SESSION['total'] = 0; 
  $total = 0;
  
    foreach($_SESSION['cart'] as $key => $value){
      
      // if($value['email'] == $_SESSION['email']){

      $product = $_SESSION['cart'][$key];

      $price = $product['price'];
      $qty = $product['qty'];
      
      
      $total = $total + ($price * $qty);
      }
    // }
    $_SESSION['total'] = $total; 
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


        
    <!-- cart -->

    <section class="cart container my-5 py-5">
        <div class="container mt-5">
       <p><b>Your Cart</b></p>
          <hr>        
        </div>

        <div>

          <table class="table mt-5 pt-5">
              <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Sub-Total</th>
              </tr>

              <?php 
                foreach($_SESSION['cart'] as $key => $value){
                  // print_r($value);
                  // print_r($_SESSION['cart']);
                  if($value['email'] == $_SESSION['email']){
                  // if(true){

                  

              ?>


              <tr>
                  <td>
                      <div class = "product-info">
                      <img src="../admin/uploads/product/<?php echo $value['image1']; ?> "/>
                          <div>
                              <p><?php echo $value['name']; ?></p>
                              <small><span>Rs. </span><?php echo $value['price']; ?></small>
                              <br>
                              <form method="POST" action="cart_page.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                                <input type="submit" name="remove_product" class="remove-btn" value="Remove"/>
                              </form>
                          </div>
                      </div>
                  </td>

                  <td>
                    
                    <form method="POST" action="cart_page.php">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>" />
                      <input type="number" name="qty" value="<?php echo $value['qty']; ?>"/> 
                      <input type="submit" class="edit-btn" value="Edit" name="edit_qty" />
                    </form>  
                                         

                  </td>

                  <td>
                      <span>Rs. </span>
                      <span class="product-price"><?php echo $value['qty'] * $value['price']; ?></span>
                  </td>
              </tr>
            
            <?php
            }
                }
            // session_destroy();
            ?>

          </table> 
        </div>

        <div class="cart-total">
          <table>
            <!-- <tr>
              <td>VAT</td>
              <td><span>Rs. </span> </td>
            </tr> -->
            <tr>
              <td>Total</td>
              <td><span>Rs. </span> <?php echo $_SESSION['total']; ?> </td> 
            </tr>
          </table>
        </div>

       <div class="checkout-container">
        <form method="POST" action="checkout.php">
          <input type="submit" class="checkout-btn" value="Checkout" name="checkout">
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