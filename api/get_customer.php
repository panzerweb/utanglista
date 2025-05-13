<?php
// --- Retrieves all data base on query conditions ---
// Note: Nevermind the message:
//       The variables variable_name is assigned, but its value is never used

//=== Has currently 3 different try-catch blocks to handle multiple select queries ===

require("../config/config.php");
// FETCH ALL DATA
try {
    $selectCustomer = "CALL selectAllCustomer()";
    $fetchResult = mysqli_query($connection, $selectCustomer) or die(mysqli_error($connection));

    $customers = mysqli_fetch_all($fetchResult, MYSQLI_ASSOC);

    mysqli_free_result($fetchResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    echo $th;
}

// FETCH DATA BASED ON BALANCE
try {
    $customerByBalance = "CALL customerByBalance()";
    $sortResult = mysqli_query($connection, $customerByBalance);

    $sortByBalance = mysqli_fetch_all($sortResult, MYSQLI_ASSOC);
    mysqli_free_result($sortResult);
    mysqli_next_result($connection); //Prepares next query
} catch (\Throwable $th) {
    echo $th;
}


// FETCH INTEREST ON LOAD
// ONCE A PAGE IS LOADED, THE MONTHS PASSED WILL CALCULATE TO THE BALANCE AND INTEREST
try {
    $customer = "SELECT * FROM customers";
    $result = mysqli_query($connection, $customer);
    // $response = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $customer_id = $row["id"];
        $balance = $row["balance"];
        $monthly_interest = $row["monthly_interest"];
        $interest_rate = $row["interest_rate"];

        $lastTransactionDate = $row['last_transaction_date'] ? new DateTime($row['last_transaction_date']) : new DateTime();
        $today = new DateTime();

        $diff = $today->diff($lastTransactionDate);
        $monthsPassed = ($diff->y * 12) + $diff->m;

        // Diminishing interest calculation
        for ($i = 0; $i < $monthsPassed; $i++) {
            $balance += $balance * $interest_rate;
        }
        $formattedToday = $today->format("Y-m-d");
        $monthly_interest = $balance * $interest_rate;

        $updateQuery = "UPDATE customers SET balance = '$balance', monthly_interest = '$monthly_interest', last_transaction_date = '$formattedToday' WHERE id = '$customer_id';";
        $updateResult = mysqli_query($connection, $updateQuery);

        // $response[] = [
        //     "customer_id" => $customer_id,
        //     "original_balance" => $row['balance'],
        //     "calculated_balance" => round($balance, 2),
        //     "monthly_interest" =>  $monthly_interest,
        //     "interest_rate" => $interest_rate,
        //     "months_since_last_txn" => $monthsPassed
        // ];

    }
    
    // echo json_encode($response);
} catch (\Throwable $th) {
    throw $th;
}


// CLOSE CONNECTION
mysqli_close($connection);
