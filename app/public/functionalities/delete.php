<?php
require '../db_connection.php';

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $stmt = $conn->prepare('DELETE FROM todo_table WHERE id = :id');
        $stmt->bindValue('id', $id);
        $stmt->execute();

        header("Location: ../index.php");    }
