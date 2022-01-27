<?php

//include_once "db.php";

if (isset($_POST['title'])) {
    require 'db.php';

    $title = $_POST['title'];

    if (empty($title)) {
        header("Location: index.php?mess=error");
    }
    
    else {
        $action = $db->prepare("INSERT INTO todos(title) VALUE(?)");
        $answer = $action->execute([$title]);
        
        if($answer){
            header("Location: index.php?mess=sucess");
        }

        else {
            header("Location: index.php");
        }
        $db = null;
        exit();
        
    }
}

else {
    header("Location: index.php?mess=error");
}