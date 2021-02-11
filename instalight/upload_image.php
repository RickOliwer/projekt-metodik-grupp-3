<?php
    //include 'upload.php';
    require_once 'header.php';
    require_once 'function.php';
    require_once 'getuserpost.php';
    
?>

<section class="home-none"></section>
<main class="main-container-post">
<?php if(isset($_GET['user'])) : ?>
<div class="formcontainer">
<div class="py-5">
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
</div>
<?php endif ; ?>
</main>

<?php require_once 'footer.php'; ?>
