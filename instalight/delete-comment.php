<?php

require_once 'function.php';

$userid = $_SESSION['user']['id'];
if(isset($_GET['delete-comment'])){
    $id = $_GET['delete-comment'];

    deleteColumnFromTable($pdo, 'comments', $id);
    
    header("Location: userposts.php?user=$userid");
}