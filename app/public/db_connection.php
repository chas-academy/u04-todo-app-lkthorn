<?php

$serverName = "localhost";
$userName = "root";
$pass = "";
$db_name = "tutorial";

try {
    $conn = new PDO("mysql:host=$serverName; db_name=$db_name", $userName, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database";

} catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
