<?php
require './db_connection.php';


if(isset($_GET['taskDone'])) {
    $id = $_GET['taskDone'];
    $stmt = $conn->prepare('UPDATE todos SET done = true WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if(headers_sent()){
        die("Failed to redirect.");
    }
    else {       
        exit(header("Location: ./index.php"));
    }
}