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
              <li class="breadcrumb-item active">Orders Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content mt-4">
    <div class="container">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Orders Details</h3>
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
                
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                  </tr>
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>





<?php include('includes/footer.php');?>
