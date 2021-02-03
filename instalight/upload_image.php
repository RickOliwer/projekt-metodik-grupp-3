<?php


    include 'upload.php';
    require_once 'function.php';
    require_once 'header.php';
    
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
            'userid' => $userID = $_POST['user_id']
            //'posted_by' => $postedBy = $_SESSION['user']['username']
        ];

    
        saveToDB($pdo, 'posts', $saveData);


    
    }

    $userID = $_GET['user'];
    $postByUserStatement = joinUserWithPost($pdo, $userID);
    $postByUser = $postByUserStatement->fetchAll(PDO::FETCH_CLASS);
}



?>

<?php if(isset($_GET['user'])) : ?>
<div>
        <h2>Upload Image</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="titel">Titel:</label>
            <input type="text" name="title" id="title">

            <label for="desc">Description:</label>
            <input type="text" name="bio" id="desc">

            <input type="file" name="file">
            <input type="hidden" value="<?php echo $_GET['user'] ?>" name="user_id" />
            <button type="submit" name="submit">UPLOAD</button>
        </form>

    </div>
<?php endif ; ?>
</body>
</html>