<?php 

include('server_user/dbconnection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stm = $con->prepare("SELECT * FROM products WHERE id = ?");
  $stm->bind_param("i", $product_id);
  $stm->execute();
  $product = $stm->get_result();
  
}
else{
  header('Location: index.php');
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white  fixed-top">
        <div class="container">
          <a class="Sehar" href="index.php"><img src="assets/imgs/seharlogo.png" alt="Logo" height="60px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </ul>

        <div class="collapse navbar-collapse search-bar" id="navbarSupportedContent">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="button btn-outline-success" type="submit">Search</button>
              </form>
        </div>
    
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link "href="#">Aayush</a>
              </li>-->
              <li> 
                <li class="nav-item">
                    <i class="fas fa-shopping-cart"></i>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html"> <i class="fas fa-user"></i> </a>
              </li>
              </li>

          </div>
        </div>
    </nav>  
  
  <!-- single product/ product details -->
  <section class="container single-product my-5 pt-5">
    <div class="row mt-5">

      <?php 
        while($row = $product->fetch_assoc()){
      ?>
        <div class=" col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-2" src="../admin/uploads/product/<?php echo $row['image1']; ?>" id="mainImg"/>
            <!-- <div class="small-img-group">
                <div class="small-img-col">
                    <img src="../admin/uploads/product/<?php echo $row['image1']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="../admin/uploads/product/<?php echo $row['image1']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="../admin/uploads/product/<?php echo $row['image1']; ?>" width="100%" class="small-img"/>
                </div>
            </div> -->
        </div>
      

        <div class="details py-5 mt-3 col-lg-6 col-md-12 col-sm-12">
          <h5>Electronic Device</h5>
          <h3 class="py-3"><?php echo $row['name'];?></h3>
          <h2><span>Rs.</span> <?php echo $row['price'];?></h2>
          <form method="POST" action="cart_page.php">
            <input type="hidden" name="product_id" value ="<?php echo $row['id']; ?>"/>
            <input type="hidden" name="image1" value="<?php echo $row['image1']; ?>"/>
            <input type="hidden" name="name" value="<?php echo $row['name']; ?>"/>
            <input type="hidden" name="price" value="<?php echo $row['price']; ?>"/>
          <input type="number" name="qty" value="1"/>
          <button class="buy-button" type="submit" name="add_to_cart">Add To Cart</button>
          <button class="buy-button">Buy Now</button>
          </form>
          <h4 class="mt-5 mb-3"><?php echo $row['description'];?></h4> 
          <p><?php echo $row['long_description'];?></p>
          <hr>

        </div>
      <?php } ?>
    </div>
  </section>
  

  <!-- related products -->
        <section id="related-products" class="my-2 pb-2">
            <div class="container mt-2 py-2">
              <h3>Related Products</h3>
              <hr>
              <p><b>Aslo see the related products.</b></p>
            </div>
          <div class="row mx-auto container-fluid">
                  <?php 
                  include('server_user/get_featured_products.php');
              ?>


              <?php
              while ($row = $featured_products->fetch_assoc()) {
                // if ($row["category_id"] == 4) {

              
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
          
           </div> 
          </section>
  
  
  
  <!-- footer -->
  <?php
    include('footer.php');
  ?>
        
                    



<!-- <linking js cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script>
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");

    for(let i=0; i<3; i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
        }
   }
   

</script>

</body>
</html>