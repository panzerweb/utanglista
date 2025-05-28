<?php
// Super Admin Access ONLY
// Deletes regular role-based admins

require("../../config/config.php");

if (isset($_GET["user_id"])) {
    $user_id = htmlspecialchars($_GET["user_id"]);

    $deleteUser = "UPDATE users SET is_deleted=1 WHERE id='$user_id' AND is_deleted=0";
    $result = mysqli_query($connection, $deleteUser);

    header("Location: ../views/user_dashboard.php");
}