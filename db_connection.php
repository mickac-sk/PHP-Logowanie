<?php
$host = 'localhost';
$dbname = 'logowanie';
$user = 'root';
$password = '';

//obiekt polaczenia z baza danych
$conn = new mysqli($host, $user, $password, $dbname);

//sprawdzenie, czy polaczenie do bazy dziala
if($conn->connect_error){
    die("Database connection error: ".$conn->connect_error);
}
//ustawienie kodowanie na UTF-8*
$conn->set_charset("utf8");