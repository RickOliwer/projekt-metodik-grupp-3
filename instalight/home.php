<?php
require_once 'header.php';
require_once 'function.php';
$postresult = fetchColoumnFromTable($pdo, 'posts');

?>
<main class="main-container">
<?php foreach (array_reverse ($postresult) as $row):?>

	
      <section class="hero">
         <div class="container">
          <div class="row">	
		  
		   <div class="col-lg-6 offset-lg-3">
			
			<div class="cardbox shadow-lg bg-white">
			 
			 <div class="cardbox-heading">
			  <!-- START dropdown-->
			  <div class="dropdown float-right">
			   <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
				<em class="fa fa-ellipsis-h"></em>
			   </button>
			   <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
				<a class="dropdown-item" href="#">Hide post</a>
				<a class="dropdown-item" href="#">Stop following</a>
				<a class="dropdown-item" href="#">Report</a>
			   </div>
			  </div><!--/ dropdown -->
			  <div class="media m-0">
			   <div class="d-flex mr-3">
				<a href=""><img class="img-fluid rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/4.jpg" alt="User"></a>
			   </div>
			   <div class="media-body">
			    <p class="m-0"><?= $row ['posted_by']?></p>
				<small class="title-txt"><span><i class="icon ion-md-pin"></i><?= $row ['title']?></span></small>
				<small><span><i class="icon ion-md-time"></i> <?= $row ['date']?></span></small>
			   </div>
			  </div><!--/ media -->
			 </div><!--/ cardbox-heading -->
			  		   
			  
			 <div class="cardbox-item">
			  <img class="img-fluid" src="images/<?= $row ['img']?>" alt="Image">
			 </div><!--/ cardbox-item -->
			 <div class="cardbox-base">
				 <p><?= $row ['bio']?></p>
         	</div><!--/ cardbox -->
</div>
</section>

<?php endforeach;?>

</main>
        
          

<?php
require_once 'footer.php';
?>