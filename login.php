<?php
session_start();
//user 
$valid_username = "admin";
$valid_password = "password123";

if($_SERVER['REQUEST_METHOD'] != "POST"){
    header("Location: index.php");
    exit();
}

// login data verification
if(empty($_POST['username'])){
    $_SESSION['error'] = "Username cannot be blank";
    header("Location: index.php");
    exit();
}

//password data verification
if(empty($_POST['password'])){
    $_SESSION['error'] = "Password cannot be blank";
    header("Location: index.php");
    exit();
}

if($_POST['username'] === $valid_username && $_POST['password'] === $valid_password){
    $_SESSION['loggedin_user'] = $_POST['username'];
    $_SESSION['is_user_loggedin'] = true;
    
    header('Location: welcome.php');
    exit();
} else{
    header('Location: index.php?loginerror=1');
    exit();
}