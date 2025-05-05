<?php 
session_start();
require '../../connection/db_connect.php';

// echo $_SESSION["user_pwd"];
$user_id =  $_SESSION["user_id"];
$role = $_SESSION["role"];

$error = [];

if(isset($_POST['changePwd'])){
    $currentPwd = $_POST['currentPwd'];
    $newPwd = $_POST['newPwd'];

    if($_SESSION["user_pwd"] == $currentPwd){
        $_SESSION['successPwd'] = "Password successfully changed";
        $query = "UPDATE users SET `password`='$newPwd' WHERE `id`='$user_id'";
        $changePwd = mysqli_query($conn,$query);
        echo "Your password has successfully changed";

    }
    else{
        $error['wrong_pwd'] = "Your current password is wrong";
        if($role == 'user'){
            header("location: ../../user/user-profile.php");
            exit;
        }
         if($role == 'admin'){
            header("admin-profile-setng.php");
            exit;
        }
       
        

    }



}