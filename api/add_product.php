<?php

//Php code for adding products

if(isset($_POST["submit"])){
    $product_name = $_POST["prod_name"];
    $product_price = $_POST["prod_price"];
    $category = $_POST["category"];
    $product_image = $_POST["prod_image"];

    echo "Product added! Details: <br>";
    echo "Name: " . $product_name . "<br>";
    echo "Price: " . $product_price . "<br>";
    echo "Category: " . $category . "<br>";
    echo "Image: " . $product_image . "<br>";
}