<?php
require 'db_connection.php';
require 'functionalities/add.php';
require 'functionalities/check.php';
require 'functionalities/delete.php';
require 'functionalities/edit.php';


$todos = $conn->query("SELECT * FROM todos");
$row = $todos->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>To-do List</h1>
    <?php
    if (isset($_GET['update'])){ ?>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Edit your task title" required>
            <input type="text" name="task" placeholder="Edit your task description">
            <button type="submit" class="update" name="update">Update</button>
        </form>

    <?php
    }
    else { ?>
    <form action="" method="post">
        <input type="text" name="title" placeholder="Enter your task title" required>
        <input type="text" name="task" placeholder="Enter your task description">
        <button type="submit" class="add" name="add">Add task</button>
    </form>
    <?php
    }
    ?>
<?php
$todos = $conn->query("SELECT * FROM todos");
while($row = $todos->fetch(PDO::FETCH_ASSOC)) {
    echo"<br>";
?>
    <?php
    
    if($row['done'] === 1) { ?>
        <div class="title-done"><?php echo $row['title'] . "\n"; ?></div>
        <div class="task"><?php echo $row['task'] . "\n"; ?></div>
    
    <?php 
    }
    else {?>
        <div class="title"><?php echo $row['title'] . "\n"; ?></div>
        <div class="task"><?php echo $row['task'] . "\n"; ?></div>
    
    <?php
    } 
    ?>
        
        <br>       
	    <a href="index.php?taskDone=<?php echo $row['id']; ?>"><button class="icons">&#10004;</button></a> 
	    <a href="index.php?update=<?php echo $row['id']; ?>"><button class="icons">&#9998;</button></a> 
        <a href="index.php?delete=<?php echo $row['id']; ?>"><button class="icons">&#10008;</button></a>
	            
        
        <?php
}
?>      
    </body>
</html>