<?php

$sName = "mysql:host=mysql;dbname=tutorial";
$userName = "tutorial";
$password = "secret";
$db_name = "tutorial";

try {
    $conn = new PDO($sName, $userName, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "Connected to the database";

} 

catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
