<?php
require '../db_connection.php';

if(isset($_POST['id'])){
    

    $id = $_POST['id'];

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $stmt = $connection->prepare('DELETE FROM todos WHERE id = :id');
        $stmt->bindValue('id', $id);
        $stmt->execute();
    
    }
}else {
    header("Location: ../index.php?mess=error");
}