	<form method="post" class="form-inline navbar-form navbar-right" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	   <div class="form-group">
	      <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" required>
	   </div>
	   <div class="form-group">
	      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
	   </div>
	   <div class="form-group">
	   <button type="submit" class="btn btn-primary">Login</button>
	   <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?register=true" class="btn btn-primary" role="button">Register</a>
	   </div>
	</form>
	