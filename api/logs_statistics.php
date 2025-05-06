<?php 
// This logic has queries from get_stats_dashboard, 
// get_product, get_customer, and date_overviews
// WE COPIED THERE QUERIES TO BE EXCLUSIVE TO THE LOGS PAGE
// SOME QUERIES DOES NOT USE PROCEDURES, AND VIEWS FROM MYSQL

require("../config/config.php");

// PREPARE JSON KEY-VALUE PAIRS
$statistics = [
    "totalCount" => 0,
    "totaluncollectedAmount" => 0,
    "totalCollectedAmount" => 0,
    "totalProdCount" => 0,
    "productSold" => 0,
    "qtyProducts" => 0,
    "productAmountSold" => 0,
    "transactionCount" => 0,
];

// FETCH ALL CUSTOMER COUNT
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $customer_count = "SELECT count(0) AS `totalCount` from `customers` WHERE created_at LIKE '$year_month%';";
} else {
   $customer_count = "CALL getCount()";
}
try {
    $countResult = mysqli_query($connection, $customer_count) or die(mysqli_error($connection));
    $count = mysqli_fetch_assoc($countResult);

    $totalCount = $count['totalCount'] ? $count['totalCount'] : 0;
    $statistics["totalCount"] = $count['totalCount'] ? $count['totalCount'] : 0;
    // echo json_encode($totalCount);
    mysqli_free_result($countResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    echo $th;
}

//AMOUNT TO COLLECT
//FETCH THE TOTAL UNCOLLECTED AMOUNT
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $uncollectedQuery = "SELECT SUM(balance) AS uncollectedAmount FROM `customers` WHERE is_deleted=0 AND created_at LIKE '$year_month%';";
} else {
    $uncollectedQuery = "CALL getTotalUncollectedAmount();"; //Stored Procedure
}
try {
    $uncollectedResult = mysqli_query($connection, $uncollectedQuery);
    $uncollectedAmount = mysqli_fetch_assoc($uncollectedResult);

    $totaluncollectedAmount = $uncollectedAmount["uncollectedAmount"] ? $uncollectedAmount["uncollectedAmount"] : 0;
    $statistics["totaluncollectedAmount"] = $uncollectedAmount["uncollectedAmount"] ? $uncollectedAmount["uncollectedAmount"] : 0;
    // echo json_encode($totaluncollectedAmount);
    mysqli_free_result($uncollectedResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}


//COLLECTED AMOUNT
//FETCH THE TOTAL COLLECTED PAYMENTS
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $collectAmountQuery = "SELECT SUM(payment_amount) AS total_collected_amount FROM payment WHERE paid_at LIKE '$year_month%';"; //Stored Procedure
} else {
    $collectAmountQuery = "CALL getTotalCollectedPayments();"; //Stored Procedure
}
try {
    $collectResult = mysqli_query($connection, $collectAmountQuery);
    $collectAmount = mysqli_fetch_assoc($collectResult);

    $totalCollectedAmount = $collectAmount["total_collected_amount"] ? $collectAmount["total_collected_amount"] : 0;
    $statistics["totalCollectedAmount"] = $collectAmount["total_collected_amount"] ? $collectAmount["total_collected_amount"] : 0;
    mysqli_free_result($collectResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}

//INVENTORY
//FETCH THE TOTAL COUNT OF HOW MANY PRODUCTS
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $getProductCount = "select count(0) AS `totalInventory` from `products` where (`products`.`is_deleted` = 0) AND created_at LIKE '$year_month%';"; //Views
} else {
    $getProductCount = "CALL getProdCount()"; //Views

}
try {
    $countResult = mysqli_query($connection, $getProductCount) or die(mysqli_error($connection));
    $prodCount = mysqli_fetch_assoc($countResult);

    $totalProdCount = $prodCount['totalInventory'] ? $prodCount['totalInventory'] : 0;
    $statistics["totalProdCount"] = $prodCount['totalInventory'] ? $prodCount['totalInventory'] : 0;
    mysqli_free_result($countResult);
    mysqli_next_result($connection); //Prepares next query

} catch (\Throwable $th) {
    throw $th;
}

