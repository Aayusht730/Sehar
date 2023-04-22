<?php

include('authentication.php');
include('server/dbconnection.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>




 <!--Category Modal -->
 <div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> 
            <span aria-hidden="true">&times;</span>
        </button> -->
      </div>

        <form action="code.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" required rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" ">Trending
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" ">Status
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='cat_save' class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
  </div>
</div>

   <!--delete user -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Categories</h1>
      </div>
      <form action="code.php" method="POST">
          <div class="modal-body">
              <input type="hidden" name="cat_delete_id" class="delete_cat_id">
              <p>Are you sure, you want to delete the category?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name= "cat_delete_btn" class="btn btn-primary">Yes, Delete!</button>
          </div>
          </div>
      </form>
  </div>
</div>

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
              <h3 class="card-title">Categories</h3>
              <a href="#" data-toggle="modal" data-target="#CategoryModal" class="btn btn-primary float-right">Add<a/>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Trending</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM categories";
                  $query_run = mysqli_query($con, $query);
                  
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $catitem){
                      // echo $catitem['id'];
                    ?>
                  <tr>
                    <td><?php echo $catitem['id']; ?></td>
                    <td><?php echo $catitem['name']; ?></td>
                    <td><?php echo $catitem['description']; ?></td>
                    <td>
                      <input type="checkbox" <?php echo $catitem['trending'] == '1' ? 'checked':'' ; ?> readonly>
                    </td>
                    <td>
                      <input type="checkbox" <?php echo $catitem['status'] == '1' ? 'checked':'' ; ?> readonly>
                    </td>
                    <td><?php echo $catitem['created_at']; ?></td>
                    <td>
                        <a href="edit_category.php? id=<?php echo $catitem['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                        <button type="button" value = "<?php echo $catitem['id']; ?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
                    </td>
                  </tr>
                  <?php
                    }
                  }
                  else{
                    echo "No Record Found";
                  }
                ?>
              </tbody>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  


<?php include('includes/script.php');?>
<script>

    $(document).ready(function () {
        $('.deletebtn').click(function (e) { 
            e.preventDefault();

            var cat_id = $(this).val();
            console.log(cat_id);
            $('.delete_cat_id').val(cat_id);
            $('#DeleteModal').modal('show');

        });
    });

</script>


<?php include('includes/footer.php');?>