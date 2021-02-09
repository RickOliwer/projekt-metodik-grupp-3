<?php 

ini_set('display_errors', 1); ini_set('display
_startup_errors', 1); error_reporting(E_ALL);
require_once 'header.php';
    require_once 'function.php';
    
    print_r($_SESSION['user']);
    
?>



<body>
    <div class="bg-profile">
    <div class="container1">
    <h2 class="text-center">Update Your Profile!</h2>
    
    
    
    <?php if(isset($_GET['user'])):?>
    
<form method="POST">
<div class="row">
    <div class="col">
      <input name="username" type="text" class="form-control" placeholder="username">
    </div>
    <div class="col">
      <input name="password" type="text" class="form-control" placeholder="password">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <input name="email" type="text" class="form-control" placeholder="Email">
    </div>
    </div>
  <div class="row">
    <div class="col">
    <button name="submit-update" class="btn btn-succes" type="submit">UPDATE</button>
    </div>
    </div>    
</form>
</div>
</div>
<?php endif ;?> 


<?php
require_once 'footer.php';
?>

