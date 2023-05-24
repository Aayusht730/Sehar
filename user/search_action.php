<?php

include('server_user/dbconnection.php');

if (isset($_POST['search_btn'])) {
  $search = $_POST['search'];

//   echo getcwd();

  $stm = $con->prepare("SELECT * FROM products WHERE name=?");
  $stm->bind_param('s',$search);
  $stm->execute();


  $search= $stm->get_result();
  
  while ($row = $search->fetch_assoc()) {
    // echo $row['name'];
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
    
    <div class="my-5 py-5"
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid" src="../admin/uploads/product/<?php echo $row['image1']; ?> " width="100" height ="auto" /> 
      <h5 class="pro-name"><?php echo $row['name'] ??""; ?> </h5>
      <h4 class="pro-price">Rs. <?php echo $row['price'] ??""; ?></h4>
      <a href="<?php echo "single_product.php?product_id=". $row['id'];?>"><button class="buy-button">Buy Now</button></a>
      </div>
    </div>
    
    <?php
    }
  

}
?>



        <!-- footer -->
        <?php
        include('footer.php');
       ?>
        
                          




    <!-- <linking js cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>