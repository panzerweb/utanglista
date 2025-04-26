<?php
/*
    Code for fetching overviews by date when clicking on
    FullCalendarJS day cells. 
    File: calendar.js

    Features: 
        - Total customers by date
        - Total No. of products sold
        - Total amount of products sold
        - Is there any payment made? payment : 0



*/

header('Content-Type: application/json');
require("../config/config.php");

$response = [
    "totalCustomerByDay" => 0,
    "products_sold" => 0,
    "qty_products_sold" => 0,
    "products_amount_sold" => 0.00,
    "payment_collected" => 0.00,
];


if (isset($_GET["overview"])) {
    $date = htmlspecialchars($_GET["overview"]);

    $fetchCount = "SELECT COUNT(DISTINCT c_id) AS totalCustomerByDay 
                    FROM transaction
                    WHERE created_at LIKE '$date%';"
                ;
    //FETCH COUNT OF CUSTOMERS BY DATE
    if ($result = mysqli_query($connection, $fetchCount)) {
        $count = mysqli_fetch_assoc($result);
        $response["totalCustomerByDay"] = $count["totalCustomerByDay"] ?? 0;
        mysqli_free_result($result);
    }
    mysqli_next_result($connection); //Prepares next query

    //FETCH PRODUCTS SOLD
    $fetchProduct = "SELECT COUNT(DISTINCT prod_id) AS products_sold
                     FROM transaction
                     WHERE created_at LIKE '$date%';"
                ;
    if ($result = mysqli_query($connection, $fetchProduct)) {
        $prodCount = mysqli_fetch_assoc($result);
        $response["products_sold"] = $prodCount["products_sold"] ?? 0;
        mysqli_free_result($result);
    }
    mysqli_next_result($connection); //Prepares next query

    //FETCH QUANTITY OF PRODUCTS SOLD
    $fetchQtyProducts = "SELECT SUM(qty) AS qty_products_sold
                        FROM transaction
                        WHERE created_at LIKE '$date%';"
                ;
    if ($result = mysqli_query($connection, $fetchQtyProducts)) {
        $qtyProdCount = mysqli_fetch_assoc($result);
        $response["qty_products_sold"] = $qtyProdCount["qty_products_sold"] ?? 0;
        mysqli_free_result($result);
    }
    mysqli_next_result($connection);

    //FETCH AMOUNT OF PRODUCTS SOLD
    $fetchProdAmount = "SELECT SUM(amount) AS products_amount_sold
                        FROM transaction
                        WHERE created_at LIKE '$date%';"
                ;
    if ($result = mysqli_query($connection, $fetchProdAmount)) {
        $prodAmount = mysqli_fetch_assoc($result);
        $response["products_amount_sold"] = $prodAmount["products_amount_sold"] ?? 0.00;
        mysqli_free_result($result);
    }
    mysqli_next_result($connection);

    //FETCH COLLECTED PAYMENT AMOUNT
    $paymentQuery = "SELECT SUM(payment_amount) AS payment_collected
                    FROM payment
                    WHERE paid_at LIKE '$date%';"
                ;
    if ($result = mysqli_query($connection, $paymentQuery)) {
        $paidAmount = mysqli_fetch_assoc($result);
        $response["payment_collected"] = $paidAmount["payment_collected"] ?? "0.00";
        mysqli_free_result($result);
    }
    mysqli_next_result($connection);
}

//Encode data into JSON
echo json_encode($response);


