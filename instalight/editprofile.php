<?php 
    require_once 'function.php';
    require_once 'header.php';
    
    
?>

<div class="bg-signup">
    <div class="container1">
    


    <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            
            <div class="col">
            <input placeholder="Email"type="text" name="email" id="email" class="inputpadding">
            </div>
          </div>
          <div class="form-group">
            
            <div class="col">
            <input placeholder="Username"type="text" name="username" id="username" class="inputpadding">
            </div>
          </div>

          <div class="form-group">
            
            <div class="col">
            <input placeholder="About"type="text" name="about" id="about" class="inputpadding">
            </div>
          </div>
          <div class="form-group">
            
            <div class="col">
            <input placeholder="Password"type="text" name="password" id="password" class="inputpadding"> 
            </div>
          </div>
          <div class="form-group">
      <button name ="submit-signup" class="btn btn-succes" type="submit">SUMBIT</button>

    </div>
          
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>


<?php
require_once 'footer.php';
?>