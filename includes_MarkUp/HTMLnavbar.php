<?php 
  require_once('class_PHP/user.php'); 
  require_once('includes/session.php');
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">A Spacers Guide to the Solar System</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php if($session->isAdmin()): ?>
      <?php endif; ?>
      </ul>
        <?php
            require_once('modules/login.php');
        ?>
    </div>
  </div>
</nav>