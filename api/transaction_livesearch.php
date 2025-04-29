<?php
// Backend logic for livesearch using fetch API inside customer page ONLY
// Logic supported by transaction_page_livesearch.js which uses Fetch API

require("../config/config.php");
// Refers to the get method of the transaction_page_livesearch.js uri search
// If the search is empty, then default select query
if(!isset($_GET["transact_search"]) || empty($_GET["transact_search"])){
    $transactSearchQuery = "SELECT * FROM transaction_view;";
}
else{
    $search = htmlspecialchars($_GET["transact_search"]);
    $transactSearchQuery = " SELECT products.prod_name, customers.c_name, transaction.qty, transaction.amount, transaction.created_at
                    FROM transaction
                    INNER JOIN products
                    ON transaction.prod_id=products.id
                    INNER JOIN customers
                    ON transaction.c_id=customers.id
                    WHERE customers.is_deleted = 0 AND customers.c_name LIKE '%$search%' 
                    OR customers.is_deleted= 0 AND products.prod_name LIKE '%$search%'
                    ORDER BY created_at DESC;
    ";
}

$result = mysqli_query($connection, $transactSearchQuery);

if($result->num_rows > 0){
    while ($transaction = $result->fetch_assoc()) {
        $date = date_create($transaction["created_at"]);
        echo "<tr>";
            echo "<td>" . htmlspecialchars($transaction['prod_name']) . "</td>";
            echo "<td class='text-center'>" . htmlspecialchars($transaction['c_name']) . "</td>";
            echo "<td class='text-center'><span class='badge bg-success'>" . htmlspecialchars($transaction['qty']) . "</span></td>";
            echo "<td class='text-center'>" . htmlspecialchars($transaction['amount']) . "</td>";
            echo "<td class='text-center'>" . date_format($date, "Y/m/d H:i:s A") . "</td>";
        echo "</tr>";
    }
}
else{
    echo "<td colspan='5'  class='text-center text-muted'>No results found</td>"; // Display an empty query
    
}