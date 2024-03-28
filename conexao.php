<?php

$host = "localhost";
$user = "root";
$db_password = "";
$db_name = "bd";

try {
    $conn = new PDO("mysql:host=$host; dbname=" . $db_name, $user, $db_password);
    //echo "conectou";
} catch (PDOException $err) {
    echo "Erro conexão" . $err->getMessage();
}
