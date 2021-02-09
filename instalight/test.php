function EditProfile($pdo, $tableName, $newData){
      $sql = "UPDATE $tableName SET username = :username, password = :password, email = :email WHERE id = :id";
    
      $statement= $pdo->prepare($sql);
      $statement->bindParam(':username', $newData["username"]);
      $statement->bindParam(':password', $newData["password"]);
      $statement->bindParam(':email', $newData["email"]);
      $statement->bindParam(':id', $newData["id"]);
      $statement->execute();

   }if(isset($_POST["submit-update"])){
    

    $saveData = [
        'username' => $username = $_POST['username'],
        'password' => $password = password_hash($_POST['password'], PASSWORD_BCRYPT),
        'email' => $email = $_POST['email'],
        'user_id' => $id = $_SESSION['user']['id'],
    ];
    
    EditProfile($pdo, 'users', $saveData);
}