<?php
// Backend logic for deletion of customers
// No Fetch API attached

//THIS CODE IMPLEMENTS SOFT DELETION

require("../config/config.php");

if(isset($_GET["customer_id"])){
    $id = $_GET["customer_id"];

    $deleteQuery = "UPDATE customers SET is_deleted = 1 WHERE id = '$id' AND is_deleted = 0"; //UPDATES THE is_deleted to 1
    $result = mysqli_query($connection, $deleteQuery)
    or die(mysqli_error($connection));
        
    header("Location: ../views/customer.php");
}