<?php   
session_start();

$role = $_SESSION['role'];

if(isset($role)){
    require 'user-header.php';
    require 'user-sidebar.php';
    require 'user-main.php';
    require 'user-footer.php';
        
}else{
    header("Location: ../index.php");
    exit;

}




