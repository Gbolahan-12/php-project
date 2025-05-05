<?php   
  
require_once '../Connection/db_connect.php';


if(isset($_POST['signupUser'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    session_start();

    try {
        require_once 'signup-model.php';
        require_once 'signup-view.php';
        require_once 'signup-contr.php';

        $errors = [];

        // $result = check_username($conn, $username);

        if(is_empty_inputs($username,$email,$password)){
            $errors["empty-inputs"] = "Please fill all inputs fields";
            echo 'Inputs are empty';
        }
        if (is_username_exist($conn, $username)) {
            $errors["username-exist"] = "Username already taken";
            echo 'Username already taken';
        }


        if(is_valid_email($email)){
            $errors["invalid-email"] = "Your email is not valid";
            echo 'Your email is not valid';

        }
        if(!empty($errors)){
            $_SESSION['signup-errors'] = $errors;
            header("Location: ../signup.php");
            exit;
        }else{
            $_SESSION["signup-success"] = "Registration Successful";
            register_user($conn,$username,$email,$password,$role);
            header("Location: ../signup.php");
            exit;
        }

    } catch (Exception $e) {
       echo 'Query failed' . $e->getMessage();
    }

} else{
    echo "You can not access this page";
    // header("Location: ../index.php");
    exit;
}