<?php
require '../db_connection.php';

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $task = $_POST['task'];
    $stmt = $conn->prepare('INSERT INTO todo_table (title, task, done) VALUES (?, ?, 0)');
    $stmt->execute([$title, $task]);
    if (headers_sent()) {
        die("Redirect failed.");
    }
    else {
        $conn = null;
        exit(header("Location: ../index.php"));
    }

}