<?php
require 'db_connection.php';
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
    <div class="main-section">
        <div class="add-section">
            <form action="./functionalities/add.php" method="POST" >
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="title" placeholder="New task" />
                   <button type="submit"> Add task </button>

                    <?php }else {?>
                        <input hidden name="add" value="1" />
                        <input type="text"
                        name="title"
                        style="border-color: #ff6666"
                        placeholder="Field required"/>
                        <input type="text" name="description" placeholder="Task description" />
                        <button type="submit"> Add task </button>



                        <?php } ?>
                
            </form>
        </div>

        <?php
        $todos = $conn->query("SELECT * FROM todo_table ORDER BY id DESC");
        ?>
        <div class="todo-section">
            <?php if ($todos->rowCount() <= 0) { ?>

                <div class="todo-item">
                    <!--maybe an image here-->
                </div>
            <?php } ?>

            <?php
            while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="todo-item">                    
                    <input type="submit" name="" value="Delete">
                    <?php if ($todo['done']) { ?>
                        <input type="checkbox"
                        class="check-box"
                        checked />

                        <h2 class="done"><?php echo $todo['title'] ?></h2>
                        
                        <?php } else { ?>
                            <input type="checkbox"
                            class="check-box" />
                            <h2><?php echo $todo['title']?></h2>

                        <?php } ?>
                    <br>
                    <small>created:<?php echo $todo['date_time'] ?></small>



                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>