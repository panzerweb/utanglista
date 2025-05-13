<?php 

if (isset($_GET["customer_logs"])) {
    $customerLogs = $_GET["customer_logs"];
    
    if(isset($customerLogs)){
        echo "success";
    }
    else{
        echo 'error';
    }
}

if (isset($_GET["product_logs"])) {
    $productLogs = $_GET["product_logs"];

    if(isset($productLogs)){
        echo "success";
    }
    else{
        echo 'error';
    }
}

if (isset($_GET["transaction_logs"])) {
    $transactLogs = $_GET["transaction_logs"];

    if(isset($transactLogs)){
        echo "success";
    }
    else{
        echo 'error';
    }
}

if (isset($_GET["payment_logs"])) {
    $paymentLogs = $_GET["payment_logs"];

    if(isset($paymentLogs)){
        echo "success";
    }
    else{
        echo 'error';
    }
}