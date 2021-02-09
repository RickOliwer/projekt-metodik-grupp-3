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
<main class="main-container-post">
<?php if(isset($_GET['user'])) : ?>
<div class="formcontainer">
        <h2>Upload Image</h2>
        <form method="POST" enctype="multipart/form-data">
        <div class="col">
            <input placeholder="Titel" type="text" name="title" id="title" class="inputpadding">
           
            <input placeholder="Description"type="text" name="bio" id="desc" class="inputpadding">
            

</div>
<br>
<div class="col">
            <input type="file" name="file" id="file">
            <label for="file" class="fileinput ">Load Image</label>
</div>
            <div class="col">
            <input type="hidden" value="<?php echo $_GET['user'] ?>" name="user_id"/>
            
            <button type="submit" class=" btn-succes btnbg" name="submit">UPLOAD</button>
</div>
        </form>

    </div>
<?php endif ; ?>
</main>

<?php require_once 'footer.php'; ?>
