







<nav class="navbar navbar-expand-lg navbar-light bg-white  fixed-top">
        <div class="container">
          <a class="Sehar" href="index.php"><img src="assets/imgs/seharlogo.png" alt="Logo" height="60px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </ul>

        <div class="collapse navbar-collapse search-bar" id="navbarSupportedContent">
            <form class="d-flex" role="search" action="search_action.php" method="POST" >
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
              <input class="button btn-outline-success" type="submit" name="search_btn" value="Search">
            </form>
        </div>
    
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
               <b> <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"><b>Digital</b></a></li>
                  <li><a class="dropdown-item" href="#"><b>Analog</b></a></li>
                  <li><a class="dropdown-item" href="#"><b>Ayurvedic</b></a></li>
                </ul></b>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link "href="#">Aayush</a>
              </li>-->
              <li> 
                <li class="nav-item">
                  <a  class='nav-link' href="cart_page.php"><i class="fas fa-shopping-cart" ></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="account.php"> <i class="fas fa-user"></i> </a>
              </li>
              </li>

          </div>
        </div>
      </nav>