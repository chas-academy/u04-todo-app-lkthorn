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
            <form action="" method="POST" >
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="title" placeholder="New task" />
                <button type="submit"> Add task </button>

                    <?php }else {?>
                        <input type="text"
                        name="title"
                        style="border-color: #ff6666"
                        placeholder="Field required"/>
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
                    <span id="<?php echo $todo['id']; ?>" class="remove-to-do">X</span>
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