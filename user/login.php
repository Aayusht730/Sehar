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


        <!-- Login -->
        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">Login</h2>
            </div>
            <div class="mx-auto container">
                <form id="login-form">
                    <div class="form-gorup">
                        <label>Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/> 
                    </div>
                    <div class="form-gorup">
                        <label>Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/> 
                    </div>
                    <div class="form-gorup">
                        <input type="submit" class="btn" id="login-btn" value="Login"/> 
                    </div>
                    <div class="form-gorup">
                        <a id="registerurl">Don't have an account? 
                          <a href="register.html"> Register</a>
                        </a> 
                    </div>           
                    <!-- <div class="form-gorup">
                        <a id="login-url" class="btn">Continue with Google <i class="fas fa-google"></i></a> 
                    </div>   -->
                </form>
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
                            <li><a href="#">Contact Us</a></li>
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