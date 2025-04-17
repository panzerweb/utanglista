<?php
// --- Retrieves all data base on query conditions ---
// Note: Nevermind the message:
//       The variables variable_name is assigned, but its value is never used

//=== Has currently 3 different try-catch blocks to handle multiple select queries ===

require("../config/config.php");
// FETCH ALL DATA
try {
    $selectCustomer = "SELECT * FROM selectallcustomer";
    $fetchResult = mysqli_query($connection, $selectCustomer) or die(mysqli_error($connection));

    $customers = mysqli_fetch_all($fetchResult, MYSQLI_ASSOC);

    mysqli_free_result($fetchResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    echo $th;
}

// FETCH COUNT OF DATA
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

// FETCH DATA BASED ON BALANCE
try {
    $customerByBalance = "SELECT * FROM customerbybalance";
    $sortResult = mysqli_query($connection, $customerByBalance);

    $sortByBalance = mysqli_fetch_all($sortResult, MYSQLI_ASSOC);
    mysqli_free_result($sortResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    echo $th;
}

// CLOSE CONNECTION
mysqli_close($connection);