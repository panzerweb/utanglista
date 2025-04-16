<?php
// Backend logic for deletion of customers
// No Fetch API attached

require("../config/config.php");

if(isset($_GET["customer_id"])){
    $id = $_GET["customer_id"];

    $deleteQuery = "DELETE FROM customers WHERE id = '$id'"; //Deletes the row
    $result = mysqli_query($connection, $deleteQuery)
    or die(mysqli_error($connection));
        
    header("Location: ../views/customer.php");
}