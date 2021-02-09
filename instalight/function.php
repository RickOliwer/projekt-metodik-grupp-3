<?php

require_once 'phpmysqlconnect.php';

$pdo = initDatabase($database);

function saveToDB($pdo, $tableName, $newData){
    $sql = sprintf(
        'insert into %s (%s) values (%s)',
        $tableName,
        implode(', ', array_keys($newData)),
        ':' . implode(', :', array_keys($newData))    
    );

    $stmt = $pdo->prepare($sql);
    $stmt->execute($newData);
    
}

function joinUserWithPost($pdo, $userID){
    $sql = 'SELECT users.email, users.username, posts.id, posts.img, posts.title, posts.bio
            FROM users
            LEFT JOIN posts
            ON users.id = posts.userid
            WHERE posts.userid = :userid';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':userid', $userID);
    $statement->execute();

    return $statement;
}

function fetchColoumnFromTable($pdo, $tableName){
$sql = sprintf('select * from %s', 
    $tableName
);
$statement= $pdo->prepare($sql);
$statement->execute();
return $statement->fetchAll(PDO::FETCH_ASSOC);

}

function EditProfile($pdo, $tableName, $newData){
    $sql = "UPDATE $tableName SET username = :username, password = :password, email = :email WHERE id = :id";
  
    $statement= $pdo->prepare($sql);
    $statement->bindParam(':username', $newData["username"]);
    $statement->bindParam(':password', $newData["password"]);
    $statement->bindParam(':email', $newData["email"]);
    $statement->bindParam(':id', $newData["id"]);
    $statement->execute();

 }if(isset($_POST["submit-update"])){
  

  $saveData = [
      'username' => $username = $_POST['username'],
      'password' => $password = password_hash($_POST['password'], PASSWORD_BCRYPT),
      'email' => $email = $_POST['email'],
      'id' => $id = $_SESSION['user']['id'],
  ];
  
  EditProfile($pdo, 'users', $saveData);
}
  