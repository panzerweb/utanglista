<?php
require("../config/config.php");
require("../api/auth.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $product_id = htmlspecialchars($_POST["prod_name"]);
    $customer_id = htmlspecialchars($_POST["c_name"]);
    $quantity = htmlspecialchars($_POST["qty"]);

    // Get product price
    $product_result = mysqli_query($connection, "SELECT prod_price FROM products WHERE id = '$product_id'");
    if (!$product_result || mysqli_num_rows($product_result) === 0) {
        echo "Product not found";
        exit;
    }
    $product_row = mysqli_fetch_assoc($product_result);
    $price = $product_row['prod_price'];

    // Get interest rate
    $interest_result = mysqli_query($connection, "SELECT interest_rate FROM customers WHERE id = '$customer_id'");
    $interest_row = mysqli_fetch_assoc($interest_result);
    $interest_rate = $interest_row['interest_rate'];

    // Get customer balance and last_transaction_date
    $loan_result = mysqli_query($connection, "SELECT balance, last_transaction_date FROM customers WHERE id = '$customer_id'");
    $loan_row = mysqli_fetch_assoc($loan_result);
    $balance = $loan_row['balance'];
    
    // Time-based
    $lastTransactionDate = $loan_row['last_transaction_date'] ? new DateTime($loan_row['last_transaction_date']) : new DateTime();
    $today = new DateTime();

    // Calculate months passed
    $diff = $today->diff($lastTransactionDate);
    $monthsPassed = ($diff->y * 12) + $diff->m;

    // Diminishing interest application
    for ($i = 0; $i < $monthsPassed; $i++) {
        $balance += $balance * $interest_rate;
    }

    // Update balance and transaction date
    $formattedToday = $today->format("Y-m-d");
    $update = mysqli_query($connection, "UPDATE customers SET balance = '$balance', last_transaction_date = '$formattedToday' WHERE id = '$customer_id'");

    if (!$update) {
        echo "Failed to update interest";
        exit;
    }

    // Insert transaction via stored procedure
    $amount = $price * $quantity;
    $transactionQuery = "CALL transaction_insert('$product_id', '$customer_id', '$quantity', '$amount')";
    $result = mysqli_query($connection, $transactionQuery);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
