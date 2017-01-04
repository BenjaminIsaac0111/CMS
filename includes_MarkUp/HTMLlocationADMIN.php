<section id="location">
<div class="row">
<h1 class="text-center">Location Control</h1>
<?php 
require_once('class_PHP/location.php');
if ($session->isAdmin()) {
  if (isset($_GET['remove'])) {
    location::deleteLocation($_GET['remove']);
  }
  if (isset($_POST['updateLocation'])) {
  $location = location::findById($_POST['updateLocation']);
  $location->name = $_POST['LocName'];
  $location->description = $_POST['LocDescription'];
  $location->update();
}
}
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
              <a class="btn btn-warning list-group-item" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?update=<?php echo $location->id; ?>">Update<span class="glyphicon glyphicon-pencil"></span>
              </a>
              <a class="btn btn-danger list-group-item" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?remove=<?php echo $location->id; ?>">Remove<span class="glyphicon glyphicon-remove"></span></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
<?php endforeach; ?>
  </div>
</section>


