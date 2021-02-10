<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagun</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  ></script>
		
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="css/comment.css">
    <script src="js/functions.js"></script>
    
    
    
</head>

<header>
<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="home.php">Instagun!</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="upload_image.php?user=<?php echo $_SESSION['user']['id'] ?>">Add post</a></li>
                    <li><a href="users.php">All Users</a></li>
                    <li><a href="profile.php?user=<?php echo $_SESSION['user']['id'] ?>">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                   
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>

    
    
    </header>
    <body>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="header.js"></script>
    <!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
    