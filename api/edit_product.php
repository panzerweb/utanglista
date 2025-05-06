<?php

// This file specifically is for the editing of products
// It handles file_uploads and is bridged by update_product.js

require("../config/config.php");
include("../api/auth.php");




if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $product_id = $_POST["id"];
    $product_name = htmlspecialchars($_POST["prod_name"]);
    $product_price = htmlspecialchars($_POST["prod_price"]);
    $product_category = htmlspecialchars($_POST["category_id"]);

    // if image is included to be updated
    if (isset($_FILES['prod_image']) && $_FILES['prod_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = __DIR__ . "/../public/uploads/";
        $target_file = $target_dir . basename($_FILES["prod_image"]["name"]);
        $upload_Ok = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // FETCH OLD PRODUCT IMAGE FROM DATABASE
        $fetchOldImage = "SELECT prod_image FROM products WHERE id='$product_id'";
        $oldResult = mysqli_query($connection, $fetchOldImage);
        $old_image_assoc = mysqli_fetch_assoc($oldResult);

        $old_image = $old_image_assoc["prod_image"];
        $uploadDir = __DIR__ . '/../public/uploads/';
        $oldImagePath = $uploadDir . $old_image;

        // VALIDATIONS
        if($_FILES['prod_image']['name'] == "") {
            echo "No Image";
        }
        //Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["prod_image"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $upload_Ok = 1;
        } else {
            echo "File uploaded is not an image!";
            $upload_Ok = 0;
        }

        //Delete the old image
        if (!empty($old_image) && file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        //Handle the new upload of new file
        $newImage = $_FILES["prod_image"]["name"];
        


        //Check file size, MAX MB IS 5MB
        if($_FILES["prod_image"]["size"] > 5242880){
            echo "Image uploaded is too large!";
            $upload_Ok = 0;
        }

        if($upload_Ok == 0){
            echo "Sorry, your file was not uploaded.";
        }
        else{
            if(move_uploaded_file($_FILES["prod_image"]["tmp_name"], $target_file )){
                $image_path = 'uploads/' . basename($newImage);
                $updateProduct = "UPDATE products SET category_id= '$product_category', prod_name= '$product_name', prod_price='$product_price', prod_image='$image_path' WHERE id='$product_id'";
            }
            else{
                echo "Uploading file failed";
            }
        }
    }
    else{
        // If image is not updated, then update the remaining fields only
        $updateProduct = "UPDATE products SET category_id= '$product_category', prod_name= '$product_name', prod_price='$product_price' WHERE id='$product_id'";
    }

    // Regardless, execute query
    $result = mysqli_query($connection, $updateProduct);
        
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
    
}