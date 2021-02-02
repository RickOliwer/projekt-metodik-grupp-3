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

