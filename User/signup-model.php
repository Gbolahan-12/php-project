<?php  

require_once '../Connection/db_connect.php';

// function check_username($conn, $username){
//     $query = "SELECT username FROM users WHERE  username = '$username'";
//     $result = mysqli_query($conn, $query);
//     if($result->num_rows > 0){
//         return $result;
//     }

// }


function check_username($conn, $username) {
    $query = "SELECT username FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    if (!$stmt) {
        // Debug: error in prepare statement
        die('Prepare failed: ' . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && $result->num_rows > 0) {
        return true; // Username exists
    } else {
        return false; // Username does not exist
    }
}

function create_users($conn,$username,$email,$password,$role){
    $query = "INSERT INTO users (username,email,password,role) VALUES ('$username','$email','$password','$role')";
    $result = mysqli_query($conn, $query);
    if($result){
        return true;
    }else{
        return false;
    }
}