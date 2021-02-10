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
    $sql = 'SELECT users.email, users.username, users.id, posts.id, posts.img, posts.title, posts.bio, posts.posted_by, users.date
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
    $sql = 'SELECT comments.comment, comments.date, posts.id
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

function deleteColumnFromTable($pdo, $tableName, $id){
    $sql = sprintf('delete from %s where id=:id ',
            $tableName,
    );
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>$id));
}

function EditProfile($pdo, $tableName, $newData){
    $sql = "UPDATE $tableName SET username = :username, password = :password, email = :email, about = :about, profile_img = :profile_img WHERE id = :id";
  
    $statement= $pdo->prepare($sql);
    $statement->bindParam(':username', $newData["username"]);
    $statement->bindParam(':password', $newData["password"]);
    $statement->bindParam(':email', $newData["email"]);
    $statement->bindParam(':about', $newData["about"]);
    $statement->bindParam(':profile_img', $newData["profile_img"]);
    $statement->bindParam(':id', $newData["id"]);
    $statement->execute();

 }
 function addProfileToViewProfile($pdo, $userID){
    $sql = 'SELECT * FROM users WHERE users.id = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $userID);
    $statement->execute();

    return $statement;

}

function addImageToFolder($imageInput, $folder, $imageByteSize){

    print_r($imageInput);

    $imageName = $_FILES[$imageInput]['name'];
    $imageTmpName = $_FILES[$imageInput]['tmp_name'];
    $imageSize = $_FILES[$imageInput]['size'];
    $imageError = $_FILES[$imageInput]['error'];
    $imageType = $_FILES[$imageInput]['type'];  

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($imageActualExt, $allowed)){
        if($imageError === 0){
            if($imageSize < $imageByteSize){
                $imageNameNew = uniqid('', true).".".$imageActualExt;
                $imageDestination = $folder.basename($imageNameNew);
                //maybe not basename

                if (move_uploaded_file($imageTmpName, $imageDestination)) {
                    echo "Image uploaded successfully";

                } else {
                    echo "error";
                }

            } else {
                echo "Your file is to big";
            }
        } else {
            echo "there was an error uploading your file!"; 
        }
    } else {
        echo "You cannot upload files of this type";
    }
    return $imageNameNew;

}


 if(isset($_POST["submit-update"])){
   
    $profileInput = 'profile_file';
    $profilFolder = 'profileimg/';
    $profilByteSize = 5000000;
    
    $profileImage = addImageToFolder($profileInput, $profilFolder, $profilByteSize);

  $saveData = [
      'username' => $username = $_POST['username'],
      'password' => $password = password_hash($_POST['password'], PASSWORD_BCRYPT),
      'email' => $email = $_POST['email'],
      'id' => $id = $_SESSION['user']['id'],
      'about' => $about = $_POST['about'],
      'profile_img' => $profileImage
  ];
  
  EditProfile($pdo, 'users', $saveData);
}
  