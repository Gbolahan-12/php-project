<?php 
// session_start();



 session_start();

$role = $_SESSION['role'];

if(isset($role)){
    include_once 'admin-header.php';

include_once 'admin-sidebar.php';

include_once 'admin-main.php';
 include_once '../../User/user-footer.php';
        
}else{
    header("Location: ../../index.php");
    exit;

}