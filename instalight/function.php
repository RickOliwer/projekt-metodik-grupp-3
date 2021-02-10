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
    $sql = 'SELECT users.email, users.username, users.id, posts.id, posts.img, posts.title, posts.bio, posts.posted_by, users.date
            FROM users
            LEFT JOIN posts
            ON users.id = posts.userid
            WHERE posts.userid = :userid';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':userid', $userID);
    $statement->execute();

    return $statement;
}

function joinPostWithComment($pdo, $post_id){
    $sql = 'SELECT comments.comment, comments.date, posts.id
            FROM posts
            LEFT JOIN comments
            ON posts.id = comments.post_id
            WHERE comments.post_id = :post_id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':post_id', $post_id);
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

function deleteColumnFromTable($pdo, $tableName, $id){
    $sql = sprintf('delete from %s where id=:id ',
            $tableName,
    );
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>$id));
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
  