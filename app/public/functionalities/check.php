<?php
require '../db_connection.php';


if(isset($_GET['check'])) {
    $id = $_GET['check'];
    $stmt = $conn->prepare('UPDATE todo_table SET done = true WHERE id = :id');
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