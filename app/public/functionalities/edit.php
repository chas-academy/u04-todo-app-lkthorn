<?php
require '../db_connection.php';


if (isset($_POST["id"])) {

    $id = $_POST['id'];
    $query = 'SELECT * FROM todo_table WHERE id=:id';
    $stmt = $conn->prepare($query);

    $stmt->bindValue("id", $id);
    $stmt->execute();

    $info = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST["edit"], $_POST["id"])) {

    $id = $_POST["edit"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $created = date("Y-m-d H:i:s");

    $query2 = "UPDATE titles SET Id = :id, Title = :title, Description = :description, Created = :created
    WHERE Id = :id";

    $stmt2 = $conn->prepare($query2);
    $stmt2->execute([
        "id" => $id,
        "title" => $title,
        "description" => $description,
        "created" => $created,

    ]);
    header("location: ../index.php");
}

?>



?>