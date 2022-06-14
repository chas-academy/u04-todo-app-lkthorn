<?php
require '../db_connection.php';

if(isset($_POST['id'])){
    
    $id = $_POST['id'];

    if (isset($_POST['delete'])) {
        $stmt = $conn->prepare('DELETE FROM todo_table WHERE id = :id');
        $stmt->bindValue('id', $id);
        $stmt->execute();

        header("Location: ../index.php");
    }
}else {
    header("Location: ../index.php?mess=error");
}