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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form class="edit_form" action="" method="post">

        <label for="task">Edit task:</label>

        <input type="text" id="task" value="<?php echo $info['Title'] ?>" name="title">
        <label class="space" for="description">Edit description:</label>
        <input type="text" id="description" value="<?php echo $info['Description'] ?>" name="description">
       

        <button type="submit" name="update">Update</button>



    </form>

    </body>

</html>
