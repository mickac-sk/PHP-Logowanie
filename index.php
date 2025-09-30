<?php
    session_start();

    if(isset($_SESSION['is_user_loggedin']) && $_SESSION['is_user_loggedin'] == true){
        header('Location: welcome.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <p><?php 
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?></p>
        <p><?php 
            if(isset($_GET['loginerror']) && $_GET['loginerror'] == 1){
                echo 'Username or password is invalid';
            }
        ?></p>
    <form action="login.php" method="POST">
        <h2>Zaloguj się</h2>


        <label for="username">Nazwa użytkownika:</label><br>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <button type="submit">Zaloguj</button>
    </form>
    <a href="register.php">Niemasz konta? -> Zarejestruj się!</a>
</body>
</html>