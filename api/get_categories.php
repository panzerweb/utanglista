<?php 
// Logic to fetch all categories from database

require("../config/config.php");

try {
    $selectAllCategory = "SELECT * FROM category";
    $result = mysqli_query($connection, $selectAllCategory);

    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_next_result($connection);

} catch (\Throwable $th) {
    echo $th;
}