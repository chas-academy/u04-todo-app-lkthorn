<?php
require '../db_connection.php';

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stmt = $conn->prepare('INSERT INTO todo_table (title, description, done) VALUES (?, ?, 0)');
    $stmt->execute([$title, $description]);
    if (headers_sent()) {
        die("Redirect failed.");
    }
    else {
        $conn = null;
        exit(header("Location: ../index.php"));
    }

}