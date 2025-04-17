<?php
session_start();
// mobalik sa login page if wala naka log-in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php?error=not_logged_in");
    exit();
}
?>