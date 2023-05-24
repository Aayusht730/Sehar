<?php

include("server_user/dbconnection.php");


if(isset($_POST['filter'])){

  $price = $_POST['price'];

  // echo $price;

  $stm = $con->prepare("SELECT * FROM products WHERE price<=?");

  $stm->bind_param('i',$price);

  $stm->execute();

  $products = $stm->get_result();  


}
else{//returns all products

  $stm = $con->prepare("SELECT * FROM products");

  $stm->execute();

  $products = $stm->get_result();

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
    include("navbar.php");
  ?>

  


  <!-- price filter -->
  <section id="price_filter " class="my-2 py-2" >
    <form action="shop.php" method="POST">
      <div class="container mt-5 py-5">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h5>Price<h5>
          <input type="range" class="form-range w-100" name="price" value="50" min="1" max="1000" id="custom_range">
          <div class="w=50">
          <b><span style="float: left; color: #333;">1</span></b>
          <b><span style="float: right; color: #333;">1000</span></b>
          </div>
        </div>
        </div> 
      <div class="form-group container">
        <input type="submit" name="filter" value="Filter" class="btn button" style="font-size: 20px; padding: 5px 5px;">
      </div>
      <br>
      <div class="form-group container">
          <b><span style="color: #333;">Price: <?php echo $price ??0 ; ?></span></b>
      </div>
    </form>
  </section>
    



  <!-- products -->
  <section id="shop" class=" my-2 py-2" >
    <div class="container mt-2">
      <h3>Our Products</h3>
      <hr>
      <h4>Here you can find our different products</h4>
    </div>
    <div class="row mx-auto container-fluid my-2 py-2">  

    <?php
      
      while ($row = $products->fetch_assoc()) {
          
    ?> 

      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid" src="../admin/uploads/product/<?php echo $row['image1']; ?>" /> 
        <h5 class="pro-name"><?php echo $row['name']; ?> </h5>
        <h4 class="pro-price">Rs. <?php echo $row['price']; ?></h4>
        <a href="<?php echo "single_product.php?product_id=". $row['id'];?>"><button class="buy-button">Buy Now</button></a>
      </div>
      

      <?php 
        } 
      ?>

    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination mt-5 mx-auto">
        <li class="page-item"><a class="page lin" href="#">Previous</a></li>
        <li class="page-item"><a class="page lin" href="#">1</a></li>
        <li class="page-item"><a class="page lin" href="#">2</a></li>
        <li class="page-item"><a class="page lin" href="#">3</a></li>
        <li class="page-item"><a class="page lin" href="#">Next</a></li>
      </ul>
    </nav> -->

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