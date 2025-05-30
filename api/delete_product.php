
<?php
// Implements Soft Deletion of products in the database
// Sets the is_delete column to one by updating the products
// Table.

require("../config/config.php");
session_start();

if (isset($_GET["product_id"])) {
    $product_id = htmlspecialchars($_GET["product_id"]);
    
    if(isset($_SESSION["user_id"])){
        $adminId = $_SESSION["user_id"];

        $setQuery = "SET @user_id = " . intval($adminId);
        $setQueryResult = mysqli_query($connection, $setQuery);
    }


    $deleteQuery = "UPDATE products SET is_deleted= 1 WHERE id='$product_id' AND is_deleted=0;";
    $result = mysqli_query($connection, $deleteQuery);

    if ($result) {
        echo "Product Deleted Successfully";
    } else {
        echo "Error deleting product";
    }
    

}