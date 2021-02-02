<?php

    include 'upload.php';


    if(isset($_POST['submit'])){
        print_r($_POST);
        $imageInput = 'file';
        $folder = './/images/';
        $imageByteSize = 5000000;

        $imageName = addImageToFolder($imageInput, $folder, $imageByteSize);

        $saveData = [
            'title' => $title = $_POST['title'],
            'textarea' => $textArea = $_POST['textarea'],
            'image' => $imageName,
            'user_id' => $userID = $_POST['user_id'],
            'posted_by' => $postedBy = $_SESSION['user']['username']
        ];
     //   saveToDB($pdo, 'posts', $saveData);

    
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div >
        <h2 >Upload Image</h2>
        <form method="POST" action="upload_image.php" enctype="multipart/form-data">
            <label for="titel">Titel:</label>
            <input type="text" name="titel" id="titel">

            <label for="desc">Description:</label>
            <input type="text" name="decs" id="desc">

            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>
        </form>

    </div>
</body>
</html>