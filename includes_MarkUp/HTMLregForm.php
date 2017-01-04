<div class="well well-lg">
	<form method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?register=true">
		<fieldset>
			<legend>Register</legend>
				<div class="form-group">
						<label for="regUsername" class="col-lg-2 control-label">Username:*</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="regUsername" name="regUsername" aria-describedby="regUsername" placeholder="Username" value="<?php echo isset($_POST['regUsername']) ? $_POST['regUsername'] : '' ?>" required>
					</div>
				</div>
				<div class="form-group">
						<label for="regFirstname" class="col-lg-2 control-label">Firstname:*</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="regFirstname" name="regFirstname" aria-describedby="regFirstname" placeholder="Firstname" value="<?php echo isset($_POST['regFirstname']) ? $_POST['regFirstname'] : '' ?>" required>
					</div>
				</div>
				<div class="form-group">
						<label for="regLastname" class="col-lg-2 control-label">Lastname:*</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="regLastname" name="regLastname" aria-describedby="regLastname" placeholder="Lastname" value="<?php echo isset($_POST['regLastname']) ? $_POST['regLastname'] : '' ?>" required>
					</div>
				</div>
				<div class="form-group">
						<label for="regAgeRange" class="col-lg-2 control-label">Age:*</label>
					<div class="col-lg-10">
					  <select class="form-control" id="regAgeRange" name="regAgeRange">
					    <option>15-24</option>
					    <option>25-34</option>
					    <option>35-44</option>
					    <option>45-54</option>
						<option>55-64</option>
						<option>65+</option>
					  </select>
					</div>
				</div>
				<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Email:*</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="regEmail" name="regEmail" aria-describedby="regEmail" placeholder="Email" value="<?php echo isset($_POST['regEmail']) ? $_POST['regEmail'] : '' ?>" required>
						<input type="text" class="form-control" id="confirmEmail" name="confirmEmail" aria-describedby="confirmEmail" placeholder="Confirm Email" value="<?php echo isset($_POST['confirmEmail']) ? $_POST['confirmEmail'] : '' ?>" required>
					</div>

				</div>
				<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Password:*</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Password" value="<?php echo isset($_POST['regPassword']) ? $_POST['regPassword'] : '' ?>" required>
						<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" aria-describedby="confirmPassword"  placeholder="Confirm Password" value="<?php echo isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '' ?>" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10">
						<div class="checkbox">
						  <label>
						  <input type="checkbox" value="1" id="termsAndConditionsCheck" name="termsAndConditionsCheck" required>Agree to 
						  	<a href="">Terms And Conditions</a>
						  </label>
						</div>
					</div>

				</div>

					<div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="submit" name="createUser" value="true" class="btn btn-primary">Submit</button>
					       	<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="btn btn-danger" role="button">Cancel</a>

					      </div>
					</div>
				<?php if(isset($errorMessage)): ?>
					<div class="col-lg-12 alert alert-dismissible alert-danger">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><?php echo $errorMessage;  ?></strong>
					</div>
				<?php endif;?>		
			</fieldset>
	</form>
</div>



