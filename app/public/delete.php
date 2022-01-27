<?php

if(isset($_POST['id'])){
    require 'db.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $action = $db->prepare("DELETE FROM todos WHERE id=?");
        $answer = $action->execute([$id]);

        if($answer){
            echo 1;
        }else {
            echo 0;
        }
        $db = null;
        exit();
    }
}else {
    header("Location: index.php?mess=error");
}