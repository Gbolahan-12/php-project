<?php   
require '../connection/db_connect.php';
session_start();

$username = $_SESSION['username'];
$courseId = $_GET['id'];

$query = "SELECT id, course_name, describtion, lecturer FROM course WHERE id = '$courseId'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        
        // $id = $row['id'];
        $course_name = mysqli_real_escape_string($conn,$row['course_name']);
        $description = mysqli_real_escape_string($conn, $row['describtion']);
        $lecturer = mysqli_real_escape_string($conn, $row['lecturer']);
    }

}

$insert = "INSERT INTO subscription (subname,title,lecname) VALUES ('$username','$course_name','$lecturer')";
$run = mysqli_query($conn,$insert);

if($run){
    echo "Subscription succesfully";
}else{
    echo "Subscription failed";

}
