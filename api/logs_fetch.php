<?php
// Retrieves all data from database: Customer logs, product logs
// transaction logs, payment logs, and more.

require("../config/config.php");

// FETCH CUSTOMER LOGS
try {
    $retrieveCustomerQuery = "SELECT users.admin_name, customer_logs.message, customers.c_name, customer_logs.old_name, customer_logs.new_name, customer_logs.created_at
                            FROM customers
                            INNER JOIN customer_logs
                            ON customers.id=customer_logs.customer_id
                            INNER JOIN users
                            ON customer_logs.admin_id=users.id
                            ORDER BY created_at DESC;"
                        ;
    $result = mysqli_query($connection, $retrieveCustomerQuery);
    $customer_logs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}

//FETCH PRODUCT LOGS
try {
    $retrieveProductQuery = "SELECT users.admin_name, product_logs.message, products.prod_name, product_logs.old_name, product_logs.new_name, products.created_at
                            FROM products
                            INNER JOIN product_logs
                            ON products.id = product_logs.product_id
                            INNER JOIN users
                            ON product_logs.admin_id=users.id
                            ORDER BY created_at DESC;"
                        ;
    $prodresult = mysqli_query($connection, $retrieveProductQuery);
    $product_logs = mysqli_fetch_all($prodresult, MYSQLI_ASSOC);

    mysqli_free_result($prodresult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}

// FETCH TRANSACTION LOGS
try {
    $retrieveTransactionQuery = "SELECT customers.c_name, transaction_logs.message, products.prod_name, transaction_logs.created_at
                            FROM customers
                            INNER JOIN transaction_logs
                            ON customers.id=transaction_logs.customer_id
                            INNER JOIN products
                            ON transaction_logs.product_id=products.id;"
                            ;
    $transactResult = mysqli_query($connection, $retrieveTransactionQuery);
    $transact_logs = mysqli_fetch_all($transactResult, MYSQLI_ASSOC);

    mysqli_free_result($transactResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}

//FETCH PAYMENT LOGS
try {
    $retrievePaymentQuery = "SELECT payment.c_id, customers.c_name, payment_logs.message, payment.payment_amount, payment_logs.created_at
                        FROM customers
                        INNER JOIN payment_logs
                        ON customers.id=payment_logs.customer_id
                        INNER JOIN payment
                        ON payment.id=payment_logs.payment_id;"
                ;
    $paymentResult = mysqli_query($connection, $retrievePaymentQuery);
    $payment_logs = mysqli_fetch_all($paymentResult, MYSQLI_ASSOC);

    mysqli_free_result($paymentResult);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}