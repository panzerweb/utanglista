<?php
/*
    Retrieving all transaction data from the database
    Handle all queries inside a try-catch block with
    a prepare syntax for another query (if needed).
    Use:
    ```
    
        mysqli_free_result(parameter: result);
        mysqli_next_result($connection); //Prepares next query

    ```

*/
require("../config/config.php");

try {
    $getTransactions = "SELECT * FROM transaction_view;";
    $result = mysqli_query($connection, $getTransactions);
    
    $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_next_result($connection); //Prepares next query

} catch (\Throwable $th) {
    echo $th;
}