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
        <div class="wrapper">
        <form action="process.php" method="POST">
            <div class="group">
                <label>To Do</label>
                <input type="text" name="todo" value="Enter your next reminder">
            </div>
            <div class="group">
                <button type="submit" name="submit">Submit</button>
            </div>

        </form> 
      

    </div>
</body>

</html>

