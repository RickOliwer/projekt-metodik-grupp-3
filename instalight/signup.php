<?php 
    require_once 'header.php';
    require_once 'function.php';
    if(isset($_POST['submit-signup'])){
    
        $saveData = [
            'username' => $username = $_POST['username'],
            'email' => $email = $_POST['email'],
            'password' => $password = password_hash($_POST['pass'], PASSWORD_BCRYPT)
        ];
    
        saveToDB($pdo, 'users', $saveData);

        header('Location: index.html');
    }


?>

<body>
    <div class="bg-signup">
    <div class="container1">
    <h2 class="text-center">Register</h2>
<form method="POST" action="signup.php">
  
    <div class="row">
    <div class="col">
    <div class="form-group">
      <input name="username" type="username" class="form-control" placeholder="Username">
    </div>
    </div>

    <div class="col">
    <div class="form-group">
      <input name="email" type="email" class="form-control" placeholder="Email">
    </div>
    </div>
    <div class="col">
    <div class="form-group">
      <input name="pass" type="password" class="form-control" placeholder="Password">
    </div>
  </div>
  </div>
  <div class="row">
  <div class="col">
    <div class="form-group">
      <button name ="submit-signup" class="btn btn-succes" type="submit">SUMBIT</button>
    </div>
    </div>
  </div>
</div>
</form>
</div>

<?php require_once 'footer.php'; ?>