<?php
// Backend logic for livesearch using fetch API inside dashboard page ONLY
// Logic supported by dashboard_livesearch.js which uses Fetch API

require("../config/config.php");

// Code to retrieve all data for a live search
if(isset($_GET["dashsearch"])){
    $search = htmlspecialchars($_GET["dashsearch"]); //Appended in the URI

    $dashSearchQuery = "SELECT id, c_name, balance FROM customers WHERE c_name LIKE '%$search%'"; //Used LIKE and %%  to implement searching
    $result = mysqli_query($connection, $dashSearchQuery);

    // If there are multiple or one result, then print out a new table row
    if($result->num_rows > 0){
        while ($customer = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($customer['id']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['c_name']) . "</td>";
            echo "<td>" . htmlspecialchars($customer['balance']) . "</td>";
            echo "<tr>";
        }
    }else{
        echo "<div class='fs-4 fw-bold w-100 py-3'>No results found</div>"; //No query row
    }
}