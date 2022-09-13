<?php
require '../db_connection.php';

if (isset($_GET["edit"])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM todo_table WHERE id=id";
    $stmt = $conn->prepare($query);

    $stmt->bindValue("id", $id);
    $stmt->execute();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);

}
if (isset($_POST["update"], $_GET["edit"])) {

    $id = $_GET['edit'];
    $title = $POST["title"];
    $description = $POST["description"];
    
    $query2 = 'UPDATE todo_table SET Id = :id, Title = :title, Description = description WHERE id=:id';

    $stmt2 = $conn->prepare($query2);
    $stmt2->execute([
        "id" => $id,
        "title" => $title,
        "description" => $description
    ]);    
}


    header("location: ../index.php");

?>



?>