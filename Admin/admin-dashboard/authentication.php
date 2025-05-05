<?php 

if(isset($_SESSION['username'])){
    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];
        $error = [];
        $query ="SELECT * FROM users WHERE username = '$username' AND role = '$role' LIMIT 1";
        $result = mysqli_query($conn,$query);

        if($result){

            if(mysqli_num_rows($result) == 0){
                $error["denied"] = "Access denied";
                session_start();
                session_unset();
                session_destroy();
                header("Location ../../login.php");
                exit;
            } else{

            }
        }

    }
}else{

}

?>