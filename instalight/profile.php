<?php 
    require_once 'function.php';
    require_once 'header.php';
    // $postresult = fetchColoumnFromTable($pdo, 'posts');
    require_once 'getuserpost.php';
    $userID = $_GET['user'];
    $userInfo = addProfileToViewProfile($pdo, $userID);
?>


<?php if(isset($_GET['user'])):?>


<div class="py-5  profile-bg">


    <div class="col-md-5 mx-auto">
        
    <?php foreach($userInfo as $row) : ?>
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden container-profile">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img src="profileimg/<?php echo $row['profile_img']?>" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="editprofile.php?user=<?php echo $_SESSION['user']['id']?>" class="btn2">Edit profile</a></div>
                    
                        
                </div>
            </div>
            
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Photos</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Followers</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p class="font-italic mb-0">Web Developer</p>
                    <p class="font-italic mb-0">Lives in New York</p>
                    <p class="font-italic mb-0">Photographer</p>
                </div>
            </div>
            
            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5></form><a href="userposts.php?user=<?php echo $_SESSION['user']['id'] ?>" class="btn2">Show all</a>
                </div>
                <div class="row">
    <?php endforeach; ?>
    
                <?php foreach (array_reverse($postByUser) as $row):?>
                

                    
                    <div class="col-lg-6 pr-lg-1 mb-2"><a href="home.php#comment<?= $row->id ?>"><img class="img-fluid" src="images/<?= $row->img?>" alt="Image"></a></div>
                    
             
			      

                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

</div>



<?php endif ;?>        

<?php
require_once 'footer.php';
?>