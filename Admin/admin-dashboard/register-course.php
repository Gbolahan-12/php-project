<?php 


require '../../connection/db_connect.php';

if(isset($_POST['registerCourse'])){
    $course_name = $_POST['course'];
    $describtion = $_POST['describtion'];
    $lecturer = $_POST['lecturer'];

    $query = "INSERT INTO course (course_name,describtion,lecturer) VALUES ('$course_name','$describtion','$lecturer')";
    $result = mysqli_query($conn,$query);
    
    if($result){
        header("Location: admin.php");
        exit;
    }

}else{
    echo "Not Submitted";

}