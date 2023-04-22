<?php

include('authentication.php');
include('server/dbconnection.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>


<!-- delete product modal -->
   <!--delete user -->
   <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
      </div>
      <form action="code.php" method="POST">
          <div class="modal-body">
              <input type="hidden" name="pro_delete_id" class="delete_pro_id">
              <p>Are you sure, you want to delete the Product?</p>
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
              <h3 class="card-title">Products</h3>
              <a href="add_pro.php" class="btn btn-primary float-right">Add<a/>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM products";
                  $query_run = mysqli_query($con, $query);
                  
                  if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $pro_item){
                    //   echo $pro_item['id'];
                    ?>
                  <tr>
                    <td><?php echo $pro_item['id']; ?></td>
                    <td><?php echo $pro_item['name']; ?></td>
                    <td><?php echo $pro_item['price']; ?></td>
                    <td>
                      <input type="checkbox" <?php echo $pro_item['status'] == '1' ? 'checked':'' ; ?> readonly>
                    </td>
                    <td><?php echo $pro_item['created_at']; ?></td>
                    <td>
                        <a href="edit_pro.php? pro_id=<?php echo $pro_item['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                        <button type="button" value = "<?php echo $pro_item['id']; ?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
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
            </table>
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

            var pro_id = $(this).val();
            console.log(pro_id);
            $('.delete_pro_id').val(pro_id);
            $('#DeleteModal').modal('show');

        });
    });
</script>


<?php include('includes/footer.php');?>
