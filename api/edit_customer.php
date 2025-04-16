<?php 
//Update customers, supported by update_customers.js
//Handles POST Method not PUT and PATCH
require("../config/config.php");

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    // Get all variables
    $customer_id = $_POST["id"];
    $name = htmlspecialchars($_POST["c_name"]);
    $contact = htmlspecialchars($_POST["c_contact"]);
    $status = htmlspecialchars($_POST["status"]);

    // Update Query
    $updateQuery = "UPDATE customers SET c_name= '$name', c_contact= '$contact', status='$status' WHERE id='$customer_id'";
    $result = mysqli_query($connection, $updateQuery);

    //Returns a message in the Javascript file
    if($result){
        echo 'success';
    }
    else{
        echo 'error';
    }

}