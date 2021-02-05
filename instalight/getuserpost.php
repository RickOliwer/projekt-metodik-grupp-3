<?php
     require_once 'upload.php';
     require_once 'function.php';
     
if(isset($_GET['user'])){

    if(isset($_POST['submit'])){
        print_r($_POST);
        $imageInput = 'file';
        $folder = 'images/';
        $imageByteSize = 5000000;
        
        $imageName = addImageToFolder($imageInput, $folder, $imageByteSize);

        $saveData = [
            'title' => $title = $_POST['title'],
            'bio' => $textArea = $_POST['bio'],
            'img' => $imageName,
            'userid' => $userID = $_POST['user_id'],
            'posted_by' => $postedBy = $_SESSION['user']['username']
            
        ];

    
        saveToDB($pdo, 'posts', $saveData);


    
    }

    $userID = $_GET['user'];
    $postByUserStatement = joinUserWithPost($pdo, $userID);
    $postByUser = $postByUserStatement->fetchAll(PDO::FETCH_CLASS);
}



?>