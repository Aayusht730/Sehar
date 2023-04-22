<?php
session_start();
include('includes/header.php');
if(isset($_SESSION['auth'])){
    $_SESSION['status'] = "You are already logged in";
    header('Location: index.php');
    exit(0);
}
?>


<!-- Login -->
<div class="section my-5 ">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
                <?php
                if(isset($_SESSION['auth_status'])){

                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php  echo $_SESSION['auth_status'];  ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['auth_status']);
                }
                ?>
                 
                <?php 
                    include('message.php');
                ?>
                <div class="card my-5">
                    <h2 class="form-weight-bold card-header bg-light">Admin Login</h2>
                </div>
                <div class="card-body">
                    <form action="logincode.php" method="POST" >
                       <div class="form-gorup">
                            <label>Email</label>
                            <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/> 
                        </div>
                        <div class="form-gorup">
                            <label>Password</label>
                            <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/> 
                        </div>
                        <div class="form-gorup mt-3">
                            <button type="submit" name="login_btn" class="btn btn-primary btn-block" id="login-btn" value="Login">Login</button >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>