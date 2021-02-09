<?php

if(isset($_POST['submit-com'])){
$comment = $_POST['comment'];
$user_id = $_POST['user_id'];
$post_id = $_POST['post_id'];
$username = $_POST['username'];

$newData = [
    'comment' => $comment,
    'user_id' => $user_id,
    'post_id' => $post_id,
    'username' => $username
];



saveToDB($pdo, 'comments', $newData);

header("Location: home.php#comment$post_id");



// $post_id;
// $postByCommentStatement = joinPostWithComment($pdo, $post_id);
// $postByComment = $postByCommentStatement->fetchAll(PDO::FETCH_CLASS);

//echo json_encode(['code' => 200, 'message' => "allt gick bra!"]);
}