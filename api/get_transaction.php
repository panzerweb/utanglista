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

// USE LIMIT FOR PAGINATION
try {
    $getTransactions = "SELECT * FROM transaction_view"; // Restored the view - MySQL
    $result = mysqli_query($connection, $getTransactions);

    // Check if the query was successful
    if (!$result) {
        throw new Exception("Query failed: " . mysqli_error($connection));
    }

    $totalTransactions = mysqli_num_rows($result);

    // Includes the pagination template
    include("../includes/pagination.php");

    // QUERY FOR PAGINATION
    $paginationQuery = "SELECT 
                        p.prod_name,
                        c.c_name,
                        t.qty,
                        t.amount,
                        t.created_at
                        FROM 
                            `transaction` t
                        JOIN 
                            products p ON t.prod_id = p.id
                        JOIN 
                            customers c ON t.c_id = c.id
                        WHERE 
                            c.is_deleted = 0
                            AND t.created_at >= CURDATE()
                            AND t.created_at < CURDATE() + INTERVAL 1 DAY
                        ORDER BY 
                            t.created_at DESC
                        LIMIT $startFrom, $limitPerPage;"
    ;

    $transactions = mysqli_query($connection, $paginationQuery);
    $total_pages = ceil($totalTransactions / $limitPerPage);

    mysqli_free_result($result);
    mysqli_next_result($connection); // Prepares next query

} catch (\Throwable $th) {
    echo "<tr><td colspan='5' class='text-danger text-center'>Error: {$th->getMessage()}</td></tr>";
}
