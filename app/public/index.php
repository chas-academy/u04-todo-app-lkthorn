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
    <title>To Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if (isset($_GET['update'])){ ?>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Edit your task title" required>
            <input type="text" name="task" placeholder="Edit your task description">
            <button type="submit" class="" name="update">Update</button>
        </form>

    <?php
    }
    else { ?>
    <form action="" method="post">
        <input type="text" name="title" placeholder="Enter your task title" required>
        <input type="text" name="task" placeholder="Enter your task description">
        <button type="submit" class="" name="add">Add task</button>
    </form>
    <?php
    }
    ?>
<?php
$todos = $conn->query("SELECT * FROM todos");
while($row = $todos->fetch(PDO::FETCH_ASSOC)) {
    echo"<br>";
?>
    <section class="todo-card"> <?php
    
    if($row['done'] === 1) { ?>
        <section class="tittle-done"><?php echo $row['title'] . "\n"; ?></section>
        <section class="task"><?php echo $row['task'] . "\n"; ?></section>
    
    <?php 
    }
    else {?>
        <section class="tittle"><?php echo $row['title'] . "\n"; ?></section>
        <section class="task"><?php echo $row['task'] . "\n"; ?></section>
    <?php
    }
    ?>

        <section class="icons">
        <br>
	    <a href="index.php?taskDone=<?php echo $row['id']; ?>"><button>&#10003;</button></a> 
	    <a href="index.php?update=<?php echo $row['id']; ?>"><button>&#9998;</button></a> 
        <a href="index.php?delete=<?php echo $row['id']; ?>"><button>&#10005;</button></a>
	    
        </section>
        
        <?php
}
?>      </section>
    </body>
</html>