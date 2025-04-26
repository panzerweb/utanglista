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

require("../config/config.php");

//FETCH COUNT OF CUSTOMERS BY DATE
if (isset($_GET["overview"])) {
    $date = htmlspecialchars($_GET["overview"]);

    $fetchCount = "SELECT COUNT(DISTINCT c_id) AS totalCustomerByDay 
                    FROM transaction
                    WHERE created_at LIKE '$date%';"
                ;
    $result = mysqli_query($connection, $fetchCount);
    $count = mysqli_fetch_assoc($result);

    $totalCount = $count['totalCustomerByDay'] ? $count['totalCustomerByDay'] : 0;

    if ($count) {
        echo htmlspecialchars($totalCount);
    }

    mysqli_free_result($result);
    mysqli_next_result($connection); //Prepares next query
}