<?php

require("../config/config.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    //Validation
    if (!isset($_POST["payment_amount"]) || $_POST["payment_amount"] === '') {
        die("Error: Payment amount is required.");
    }
    // Optionally, validate it’s numeric
    if (!is_numeric($_POST["payment_amount"])) {
        die("Error: Payment amount must be a number.");
    }

    $customer_id = htmlspecialchars($_POST["id"]);
    $paymentAmount = floatval($_POST["payment_amount"]);

    $insertPayment = "INSERT INTO payment(c_id, payment_amount) VALUES ('$customer_id', '$paymentAmount')";
    $result = mysqli_query($connection, $insertPayment);

    // If successful, throw message
    if ($result) {
        echo 'success';
    } else {
        echo "Database error: " . mysqli_error($connection);
    }
    
}