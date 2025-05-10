<?php 
require("../config/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = htmlspecialchars($_POST['admin_name']);
    $email = htmlspecialchars($_POST['admin_email']);
    $password = htmlspecialchars($_POST['admin_password']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE admin_email = '$email'";
    $check_result = mysqli_query($connection, $check);

    if (mysqli_num_rows($check_result) > 0) {
         echo "Email Already Exist!";
    } else {
        $query = "INSERT INTO users (admin_name, admin_email, admin_password) VALUES ('$name', '$email', '$hashedPassword')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

} else {
    echo "Error! Can't connect to the database"; 
}
?>
