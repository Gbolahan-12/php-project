<?php
// session_start();
require_once '../Connection/db_connect.php';

if (isset($_POST['login']) || $_SERVER['REQUEST_METHOD'] == 'submit'){

    $username = $_POST['username'];
    $password = $_POST['password'];


    try {
        require_once 'login-model.php';
        require_once 'login-view.php';
        require_once 'login-contr.php';

        $errors = [];


        $result = get_user($conn, $username);
        $user_pwd = get_user_pwd($conn, $username);

        if (is_empty_inputs($username, $password)) {
            $errors["empty-inputs"] = "Please fill all inputs fields";
        } else if (username_wrong($result)) {
            $errors["invalid-username"] = "Username does not exist";
        } else if (invalid_password($password, $user_pwd['password'])) {
            $errors["wrong-password"] = "Wrong password";
        } else {

            // Set client role and username to session if there is no error

            $_SESSION["role"] = $result['role'];


            if ($_SESSION["role"] == 'admin') {
                $_SESSION["role"] = $result['role'];
                $_SESSION["username"] = $result['username'];
                $_SESSION["user_pwd"] = $result['password'];
                $_SESSION["user_email"] = $result['email'];
                $_SESSION['user_id'] = $result['id'];
                header("Location: ../admin/admin-dashboard/admin.php");
                exit;
            } else if ($_SESSION["role"] == 'user') {
                $_SESSION["user_id"] = $result['id'];
                $_SESSION["role"] = $result['role'];
                $_SESSION["username"] = $result['username'];
                $_SESSION["user_email"] = $result['email'];
                $_SESSION["user_pwd"] = $result['password'];
                header("Location: user-dashboard.php");
                exit;
            }

        }

        // Check if there's error
        if (!empty($errors)) {
            $_SESSION['login-errors'] = $errors;
            header("Location: ../index.php");
            // unset($_SESSION['login-errors']);
            exit;
        }else{
            $_SESSION['login-success'];
        }

    } catch (Exception $e) {
        echo 'Query failed' . $e->getMessage();
    }

} else {
    // send user back to login page if they wanna play smart lol
    echo "You can not access this page";
    header("Location: ../index.php");
    exit;
}

// $_SESSION['role'] = 'user';

// $userrole = $_SESSION['role'];

// if(isset($userrole)){
//     header("Location: user-dashboard.php");
//     exit;
// }