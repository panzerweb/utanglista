<?php

require("../config/config.php");


// Includes the pagination template
include("../includes/pagination.php");
if(!isset($_GET["fetchdate"]) || empty($_GET["fetchdate"])){
    $dataByDateQuery = "SELECT 
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
}
else{
    $date = htmlspecialchars($_GET["fetchdate"]);

    $dataByDateQuery = "SELECT products.prod_name, customers.c_name, transaction.qty, transaction.amount, transaction.created_at
                    FROM transaction
                    INNER JOIN products
                    ON transaction.prod_id=products.id
                    INNER JOIN customers
                    ON transaction.c_id=customers.id
                    WHERE customers.is_deleted = 0 AND transaction.created_at LIKE '$date%' 
                    ORDER BY created_at DESC
                    LIMIT $startFrom, $limitPerPage;"
                    ;
}
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

        //Show the pagination
        //Total row count query
        $countQuery = "SELECT COUNT(*) FROM transaction t
                    JOIN products p ON t.prod_id = p.id
                    JOIN customers c ON t.c_id = c.id
                    WHERE c.is_deleted = 0";

        if (!empty($_GET["fetchdate"])) {
            $escapedDate = htmlspecialchars($_GET["fetchdate"]);
            $countQuery .= " AND t.created_at LIKE '$escapedDate%'";
        } else {
            $countQuery .= " AND t.created_at >= CURDATE()
                            AND t.created_at < CURDATE() + INTERVAL 1 DAY";
        }

        $totalResult = mysqli_query($connection, $countQuery);
        $totalRows = mysqli_fetch_row($totalResult)[0];
        $total_pages = ceil($totalRows / $limitPerPage);

        // ✅ Only show pagination if more than 1 page
        if ($total_pages > 1) {
            echo '<nav aria-label="Page navigation" id="pagination" class="d-flex justify-content-center mt-4">';
            echo '<ul class="pagination pagination-md">';

            for ($pagination = 1; $pagination <= $total_pages; $pagination++) {
                $isActive = isset($_GET['page']) ? ($_GET['page'] == $pagination) : ($pagination == 1);
                echo '<li class="page-item ' . ($isActive ? 'active' : '') . '">';
                echo '<a href="" class="pagination-link page-link ' 
                    . ($isActive ? 'bg-success border-success text-white' : 'bg-dark text-success border-success') 
                    . ' fw-semibold px-4 mx-1" data-page="' . $pagination . '">'
                    . $pagination . '</a>';
                echo '</li>';
            }

            echo '</ul></nav>';
        }

    }
    else{
        echo "<td colspan='5'  class='text-center text-muted'>No results found on <span class='text-dark fw-semibold'>'$date'</span></td>"; // Display an empty query
    }