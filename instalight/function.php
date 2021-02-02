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
            ON users.id = posts.user_id
            WHERE posts.user_id = :user_id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':user_id', $userID);
    $statement->execute();

    return $statement;
}