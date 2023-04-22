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
                  <a class="nav-link" href="login.php"> <i class="fas fa-user"></i> </a>
              </li>
              </li>

          </div>
        </div>
      </nav>
    

      

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
                  <button class="col-button"><b>Shop Now</b></button>
              </div>
          </div> 
          <!-- two  -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p=0">
            <img class="img-fluid" src="assets/imgs/pexels-mikhail-nilov-8669879.jpg" />
            <div class="details">
                <h2>Diabetes And BP Machine</h2>
                <button class="col-button"><b>Shop Now</b></button>
            </div>
          </div>
        <!-- three  -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p=0">
            <img class="img-fluid" src="assets/imgs/ayurvedic.jpg" />
            <div class="details">
              <h2>Ayurvedic And Beauty</h2>
              <button class="col-button"><b>Shop Now</b></button>
            </div>
          </div>
        </div>
          
      </section>



      <!-- featured -->
      <section id="Featured" class="my-3 pb-5">
        <div class="container text-center mt-10 py-5">
          <h3>Featured Products</h3>
          <hr>
          <p><b>Here you can find our featured products.</b></p>
        </div>
       <div class="row mx-auto container-fluid">
       <?php 
            include('server_user/get_featured_products.php');
        ?>


        <?php
        while ($row = $featured_products->fetch_assoc()) { 
        ?> 

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid" src="../admin/uploads/product/<?php echo $row['image1']; ?>" /> 
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="pro-name"><?php echo $row['name']; ?> </h5>
                <h4 class="pro-price">Rs. <?php echo $row['price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=". $row['id'];?>"><button class="buy-button">Buy Now</button></a>
            </div>

        <?php   
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
        <section id="bet_pro" class="my-3">
          <div class="container text-center mt-10 py-5">
            <h3>Ayurvedic And Beauty Products</h3>
            <hr>
            <p><b>Here you can find our beauty best ayurvedic and beauty products.</b></p>
          </div>
         <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid" src="assets/imgs/bloodpressure.jpg" /> 
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="pro-name">BP Monitor Machine</h5>
            <h4 class="pro-price">Rs. 5000</h4>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid" src="assets/imgs/pexels-mikhail-nilov-8669879.jpg" /> 
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="pro-name">BP Monitor Machine</h5>
            <h4 class="pro-price">Rs. 5000</h4>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid" src="assets/imgs/thermometer.jpg" /> 
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="pro-name">BP Monitor Machine</h5>
            <h4 class="pro-price">Rs. 5000</h4>
            <button class="buy-button">Buy Now</button>
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid" src="assets/imgs/infrared thermometer.jpg" /> 
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="pro-name">BP Monitor Machine</h5>
            <h4 class="pro-price">Rs. 5000</h4>
            <button class="buy-button">Buy Now</button>
          </div>
         </div> 
        </section>
        

        <!-- footer -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="assets/imgs/seharlogo.png" alt="Logo">
                <p class="pt-3">We provide best product at most affordable prices.</p>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12" id="links">
                <h4>Links</h4>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About Us</a></li>
                  <!-- <li><a href="#">Contact Us</a></li> -->
                  <li><a href="login.html">Login</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                <h4>Contact</h4>
                <ul>
                  <li>Email: sehar.official@email.com</li>
                  <li>Phone: +977-0123456789</li>
                  <li>Address: Kathmandu, Nepal</li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                <h4>Follow Us</h4>
                <ul class="social-links">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="text-center">Copyright &copy; 2022 Sehar. All rights reserved.</p>
              </div>
            </div>
          </div>
        </footer>
                          




    <!-- <linking js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>