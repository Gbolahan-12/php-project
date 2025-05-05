<?php 
session_start();

function checkLoginError(){
    if(isset($_SESSION['login-errors'])){

        foreach($_SESSION['login-errors'] as $error){
            echo '<p class="login-error text-danger">'. $error .'</p>';

        }
        unset($_SESSION['login-errors']);

    }
}