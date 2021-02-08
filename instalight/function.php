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

function joinPostWithComment($pdo, $post_id){
    $sql = 'SELECT comments.comment, posts.id
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