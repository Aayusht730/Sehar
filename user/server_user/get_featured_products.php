<?php

include('dbconnection.php');

$stm = $con->prepare("SELECT * FROM products LIMIT 4");



$stm->execute();


$featured_products = $stm->get_result();



?> 