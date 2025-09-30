<?php
session_start();
// is user logged in
if(!isset($_SESSION['is_user_loggedin']) && $_SESSION['is_user_loggedin'] != true){  
    header('Location: index.php');
    exit();
}

$username = $_SESSION['loggedin_user'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $username ?></title>
</head>
<body>
    <h1>Welcome <?php echo $username ?>!</h1>
    <p>This site is for logged in users only</p>
    <a href="logout.php">Logout</a>
</body>
</html>