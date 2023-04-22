<?php

include('authentication.php');
include('server/dbconnection.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  

  <?php
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];
            $query = "SELECT * FROM products WHERE id='$product_id' ";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0){
                $proitem = mysqli_fetch_array($query_run);
                ?>
                 <!-- <h4><?php echo $proitem['name']; ?></h4> -->
                
<!-- <div class="text-center"> -->
  <section class="content mt-4">
    <div class="container">
      <div class="col-md-12">
        <?php include('message.php'); ?>
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Edit Products</h3>
              <a href="products.php" class="btn btn-danger float-right">Back<a/>
          </div>
          <div class="card-body" >
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $proitem['id']; ?>" >
               

            <div class="row"> 
                <div class="col-md-12">
                    <label>Select Category</label>
                    <?php
                        $query = "SELECT * FROM categories";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                                ?>
                                <select name="category_id" required class="form-control">
                                    <option value="">Select Category</option>
                                    <?php foreach($query_run as $item){ ?>
                                        <option value="<?php echo $item['id']?>" <?php echo $proitem['category_id'] == $item['id'] ? 'selected':'' ?> >
                                            <?php echo $item['name']; ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                    <?php
                                }
                            ?>
                            
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $proitem['name']; ?>" required placeholder="Enter Product Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" cols="30" required rows="3" placeholder="Enter short description"><?php echo $proitem['description']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>long Description</label>
                        <textarea name="long_description" class="form-control" cols="30" required rows="3" placeholder="Enter long description"><?php echo $proitem['long_description']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $proitem['price']; ?>"placeholder="Enter Product Price">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" name="offerprice" class="form-control" value="<?php echo $proitem['offerprice']; ?>" placeholder="Enter Product Offer Price">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>VAT</label>
                        <input type="text" name="vat" class="form-control" value="<?php echo $proitem['vat']; ?>" placeholder="Enter Value Added Tax">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="qty" class="form-control" value="<?php echo $proitem['qty']; ?>" placeholder="Enter  Quantity">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Re-upload Image-1</label>
                        <input type="file" name="image1" class="form-control">
                        <input type="hidden" name="old_image" value="<?php echo $proitem['image1']; ?>" >
                    </div>
                    <img src="uploads/product/<?php echo $proitem['image1']; ?>" width="50px" height="50px" alt="image">
                </div>
                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label>Upload Image-2</label>
                        <input type="file" name="image2" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Upload Image-3</label>
                        <input type="file" name="image3" class="form-control" required>
                    </div>
                </div>     -->
                <div class="col-md-3" >
                    <div class="form-group">
                        <label>Status (checked = Show | Hide)</label><br>
                        <input type="checkbox" name="status" value="<?php echo $proitem['name'] == '1' ? 'checked':'' ?>"> Show / Hide
                    </div>
                </div>
                <div class="col-md-2 mt-3">
                    <div class="form-group">
                        <button type = "submit" name = "pro_update" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
            }
            else{
                echo "No Such Product Found!";
            }
        }
    ?>

 

    
</div>

  

<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>
