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

  <section class="content mt-4">
    <div class="container">
      <div class="col-md-12">
        <?php include('message.php'); ?>
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Add Products</h3>
              <a href="products.php" class="btn btn-danger float-right">Back<a/>
          </div>
          <div class="card-body" >
            <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row"> 
                <div class="col-md-12">
                    <label>Select Category</label>
                    <?php
                        $query = "SELECT * FROM categories";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                                ?>
                                <select name="category_id" class="form-control">
                                <?php foreach($query_run as $item){ ?>
                                    <option value="<?php echo $item['id']?>"> <?php echo $item['name']; ?></option>
                                <?php } ?>
                                </select>
                                <?php
                            }
                        ?>
                            
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Enter Product Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" cols="30" required rows="3" placeholder="Enter short description"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>long Description</label>
                        <textarea name="long_description" class="form-control" cols="30" required rows="3" placeholder="Enter long description"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter Product Price">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="qty" class="form-control" placeholder="Enter  Quantity">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image-1</label>
                        <input type="file" name="image1" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Click To Save</label><br>
                        <button type = "submit" name = "product_save" class="btn btn-primary btn-block">Save</button>
                    </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  

<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>
