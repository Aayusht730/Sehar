<?php 

session_start();

include('dbconnection.php');


// if user is not logged in
if(!isset($_SESSION['logged_in'])){
    header('location: ../login.php?message=Please login to place an order!');
}

// if user is logged in 
else{


    if(isset($_POST['place_order'])){

        // // get user info store in data base in database
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "Not Paid";
        $user_id = $_SESSION['id'];
        $order_date = date('Y-m-d  H:i:s');

        $stm = $con->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) 
                    VALUES (?,?,?,?,?,?,?);");

        $stm->bind_param('isiisss',$order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

        $stm->execute();


        // issue new order and store order in database
        $order_id = $stm->insert_id;


        // get products from cart(from session)
        $_SESSION['cart'];
        foreach($_SESSION['cart'] as $key => $value){

            $product = $_SESSION['cart'][$key];
            $product_id = $product['product_id'];
            $name = $product['name'];
            $image1 = $product['image1'];
            $price = $product['price'];
            $qty = $product['qty'];

            // store each single item in order_items database
            $st = $con->prepare("INSERT INTO order_items (order_id,product_id,name,image1,price,qty,user_id,order_date)
                        VALUES (?,?,?,?,?,?,?,?)");
            $st->bind_param('iissiiis',$order_id,$product_id,$name,$image1,$price,$qty,$user_id,$order_date);
            
            $st->execute(); 


        }
                
        // remove everything from cart

        unset($_SESSION['cart']);

        $_SESSION['order_id'] = $order_id;


        // inform user weather everything is fine or there is a problem
        header('location: ../payment.php?order_status=Order Placed Sucessfully!');


    }


}



?>