<?php session_start(); ?>

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
    

      

      <!-- Home page  -->
      <section id="HomePage" class="my-3 pb">
        <div class="container">
            <h5>NEW PRODUCTS</h5>
            <h1>Reasonable Prices</h1>
            <p><b>Sehar provides best and geniune quality products.</b></p>
            <button class="color-button"><b>Shop Now</b></button>  
        </div>
      </section>


      <!-- New  -->
      <section id="New" class="w-100 my-3 pb-5">
        <div class="container text-center mt-10 py-5">
          <h3>Featured Categories</h3>
          <hr>
          <p><b>Here you can find our featured Categories.</b></p>
        </div>
        <div class="row p-0 m-0 ">
          <!-- one  -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p=0">
              <img class="img-fluid" src="assets/imgs/Surgical Protective Face Masks, 3-Ply (3).jpg" />
              <div class="details">
                  <h2>Geniune Products</h2>
                  <a href="shop.php"><button class="col-button"><b>Shop Now</b></button></a>
              </div>
          </div> 
          <!-- two  -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p=0">
            <img class="img-fluid" src="assets/imgs/pexels-mikhail-nilov-8669879.jpg" />
            <div class="details">
                <h2>Diabetes And BP Machine</h2>
                <a href="shop.php"><button class="col-button"><b>Shop Now</b></button></a>
            </div>
          </div>
        <!-- three  -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p=0">
            <img class="img-fluid" src="assets/imgs/ayurvedic.jpg" />
            <div class="details">
              <h2>Ayurvedic And Beauty</h2>
              <a href="shop.php"><button class="col-button"><b>Shop Now</b></button></a>
            </div>
          </div>
        </div>
          
      </section>



      <!-- featured -->
      <section id="Featured" class="my-3 pb-5">
        <div class="container text-center mt-10 py-5">
          <h3>Digital Products</h3>
          <hr>
          <p><b>Here you can find our featured products.</b></p>
        </div>
       <div class="row mx-auto container-fluid">
       <?php 
            include('server_user/get_featured_products.php');
        ?>


        <?php
        while ($row = $featured_products->fetch_assoc()) {
          if ($row["category_id"] == 4) {

        
        ?> 

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid" src="../admin/uploads/product/<?php echo $row['image1']; ?>" /> 
                <h5 class="pro-name"><?php echo $row['name']; ?> </h5>
                <h4 class="pro-price">Rs. <?php echo $row['price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=". $row['id'];?>"><button class="buy-button">Buy Now</button></a>
            </div>

        <?php   
        } 
      }
        ?>


       </div> 
      </section>
      

      <!-- banner -->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>PRODUCTS THAT WILL <span>AMAZE YOU</span>!</h4>
          <h1>makes your shopping experience <span>good</span>!</h1> 
          <hr>
          <!-- <button class="banner-button">Shop Now</button> -->
        </div>
      </section>


      <!-- Beauty products -->
      <!-- <section id="bet_pro" class="my-3">
            <div class="container text-center mt-10 py-5">
              <h3>Ayurvedic</h3>
              <hr>
              <p><b>Here you can find our best ayurvedic products.</b></p>
            </div>
            <div class="row mx-auto container-fluid">
            <?php 
              include('server_user/get_featured_products.php');
            ?>


            <?php
            while ($row = $featured_products->fetch_assoc()) {
              if ($row["category_id"] == 2) {
            ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid" src="../admin/uploads/product/<?php echo $row['image1']; ?>" /> 
                    <h5 class="pro-name"><?php echo $row['name']; ?> </h5>
                    <h4 class="pro-price">Rs. <?php echo $row['price']; ?></h4>
                    <a href="<?php echo "single_product.php?product_id=". $row['id'];?>"><button class="buy-button">Buy Now</button></a>
                </div>
            <?php   
              } 
            }
            ?>
 
          </div> 
      </section> -->
        

        <!-- footer -->
       <?php
        include('footer.php');
       ?>
        
                          




    <!-- <linking js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>