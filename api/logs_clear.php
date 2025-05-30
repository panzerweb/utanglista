<?php 
include("../config/config.php");

// Customer Logs clearing
if (isset($_GET["customer_logs"])) {
    $customerLogs = $_GET["customer_logs"];
    
    $clearCustomerLogs = "DELETE FROM customer_logs;";
    $result = mysqli_query($connection, $clearCustomerLogs);

    if ($result) {
        echo 'success';
    }
    else{
        echo 'error';
    }
}

// Product Logs clearing
if (isset($_GET["product_logs"])) {
    $productLogs = $_GET["product_logs"];
    $clearProductLogs = "DELETE FROM product_logs";
    $result = mysqli_query($connection, $clearProductLogs);

    if($result){
        echo "success";
    }
    else{
        echo 'error';
    }
}

if (isset($_GET["transaction_logs"])) {
    $transactLogs = $_GET["transaction_logs"];
    $clearTransactionLogs = "DELETE FROM transaction_logs";
    $result = mysqli_query($connection, $clearTransactionLogs);

    if($result){
        echo "success";
    }
    else{
        echo 'error';
    }
}

if (isset($_GET["payment_logs"])) {
    $paymentLogs = $_GET["payment_logs"];
    $clearPaymentLogs = "DELETE FROM payment_logs";
    $result = mysqli_query($connection, $clearPaymentLogs);

    if($result){
        echo "success";
    }
    else{
        echo 'error';
    }
}