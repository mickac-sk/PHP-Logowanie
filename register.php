<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        require 'db_connection.php';

        if(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password-repeat'])){
            $_SESSION['register_error'] = "All fields cannot be blank.";
            header('Location: register.php');
            exit();
        }

        if(strlen($_POST['password']) <= 8){
            $_SESSION['register_error'] = "Password must be at least 9 characters long";
            header('Location: register.php');
            exit();
        }

        if($_POST['password'] != $_POST['password-repeat']){
            $_SESSION['register_error'] = "Password and password repeat must be the same";
            header('Location: register.php');
            exit();
        }

        //hash password
        $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //check if user exists in the database
        $sql = "SELECT * FROM `users` WHERE 'username' = '".$_POST['login']."'";

        $result = $conn->query($sql);


        // $conn->query($sql) zwróci false jezeli jest brak wynikow lub obiekt mysqli_result
        //var_dump($result);

        
        
        
        if($result->num_rows > 0){
            // POKAZ (nie do aplikacji)
            while($row = $result->fetch_assoc()){
                echo "id: ".$row['id']." username: ".$row['username'];
            }
            $_SESSION['regiester_error'] = "User already exists";
            header('Location: register.php');
            exit();
        }else{
            // tworzymy uzykownika
            $sql2 = "INSERT INTO `users` (`username`, `password`) VALUES ('".$_POST['login']."','".$password_hashed."')";

            echo $sql2;

            $result = $conn->query($sql2);

            if($result != true){
                echo $conn->error;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <form action="register.php" method="post">
        <h2>Zarejestruj się</h2>

        <?php
            if(isset($_SESSION['register_error'])){
                echo '<p>'.$_SESSION['register_error'].'</p>';
                unset($_SESSION['register_error']);
            }
        ?>

        <label for="login">Login</label>
        <input type="text" name="login" id="login"><br><br>

        <label for="password">Hasło</label>
        <input type="password" name="password" id="password"><br><br>

        <label for="password-repeat">Potwierdź hasło</label>
        <input type="password" name="password-repeat" id="password-repeat"><br><br>

        <button type="submit">Zarejestruj się</button>
    </form>
</body>
</html>