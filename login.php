<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'db_connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $user = $result->fetch_asoc();

            // czy jest poprawne hasło
            
        }
    }

}else{
    //zwracamy błąd

}
