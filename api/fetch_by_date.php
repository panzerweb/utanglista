<?php

require("../config/config.php");

if(isset($_GET["fetchdate"])){
    $date = htmlspecialchars($_GET["fetchdate"]);

    $dataByDateQuery = "SELECT products.prod_name, customers.c_name, transaction.qty, transaction.amount, transaction.created_at
                    FROM transaction
                    INNER JOIN products
                    ON transaction.prod_id=products.id
                    INNER JOIN customers
                    ON transaction.c_id=customers.id
                    WHERE customers.is_deleted = 0 AND transaction.created_at LIKE '$date%' 
                    ORDER BY created_at DESC;"
                    ;
    $result = mysqli_query($connection, $dataByDateQuery);

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
        echo "<td colspan='5'  class='text-center text-muted'>No results found on <span class='text-dark fw-semibold'>'$date'</span></td>"; // Display an empty query
    }
}