//QUERY FOR TYPE OF PRODUCTS SOLD
//PRODUCTS SOLD
if(isset($_GET["year_month"])){
    $year_month = htmlspecialchars($_GET["year_month"]);
    $getProductSold = "SELECT COUNT(DISTINCT prod_id) AS products_sold
    FROM transaction WHERE created_at LIKE '$year_month%';";
}
else{
    $getProductSold = "SELECT COUNT(DISTINCT prod_id) AS products_sold
    FROM transaction;";
}
try {
    $productSoldResult = mysqli_query($connection, $getProductSold) or die(mysqli_error($connection));
    $prodSold = mysqli_fetch_assoc($productSoldResult);

    $productSold = $prodSold['products_sold'] ? $prodSold['products_sold'] : 0;
    $statistics["productSold"] = $prodSold['products_sold'] ? $prodSold['products_sold'] : 0;
    mysqli_free_result($productSoldResult);
    mysqli_next_result($connection); //Prepares next query

} catch (\Throwable $th) {
    throw $th;
}

//QUERY FOR QTY OF SOLD PRODUCTS
//QTY OF PRODUCTS SOLD
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $fetchQuantityProducts = "SELECT SUM(qty) AS qty_products_sold
    FROM transaction WHERE created_at LIKE '$year_month%';"
;
} else {
    $fetchQuantityProducts = "SELECT SUM(qty) AS qty_products_sold
    FROM transaction;";
}

try {
    $qtyProdResult = mysqli_query($connection, $fetchQuantityProducts);
    $qtyProdCount = mysqli_fetch_assoc($qtyProdResult);

    $qtyProducts = $qtyProdCount["qty_products_sold"] ? $qtyProdCount["qty_products_sold"] : 0;
    $statistics["qtyProducts"] = $qtyProdCount["qty_products_sold"] ? $qtyProdCount["qty_products_sold"] : 0;
    mysqli_free_result($qtyProdResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    throw $th;
}

//QUERY FOR AMOUNT OF PRODUCTS SOLD
//PRODUCT AMOUNT SOLD
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $productsAmountSoldQuery = "SELECT SUM(amount) AS products_amount_sold
                    FROM transaction WHERE created_at LIKE '$year_month%';";
} else {
    $productsAmountSoldQuery = "SELECT SUM(amount) AS products_amount_sold
                        FROM transaction;";
}
try {          
    $prodAmountSoldResult = mysqli_query($connection, $productsAmountSoldQuery);
    $prodSoldAmount = mysqli_fetch_assoc($prodAmountSoldResult);

    $productAmountSold = $prodSoldAmount["products_amount_sold"] ? $prodSoldAmount["products_amount_sold"] : 0;
    $statistics["productAmountSold"] = $prodSoldAmount["products_amount_sold"] ? $prodSoldAmount["products_amount_sold"] : 0;
    mysqli_free_result($prodAmountSoldResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    throw $th;
}


//RETRIEVE COUNT OF TRANSACTIONS
//FETCH COUNT OF TRANSACTIONS
if (isset($_GET["year_month"])) {
    $year_month = htmlspecialchars($_GET["year_month"]);
    $transactionQuery = "SELECT COUNT(*) AS totalTransactions
    FROM `transaction` WHERE created_at LIKE '$year_month%';";
} else {
    $transactionQuery = "SELECT COUNT(*) AS totalTransactions
    FROM `transaction`;"
;
}
try {
    $qtyTransactResult = mysqli_query($connection, $transactionQuery);
    $transactAssoc = mysqli_fetch_assoc($qtyTransactResult);

    $transactionCount = $transactAssoc["totalTransactions"] ? $transactAssoc["totalTransactions"] : 0;
    $statistics["transactionCount"] = $transactAssoc["totalTransactions"] ? $transactAssoc["totalTransactions"] : 0;
    mysqli_free_result($qtyTransactResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}



// ENCODE THE JSON

echo json_encode($statistics);