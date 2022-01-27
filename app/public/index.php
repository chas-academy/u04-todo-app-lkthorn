<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <title>To Do List</title>
</head>

<body>
    <?php require 'db.php'; ?>
        <div class="wrapper">
            <div class="add-section">
                <form action="create.php" method="POST">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                 
                    <label>To Do</label>
                    <input type="text" name="todo" value="Mandatory field">
                    <button type="submit" name="submit">Submit</button>

                                      
                    <?php } 
                    else { ?>
                    <input type="text" name="todo" value="Enter a reminder" />
                    <button type="submit" name="submit">Submit</button>
                    <?php } ?>
                </form> 
            </div>

            <?php 
                $todos = $db->query("SELECT * FROM todo ORDER BY id"); 
            ?>
            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) {?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                        class="delete-to-do">x</span>
                    <?php if($todo['checked']){ ?>
                    <input type="checkbox" class="check-box" data-todo-id ="<?php echo $todo['id']; ?>" checked />
                    <h2 class="checked"> <?php echo $todo['title'] ?></h2>

                    <?php } else {?>
                        <input type="checkbox"
                        data-todo-id ="<?php echo $todo['id']; ?>" class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                        <?php } ?>
                        
                </div>

            <?php } ?> 




     
      

        </div>
</body>

</html>

