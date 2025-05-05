<?php  

require_once '../Connection/db_connect.php';

function get_user($conn, $username) {
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}



function get_user_pwd($conn, $username) {
    $query = "SELECT password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $user_pwd = mysqli_fetch_assoc($result);
    return $user_pwd;
}