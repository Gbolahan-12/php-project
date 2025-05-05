<?php
session_start();
require_once '../../Connection/db_connect.php';

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    $about = mysqli_real_escape_string($conn, $_POST['about']);

    // Handle Profile Picture Upload
    $profile_pic = '';
    if (!empty($_FILES['profile_pic']['name'])) {
        $fileName = $_FILES['profile_pic']['name'];
        $fileTmp = $_FILES['profile_pic']['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        var_dump($fileName);

        $allowed = ['jpg', 'jpeg', 'png'];
        if (in_array($fileExt, $allowed)) {
            $profile_pic = 'profile_' . time() . '.' . $fileExt;

            // Check if old profile picture exists and delete (except default.png)
            $checkOldPicQuery = "SELECT profile_pic FROM profile WHERE user_id = $user_id";
            $result = mysqli_query($conn, $checkOldPicQuery);
            $row = mysqli_fetch_assoc($result);

            if ($row && $row['profile_pic'] !== 'default.png') {
                $oldPicPath = 'uploads/' . $row['profile_pic'];
                if (file_exists($oldPicPath)) {
                    unlink($oldPicPath);
                }
            }

            // Move new file
            move_uploaded_file($fileTmp, 'uploads/' . $profile_pic);
        } else {
            echo "Invalid file type!";
            exit;
        }
    }

    // Check if profile exists
    $checkQuery = "SELECT * FROM profile WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Update existing profile
        if ($profile_pic != '') {
            $updateQuery = "UPDATE profile SET profile_pic = ?, about = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($stmt, "ssi", $profile_pic, $about, $user_id);
        } else {
            $updateQuery = "UPDATE profile SET about = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($stmt, "si", $about, $user_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            echo "Profile updated successfully!";
        } else {
            echo "Failed to update profile.";
        }

    } else {
        // Insert new profile
        if ($profile_pic == '') {
            $profile_pic = 'default.png';
        }

        $insertQuery = "INSERT INTO profile (user_id, profile_pic, about) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "iss", $user_id, $profile_pic, $about);

        if (mysqli_stmt_execute($stmt)) {
            echo "Profile created successfully!";
        } else {
            echo "Failed to create profile.";
        }
    }

    header("Location: admin-profile-setng.php");
    exit;
}
?>
