<?php
// Retrieves all data from database: Customer logs, product logs
// transaction logs, payment logs, and more.

require("../config/config.php");

try {
    $retrieveCustomerQuery = "SELECT users.admin_name, customer_logs.message, customers.c_name, customer_logs.created_at
                            FROM customers
                            INNER JOIN customer_logs
                            ON customers.id=customer_logs.customer_id
                            INNER JOIN users
                            ON customer_logs.admin_id=users.id;"
                        ;
    $result = mysqli_query($connection, $retrieveCustomerQuery);
    $customer_logs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}