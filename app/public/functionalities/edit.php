<?php
require '../db_connection.php';

if (isset($_POST['update'])) {
    $updateTitle = $_POST['title'];
    $updateTask = $_POST['task'];
    $id = $_GET['editTask'];
    $stmt = $conn->prepare('UPDATE todos SET title = :title, task = :task, done = false WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $updateTitle);
    $stmt->bindParam(':task', $updateTask);
    $stmt->execute();
    if (headers_sent()) {
        die("Failed to redirect.");        
    }
    else {
        exit(header("Location: index.php"));
    }
}
