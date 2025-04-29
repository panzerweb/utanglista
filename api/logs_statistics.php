<?php 
// This logic has queries from get_stats_dashboard, 
// get_product, get_customer, and date_overviews
// WE COPIED THERE QUERIES TO BE EXCLUSIVE TO THE LOGS PAGE
// SOME QUERIES DOES NOT USE PROCEDURES, AND VIEWS FROM MYSQL

require("../config/config.php");

// FETCH ALL CUSTOMER COUNT
try {
    $customer_count = "SELECT * FROM getcustomercount";
    $countResult = mysqli_query($connection, $customer_count) or die(mysqli_error($connection));
    $count = mysqli_fetch_assoc($countResult);

    $totalCount = $count['totalCount'] ? $count['totalCount'] : 0;

    mysqli_free_result($countResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    echo $th;
}

//AMOUNT TO COLLECT
//FETCH THE TOTAL UNCOLLECTED AMOUNT
try {
    $uncollectedQuery = "CALL getTotalUncollectedAmount();"; //Stored Procedure
    $uncollectedResult = mysqli_query($connection, $uncollectedQuery);
    $uncollectedAmount = mysqli_fetch_assoc($uncollectedResult);

    $totaluncollectedAmount = $uncollectedAmount["uncollectedAmount"] ? $uncollectedAmount["uncollectedAmount"] : 0;
    mysqli_free_result($uncollectedResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}

//COLLECTED AMOUNT
//FETCH THE TOTAL COLLECTED PAYMENTS
try {
    $collectAmountQuery = "CALL getTotalCollectedPayments();"; //Stored Procedure
    $collectResult = mysqli_query($connection, $collectAmountQuery);
    $collectAmount = mysqli_fetch_assoc($collectResult);

    $totalCollectedAmount = $collectAmount["total_collected_amount"] ? $collectAmount["total_collected_amount"] : 0;
    mysqli_free_result($collectResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}

//INVENTORY
//FETCH THE TOTAL COUNT OF HOW MANY PRODUCTS
try {
    $getProductCount = "SELECT * FROM getproductcount"; //Views
    $countResult = mysqli_query($connection, $getProductCount) or die(mysqli_error($connection));
    $prodCount = mysqli_fetch_assoc($countResult);

    $totalProdCount = $prodCount['totalInventory'] ? $prodCount['totalInventory'] : 0;
    mysqli_free_result($countResult);
    mysqli_next_result($connection); //Prepares next query

} catch (\Throwable $th) {
    throw $th;
}

//PRODUCTS SOLD
try {
    $getProductSold = "SELECT COUNT(DISTINCT prod_id) AS products_sold
                     FROM transaction;"
                ;
    $productSoldResult = mysqli_query($connection, $getProductSold) or die(mysqli_error($connection));
    $prodSold = mysqli_fetch_assoc($productSoldResult);

    $productSold = $prodSold['products_sold'] ? $prodSold['products_sold'] : 0;
    mysqli_free_result($productSoldResult);
    mysqli_next_result($connection); //Prepares next query

} catch (\Throwable $th) {
    throw $th;
}

//QTY OF PRODUCTS SOLD
try {
    $fetchQuantityProducts = "SELECT SUM(qty) AS qty_products_sold
                        FROM transaction;"
                    ;
    $qtyProdResult = mysqli_query($connection, $fetchQuantityProducts);
    $qtyProdCount = mysqli_fetch_assoc($qtyProdResult);

    $qtyProducts = $qtyProdCount["qty_products_sold"] ? $qtyProdCount["qty_products_sold"] : 0;
    mysqli_free_result($qtyProdResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    throw $th;
}

//PRODUCT AMOUNT SOLD
try {
    $productsAmountSoldQuery = "SELECT SUM(amount) AS products_amount_sold
                        FROM transaction;"
                    ;
    $prodAmountSoldResult = mysqli_query($connection, $productsAmountSoldQuery);
    $prodSoldAmount = mysqli_fetch_assoc($prodAmountSoldResult);

    $productAmountSold = $prodSoldAmount["products_amount_sold"] ? $prodSoldAmount["products_amount_sold"] : 0;
    mysqli_free_result($prodAmountSoldResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    throw $th;
}

//FETCH COUNT OF TRANSACTIONS
try {
    $transactionQuery = "SELECT COUNT(*) AS totalTransactions
                        FROM `transaction`;"
                ;
    $qtyTransactResult = mysqli_query($connection, $transactionQuery);
    $transactAssoc = mysqli_fetch_assoc($qtyTransactResult);

    $transactionCount = $transactAssoc["totalTransactions"] ? $transactAssoc["totalTransactions"] : 0;
    mysqli_free_result($qtyTransactResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}