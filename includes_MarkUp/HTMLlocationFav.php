<section id="location">
<div class="row">

<?php 
require_once('class_PHP/location.php');
$location = location::findAll();
foreach($location as $location): ?> 
   <div class="col-md-3">
      <div class="panel panel-info">
         <div class="panel-heading">
            <h3 class="panel-title"><?php echo $location->name;?></h3>
         </div>
         <div class="panel-body">
          <img class="img-responsive" src="img/<?php echo $location->imgFileName;?>" alt="Image of <?php echo $location->name;?>">
               <div class="list-group">
                 <a href="#" class="list-group-item">
                   <h4 class="list-group-item-heading">
                     Description
                   </h4>
                   <p class="list-group-item-text">
                      <?php echo $location->description;?>
                   </p>
                 </a>
                 <?php if($session->isLoggedIn()):?>
                  <a class="btn btn-info list-group-item" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?add=<?php echo $location->id; ?>">Add to Favorites <span class="glyphicon glyphicon-star-empty"></span></a>
                 <?php endif; ?>
               </div>
         </div>
      </div>
   </div>
 <?php endforeach; ?>
</div>
</section>
  
