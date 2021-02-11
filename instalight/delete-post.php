<?php

require_once 'function.php';

$userid = $_SESSION['user']['id'];

if(isset($_GET['delete-post'])){
    $id = $_GET['delete-post'];

    deleteColumnFromTable($pdo, 'posts', $id);

    header("Location: userposts.php?user=$userid");
}