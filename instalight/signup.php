<?php require_once 'header.php';
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
      <button name ="submit" class="btn btn-succes" type="submit">SUMBIT</button>
    </div>
    </div>
  </div>
</div>
</form>
</div>

<?php require_once 'footer.php'; ?>