<?php



if(isset($_POST['submit-com'])){

$newData = [
    'comment' => $comment = $_POST['comment'],
    'user_id' => $user_id = $_SESSION['user']['id'],
    'post_id' => $post_id = $_POST['post_id']

];



saveToDB($pdo, 'comments', $newData);

}

$post_id;
$postByCommentStatement = joinPostWithComment($pdo, $post_id);
$postByComment = $postByCommentStatement->fetchAll(PDO::FETCH_CLASS);

