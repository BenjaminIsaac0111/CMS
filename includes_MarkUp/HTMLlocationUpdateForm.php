<?php
	require_once('class_PHP/location.php'); 
	$location = location::findById($_GET['update']);
?>
<div class="well well-lg">
	<form method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<fieldset>
			<legend>Update Location <?php echo $location->name; ?></legend>
				<div class="form-group">
				<label for="LocName" class="col-lg-2 control-label">Location Name:</label>
					<div class="col-lg-10">
						<input 
						type="text" 
						class="form-control" 
						id="LocName" 
						name="LocName" 
						aria-describedby="LocName" 
						placeholder="Name" 
						value="<?php echo $location->name; ?>" 
						required>
					</div>
				</div>
				<label for="LocName" class="col-lg-2 control-label">Descrpition:</label>
					<div class="col-lg-10">
						<textarea 
						class="form-control" 
						id="LocDescription" 
						name="LocDescription" 
						aria-describedby="LocDescription" 
						placeholder="Description"
						rows="5" 
						value=""><?php echo $location->description; ?></textarea>
					</div>
				</div>
				</div>
					      <div class="col-lg-10 col-lg-offset-2">
					        <button 
					        type="submit" 
					        name="updateLocation" 
					        value="<?php echo $location->id; ?>" 
					        class="btn btn-primary">
					        Update
					        </button>
					       	<a 
					       	href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
					       	class="btn btn-danger" 
					       	role="button">
					       	Cancel</a>
					      </div>
	
			</fieldset>
	</form>
</div>


