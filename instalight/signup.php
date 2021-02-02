<?php 
    //require_once 'header.php';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="bg-signup">
    <div class="container1">
    <h2 class="text-center">Register</h2>
<form method="POST" action="signup.php">
  
    <div class="row">
    <div class="col">
    <div class="form-group">
      <input name="username" type="username" class="form-control" placeholder="Username" require>
    </div>
    </div>

    <div class="col">
    <div class="form-group">
      <input name="email" type="email" class="form-control" placeholder="Email" require>
    </div>
    </div>
    <div class="col">
    <div class="form-group">
      <input name="pass" type="password" class="form-control" placeholder="Password"require>
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