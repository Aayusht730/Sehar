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
                <li class="breadcrumb-item active">Categories</li>
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
                        <h3 class="card-title">Edit Category</h3>
                        <a href="categories.php" class="btn btn-danger float-right">Back<a/>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <?php 
                                if(isset($_GET['id'])){
                                    $cat_id= $_GET['id'];

                                    $query = "SELECT * FROM categories WHERE id=('$cat_id') ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $catitem){
                                    ?>
                                    <div><input type="hidden" name="cat_id" value="<?php echo $catitem['id'] ?>"</div> 
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Category Name</label>    
                                    <input type="text" name="name" value="<?php echo $catitem['name'];?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description"  class="form-control" required rows="3"><?php echo $catitem['description'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending" <?php echo $catitem['trending'] == "1" ? 'checked':'';  ?> >   Trending
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" <?php echo $catitem['status'] == "1" ? 'checked':'';  ?> >    Status
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name='cat_update' class="btn btn-primary">Update</button>
                            </div>
                                <?php
                                }
                                }
                                else{
                                    echo ("No ID Found");
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>






<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>