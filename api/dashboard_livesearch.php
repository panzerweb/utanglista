<?php
// Backend logic for livesearch using fetch API inside dashboard page ONLY
// Logic supported by dashboard_livesearch.js which uses Fetch API

require("../config/config.php");

// Code to retrieve all data for a live search
// If query is empty, default select query
// Includes the pagination template
include("../includes/pagination.php");
if (!isset($_GET["dashsearch"]) || empty($_GET["dashsearch"])) {
    // Get the sorted list by balance
    $dashSearchQuery = "SELECT c_name, balance, DENSE_RANK() 
                        OVER (ORDER BY balance DESC) 
                        AS ranking
                        FROM customers
                        WHERE is_deleted = 0 AND balance > 0
                        LIMIT $startFrom, $limitPerPage;";
    $result = mysqli_query($connection, $dashSearchQuery);

    // If there are multiple or one result, then print out a new table row
    if($result->num_rows > 0){
        while ($customer = $result->fetch_assoc()) {
            echo "<tr>";
            if($customer["ranking"] == 1){
                echo "<td class='fw-bold'>" . "<span class='badge bg-warning text-dark fs-6'>" . htmlspecialchars($customer['ranking']) . "</span>" . "</td>";
            }
            else{
                echo "<td class='fw-bold'>" . "<span class='badge bg-secondary text-light fs-6'>" . htmlspecialchars($customer['ranking']) . "</span>" . "</td>";
            }
            echo "<td>" . htmlspecialchars($customer['c_name']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['balance']) . "</td>";
            echo "<tr>";
        }
        $totalQuery = "SELECT COUNT(*) AS total_count
            FROM (
                SELECT c_name, balance, DENSE_RANK() OVER (ORDER BY balance DESC) AS ranking
                FROM customers
                WHERE is_deleted = 0 AND balance > 0
            ) AS ranked_customers;
            ";
        $totalResult = mysqli_query($connection, $totalQuery);
        $totalRows = mysqli_fetch_row($totalResult)[0];
        $total_pages = ceil($totalRows/$limitPerPage);
        
        mysqli_free_result($result);
        mysqli_next_result($connection);
    }else{
        echo "<div class='fs-4 fw-bold w-100 py-3'>No results found</div>"; //No query row
    }
}
else{
    // Assumes the if(isset($_GET['dashsearch']))
    $search = htmlspecialchars($_GET["dashsearch"]); //Appended in the URI

    // Get the sorted list by balance but not the Stored Procedure
    $dashSearchQuery = "SELECT ranking, c_name, balance
                        FROM (
                            SELECT @rank := @rank + 1 AS ranking, c_name, balance
                            FROM customers, (SELECT @rank := 0) r
                            WHERE is_deleted = 0 AND balance > 0
                            ORDER BY balance DESC
                        ) AS ranked_customers
                        WHERE c_name LIKE '$search%'
                        LIMIT $startFrom, $limitPerPage;
                        "
                    ; 
    //Used LIKE and %%  to implement searching

    $result = mysqli_query($connection, $dashSearchQuery);

    // If there are multiple or one result, then print out a new table row
    if($result->num_rows > 0){
        while ($customer = $result->fetch_assoc()) {
            echo "<tr>";
            
            if($customer["ranking"] == 1){
                echo "<td class='fw-bold'>" . "<span class='badge bg-warning text-dark fs-6'>" . htmlspecialchars($customer['ranking']) . "</span>" . "</td>";
            }
            else{
                echo "<td class='fw-bold'>" . "<span class='badge bg-secondary text-light fs-6'>" . htmlspecialchars($customer['ranking']) . "</span>" . "</td>";
            }

            echo "<td>" . htmlspecialchars($customer['c_name']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['balance']) . "</td>";
            echo "<tr>";
        }
        $totalQuery = "SELECT COUNT(*) AS total_count
                    FROM (
                        SELECT c_name, balance, DENSE_RANK() OVER (ORDER BY balance DESC) AS ranking
                        FROM customers
                        WHERE is_deleted = 0 AND balance > 0
                    ) AS ranked_customers;
                    ";
        $totalResult = mysqli_query($connection, $totalQuery);
        $totalRows = mysqli_fetch_row($totalResult)[0];
        $total_pages = ceil($totalRows/$limitPerPage);
        
        mysqli_free_result($result);
        mysqli_next_result($connection);
    }else{
        echo "<td colspan='3' class='text-center text-muted'>No results found</td>"; //No query row
    }

}
