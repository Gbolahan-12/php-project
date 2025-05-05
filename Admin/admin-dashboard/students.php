<?php  

require '../../connection/db_connect.php';

$query = "SELECT users.id, users.username FROM users INNER JOIN subscription WHERE user_id = 'users.id'";
$check = mysqli_query($conn, $query);

if(mysqli_num_rows($check) > 0){
    
     $fetch = mysqli_fetch_assoc($check);
     var_dump($fetch);

}