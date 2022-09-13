<?php
require '../db_connection.php';


if(isset($_GET['done'])) {
    $id = $_GET['done'];
    $stmt = $conn->prepare('UPDATE todos SET done = true WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if(headers_sent()){
        die("Failed to redirect.");
    }
    else {
        $conn = null;
        exit(header("Location: index.php"));
    }
}