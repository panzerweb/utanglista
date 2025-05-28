<?php

//Fetches admin related data
//Super Admin access ONLY

require("../config/config.php");

// FETCH ALL USERS IN THE SYSTEM
try {
    $retrieveUsers = "SELECT id, admin_name, admin_email, admin_role 
                        FROM users 
                        WHERE is_deleted=0 
                        AND admin_role = 'admin';";
    $result = mysqli_query($connection, $retrieveUsers);

    $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);


    mysqli_free_result($result);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}
//FETCH THE COUNT OF ALL USERS IN THE SYSTEM
try {
    $userCountQuery = "CALL userCount();";
    $result = mysqli_query($connection, $userCountQuery);
    $count = mysqli_fetch_assoc($result);

    $totalUserCount = $count["totalUser"] ?? '0';
    
    mysqli_free_result($result);
    mysqli_next_result($connection);
} catch (\Throwable $th) {
    throw $th;
}