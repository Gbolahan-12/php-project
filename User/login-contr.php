<?php  
require_once '../connection/db_connect.php';
// Check empty inputs

function is_empty_inputs($username,$password){
    if(empty($username) || empty($password)){
        return true;
    } else {
        return false;
    }
}


function username_wrong($result){
    if(empty($result)){
        return true;
    }else{
        return false;
    }
}




function invalid_password($password, $hashedpwd){

    if($password != $hashedpwd){
        return true;
    }else{
        return false;
    }
    // return password_verify($password, $hashedpwd);
}