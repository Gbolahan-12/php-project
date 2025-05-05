<?php
session_start();
require_once 'connection/db_connect.php';
require_once 'user/signup-view.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row mt-4">
            <div class="col-12">
                <?php check_signup_success(); ?>
                <div class="card">
                    <div class="card-header">

                        <h3>Register</h3>
                    </div>
                    <div class="card-body shadow-sm">
                        <form action="user/signup-user.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">username</label>
                                <input type="text" class="form-control" id="email" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <?php $role = "user"; ?>
                                <input type="role" hidden value="<?= $role ?>" class="form-control"
                                    name="role">
                            </div>
                            <button type="submit" name="signupUser"
                                class="btn btn-primary text-center col-12">Register</button>
                        </form>

                    </div>

                </div>
                <div class="order text-center align-items-center mt-4">
                    <p>You already have an account? <a href="index.php">Login here</a></p>
                </div>

                <?php check_signup_error(); ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>