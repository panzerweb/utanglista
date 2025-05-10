<?php

// Inserts new category in the database

require("../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $category = htmlspecialchars($_POST["category_name"]);

    $insertCategory = "INSERT INTO category(category_name) VALUES ('$category');";
    $result = mysqli_query($connection, $insertCategory);

    if ($result) {
        header('Location: ../views/products.php');
        // echo "success";
    }
    else{
        echo "error";
    }
}