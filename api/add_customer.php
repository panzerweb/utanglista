<?php
//Php backend code for adding of customers
//--- Backend supported by insert_customer.js using Fetch API ---

require("../config/config.php");
include("../api/auth.php"); //Included the authentication access

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get all fields
    $admin_id = $_SESSION["user_id"];
    $name = htmlspecialchars($_POST["c_name"]);
    $contact = htmlspecialchars($_POST["c_contact"]);

    // Insert query
    // $insertQuery = "INSERT INTO customers (c_name, c_contact, admin_id) 
    //                 VALUES ('$name', '$contact', '$admin_id')";
    $insertQuery = "CALL sp_insertCustomer('$name', '$contact', $admin_id);";
    // Executes a result
    $result = mysqli_query($connection, $insertQuery);
    // throws condition and message for fetch api to process
    if($result){
        echo 'success';
    }
    else{
        echo "error";
    }
}