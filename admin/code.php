<?php

include('authentication.php');
include('server/dbconnection.php');







// update product
if(isset($_POST['pro_update'])){
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $vat = $_POST['vat'];
    $qty = $_POST['qty'];
    $image1 = $_FILES['image1']['name'];
    // $image2 = $_FILES['image2']['name'];
    // $image3 = $_FILES['image3']['name'];
    $old_image = $_FILES['old_image'];
    $status = $_POST['status'] == true ? '1':'0';

    if($image1 != ''){
        $update_filename = $_FILES['image1']['name'];

        
        $allowed_extension = array('png','jpg','jpeg');
        $file_extensions = pathinfo($$update_filename , PATHINFO_EXTENSION);

        $filename = time().'.'.$file_extensions;

        if(!in_array($file_extensions, $allowed_extension)){
            $_SESSION['status'] = "Invalid image! Only png, jpg, or jpeg allowed.";
            header('Location: edit_pro.php');
            exit(0);
        }
        $update_filename =  $filename;  
    }
    else{
        $update_filename = $old_image;
    }      
    $query = "UPDATE products SET category_id='$category_id',
                name='$name',
                description='$description',
                long_description='$long_description',
                price='$price',
                offerprice='$offerprice',
                vat='$vat',
                qty='$qty',
                image1='$update_filename',
                status='$status' WHERE id='$product_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run){
        if($image1 != ''){
            move_uploaded_file($_FILES['image1']['tmp_name'], 'uploads/product/'.$filename);
            if(file_exists('uploads/product/'.$old_image)){
                unlink("uploads/product/".$old_image); 
            }
        }
        $_SESSION['status'] = "Product Updated Successfully!";
        header('Location: edit_pro.php?pro_id='.$product_id);
        exit(0);
    }
    else{
        $_SESSION['status'] = "Product Not Updated!";
        header('Location: edit_pro.php?pro_id='.$product_id);
        exit(0);
    }
}



// add product
if(isset($_POST['product_save'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $long_description = $_POST['long_description'];
    $price = $_POST['price'];
    $offerprice = $_POST['offerprice'];
    $vat = $_POST['vat'];
    $qty = $_POST['qty'];
    $image1 = $_FILES['image1']['name'];
    $status = $_POST['status'] == true ? '1':'0';
    // $image2 = $_FILES['image2']['name'];
    // $image3 = $_FILES['image3']['name'];

    $allowed_extension = array('png','jpg','jpeg');
    $file_extensions = pathinfo($image1, PATHINFO_EXTENSION);

    $filename = time().'.'.$file_extensions;

    if(!in_array($file_extensions, $allowed_extension)){
        $_SESSION['status'] = "Invalid image! Only png, jpg, or jpeg allowed.";
        header('Location: add_pro.php');
        exit(0);
    }
    else{
        $query = "INSERT INTO products (category_id,name,description,long_description,price,offerprice,vat,qty,image1,status) 
        VALUES ('$category_id','$name','$description','$long_description','$price','$offerprice','$vat','$qty','$filename','$status')";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            move_uploaded_file($_FILES['image1']['tmp_name'], 'uploads/product/'.$filename);
            $_SESSION['status'] = "Product Added Successfully!";
            header('Location: add_pro.php');
            exit(0);
        }
        else{
            $_SESSION['status'] = "Something went wrong!";
            header('Location: add_pro.php');
            exit(0);
        }
    }
}





// add category
if(isset($_POST['cat_save'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $category_query = "INSERT INTO categories (name,description,trending,status) VALUES ('$name','$description','$trending','$status')";
    $cat_query_run = mysqli_query($con, $category_query);

    if($cat_query_run){
        $_SESSION['status']= "Category Added Successfully!";
        header('Location: categories.php');
    }
    else{
        $_SESSION['status']= "Category Addition Failed!";
        header('Location: categories.php');
    }
}



// edit categories

if(isset($_POST['cat_update'])){
    $cat_id = $_POST['cat_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1':'0'; 
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE categories SET name='$name', description='$description', trending='$trending', status='$status' WHERE id='$cat_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status']="Category Updated Successfully!";
        header('Location: categories.php');
    }
    else{
        $_SESSION['status']="Category Updating Failed!";
        header('Location: categories.php');
    }
}

// delete categories
if(isset($_POST['cat_delete_btn'])){
    $cat_id = $_POST['cat_delete_id'];

    $query = "DELETE FROM categories WHERE id='$cat_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Category Deleted Successfully!";
        header("Location: categories.php");
    }

    else{
        $_SESSION['status'] = "Category Deleting Failed!";
        header("Location: categories.php");
    }

}



// logout
if(isset($_POST['logout_btn'])){
    // session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status']= "Logged out Successfully!";
    header('Location: admin_login.php');
    exit(0);
}



// email checking
if(isset($_POST['check_Emailbtn'])){

    $email = $_POST['email']; 

    $checkemail = "SELECT email FROM users WHERE email = '$email' ";
    $checkemail_run = mysqli_query($con, $checkemail);

    if(mysqli_num_rows($checkemail_run) > 0) {
        echo "Email is already taken!";
    }
    else{
        echo "Email avialable!";
    }
}



// add user
if(isset($_POST['addUser'])){
    echo "Done!";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($password == $confirmpassword){

        $user_query = "INSERT INTO users(name,phone,email,password) VALUES('$name','$phone','$email','$password')";

        $user_query_run = mysqli_query($con, $user_query); 
        
        
        if($user_query_run){
            $_SESSION['status'] = "User Added Successfully!";
            header("Location: registeredusers.php");
        }
    
        else{
            $_SESSION['status'] = "User Registration Failed!";
            header("Location: registeredusers.php");
        }
    }
    else{
        $_SESSION['status'] = "Password and Confirm Password doesnot match!";
        header("Location: registeredusers.php");
    }
}

//update user
if(isset($_POST['updateUser'])){

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "UPDATE users SET name = '$name', phone='$phone', email='$email', password='$password', role='$role' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query); 

    if($query_run){
        $_SESSION['status'] = "User Updated Successfully!";
        header("Location: registeredusers.php");
    }

    else{
        $_SESSION['status'] = "User Update Failed!";
        header("Location: registeredusers.php");
    }

}


//delete user
if(isset($_POST['DeleteUserbtn'])){
    $userid = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id='$userid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "User Deleted Successfully!";
        header("Location: registeredusers.php");
    }

    else{
        $_SESSION['status'] = "User Deleting Failed!";
        header("Location: registeredusers.php");
    }

}

?>