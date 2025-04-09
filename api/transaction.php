<?php
//Php code for transaction

if(isset($_POST["submit"])){
    $customer_name = $_POST["c_name"];
    $product_name = $_POST["prod_name"];
    $price = 10.00; //replace with fetched price from products table
    $quantity = $_POST["qty"];
    $amount = $price * $quantity;

    echo "Transaction successful! Details: <br>";
    echo "Name: " . $customer_name . "<br>";
    echo "Product: " . $product_name . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "Amount: " . $amount . "<br>";
}