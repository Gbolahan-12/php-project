<?php  
require_once '../connection/db_connect.php';
// Check empty inputs

function is_empty_inputs($username,$email,$password){
    if(empty($username) || empty($email) || empty($password)){
        return true;
    } else {
        return false;
    }
}

// chect for valid email

function is_valid_email($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;

    } else{
        return false;
    }
}


function is_username_exist($conn, $username) {

    if(check_username($conn, $username)){
        return true;
    } else{
        return false;
    }
}




function register_user($conn,$username,$email,$password,$role){
    create_users($conn,$username,$email,$password,$role);



}