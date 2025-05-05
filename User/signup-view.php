<?php   

function check_signup_error(){
    if (isset($_SESSION['signup-errors']) && !empty($_SESSION['signup-errors'])) {

        echo "<div style='color:red; font-weight:bold;'>";
    
        foreach ($_SESSION['signup-errors'] as $error) {
            echo "<p>$error</p>";
        }
    
        echo "</div>";

        unset($_SESSION['signup-errors']);
    }
}

function check_signup_success(){
    

    if (isset($_SESSION['signup-success'])) {
        echo "<div style='color:green; font-weight:bold;'>" . $_SESSION['signup-success'] . "</div>";
        unset($_SESSION['signup-success']);
    }
}