<?php 
require_once 'header.php';
require_once 'function.php';

$users = fetchColoumnFromTable($pdo, 'users');



?>
<section class="home-none"></section>
<main class="main-container">

<h1>hello users</h1>

<?php foreach($users as $user): ?>
<div class="profile-card">
        <div class="blog-profile">
            <div class="blog-profile_img">
                <img src="profileimg/<?= $user['profile_img']?>" alt="">
            </div>
            <div class="blog-profile_info">
                <div class="blog-profile_data">
                    <span>Joined <?= $user['date'] ?></span>
                    <span>Email <?= $user['email']?></span>
                    
                </div>
                <h1 class="blog-profile_title"><a href="view-profile.php?user=<?php echo $user['id']?>"><?= $user['username']?></a></h1>
                <p class="blog-post_text"><?= $user['about'] ?></p>
            </div>
        </div>

        </div>
<?php endforeach; ?>

</main>

<?php require_once 'footer.php'; ?>