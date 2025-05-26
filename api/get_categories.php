<?php 
// Logic to fetch all categories from database

require("../config/config.php");

// RETRIEVE ALL CATEGORIES
try {
    $selectAllCategory = "SELECT * FROM category";
    $result = mysqli_query($connection, $selectAllCategory);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_next_result($connection);

} catch (\Throwable $th) {
    echo $th;
}

//RETRIEVE ALL PRODUCTS BY CATEGORY
try {
    $productByCategory = []; //Insert the query here
    foreach($categories as $category){
            $category_id = $category["id"];
            $productsCat = "SELECT products.prod_name, products.prod_price, category.category_name, products.created_at 
                            FROM products 
                            INNER JOIN category
                            ON products.category_id = category.id
                            WHERE category_id='$category_id';"
                ;
            $result = mysqli_query($connection, $productsCat);

            $productByCategory[$category_id] = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            mysqli_free_result($result);
            mysqli_next_result($connection);

    }
} catch (\Throwable $th) {
    throw $th;
}