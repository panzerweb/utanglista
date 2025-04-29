<?php

//Php code for adding products
require("../config/config.php");
include("../api/auth.php"); //Included the authentication access

$target_dir = __DIR__ . "/../public/uploads/";
$target_file = $target_dir . basename($_FILES["prod_image"]["name"]);
$upload_Ok = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $admin_id = $_SESSION["user_id"];
    $product_name = htmlspecialchars($_POST["prod_name"]);
    $product_price = htmlspecialchars($_POST["prod_price"]);
    $category = htmlspecialchars($_POST["category"]);

    //Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["prod_image"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $upload_Ok = 1;
    } else {
        echo "File uploaded is not an image!";
        $upload_Ok = 0;
    }
    
    //Check if file already exist
    if(file_exists($target_file)){
        echo "Sorry, this file already exists!";
        $upload_Ok = 0;
    }
    //Check file size
    if($_FILES["prod_image"]["size"] > 500000){
        echo "Image uploaded is too large!";
        $upload_Ok = 0;
    }

    // Check if $upload_Ok is set to 0 by an error
    if ($upload_Ok == 0) {
        echo "Sorry, your file was not uploaded.";
    } 
    else {
        if (move_uploaded_file($_FILES["prod_image"]["tmp_name"], $target_file)) {
            $image_path = 'uploads/' . basename($_FILES["prod_image"]["name"]);
            $insertQuery = "INSERT INTO products (category_id, prod_name, prod_price, prod_image, admin_id)
                            VALUES ('$category', '$product_name', '$product_price', '$image_path', $admin_id); "
                    ;
            $result = mysqli_query($connection, $insertQuery);

            if ($result) {
                echo "success";
            }
            else{
                echo "error";
            }

            // echo "Product added! Details: <br>";
            // echo "Name: " . $product_name . "<br>";
            // echo "Price: " . $product_price . "<br>";
            // echo "Category: " . $category . "<br>";
            // echo "The image file " . htmlspecialchars(basename($_FILES["prod_image"]["name"])) . "has been uploaded";
        } else {
            echo "Uploading file failed!";
        }
        
    }
    
}