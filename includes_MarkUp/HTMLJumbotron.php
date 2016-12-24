<?php if (!$session->isLoggedIn()):?>
		<div class="jumbotron">
			<h1 class="text-center">A Guide to the Solar System</h1>
			<?php 
			   if (isset($_GET['register'])){
			      if($_GET['register']==TRUE) {
			         require_once('modules/register.php');
			      }
			   }?>
		</div>
<?php endif; ?>