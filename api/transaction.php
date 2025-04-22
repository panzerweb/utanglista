<?php
/*
    Backend logic for inserting transactions.
    Use stored procedures in the insertion query with Input parameters

*/
require("../config/config.php");
require("../api/auth.php");

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $product_id = htmlspecialchars($_POST["prod_name"]);
    $customer_id = htmlspecialchars($_POST["c_name"]);
    $quantity = htmlspecialchars($_POST["qty"]);

    // Get the product price
    $product_price = "SELECT prod_price FROM products WHERE id = '$product_id'";
    $product_result = mysqli_query($connection, $product_price);

    if($product_result->num_rows > 0){
        $row = mysqli_fetch_assoc($product_result);
        $price = $row['prod_price'];

        // Calculate the amount
        $amount = $price * $quantity;

        // $transactionQuery = "INSERT INTO transaction (prod_id, c_id, qty, amount) 
        //                     VALUES ('$product_id', '$customer_id', '$quantity', '$amount'); ";

        //Stored Procedure
        $transactionQuery = "CALL transaction_insert('$product_id', '$customer_id', '$quantity', '$amount')";
        $result = mysqli_query($connection, $transactionQuery);
    
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
    else{
        echo "Product not found";
    }


    

}