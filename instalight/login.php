<?php

session_start();

require_once 'function.php';


$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$statement->bindParam('email', $_POST['email']);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit_login']) && password_verify($_POST['password'], $user['password'])){
    session_regenerate_id();
    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $user;
    header('Location: home.php');
} else {
    header('Location: index.html');
}

