<?php   
session_start();
require '../../connection/db_connect.php';
if(isset($_GET['id'])){
    $userId = $_GET['id'];

    
    $query = "DELETE FROM `course` WHERE `course`.`id` = '$userId'";
    $result = mysqli_query($conn,$query);

    if($result){
        echo 'deleted successful';
        header("Location: admin.php");
        exit;

    }else{
        echo 'deleted unsuccessful';

    }




}
