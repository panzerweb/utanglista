<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_table = "utanglista_db";

try {
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
} catch (\Throwable $th) {
    echo "Failed to Connect, error: " . $th;
}

if ($connection) {
    return "Connected Successfully";
} else {
    echo "Connection Failed!";
}

