<?php 
try {
    $db = new PDO('mysql:host=mysql;dbname=tutorial','tutorial','secret');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo 'Connectet to database';

} catch (PDOException $e) {
    echo "Lost connection : ". $e->getMessage();

}