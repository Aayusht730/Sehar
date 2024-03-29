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
      <a class="Sehar" href="index.html"><img src="assets/imgs/seharlogo.png" alt="Logo" height="60px"></a>
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



  <!-- <section class="my-5 py-5">
    <form action="filter_prices.php" method="post">
      <label for="min_price">Min Price:</label>
      <input type="number" name="min_price" id="min_price" min="0">
      <label for="max_price">Max Price:</label>
      <input type="number" name="max_price" id="max_price" min="0">
      <input type="submit" value="Filter">
    </form>
    
  </section> -->

    

  <!-- products -->
  <section id="Digital" class="py-5">
    <div class="container mt-5 py-5">
      <h3>Digital Products</h3>
      <hr>
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

    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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
    <div class="py-3 product text-center col-lg-3 col-md-4 col-sm-12">
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

    <nav aria-label="Page navigation example">
      <ul class="pagination mt-5">
        <li class="page-item"><a class="page lin" href="#">Previous</a></li>
        <li class="page-item"><a class="page lin" href="#">1</a></li>
        <li class="page-item"><a class="page lin" href="#">2</a></li>
        <li class="page-item"><a class="page lin" href="#">3</a></li>
        <li class="page-item"><a class="page lin" href="#">Next</a></li>
      </ul>
    </nav>

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