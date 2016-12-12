<?php 
$errorMessage;

if(isset($_POST['regEmail']) && $database->validateEmail($email = $_POST['regEmail'])){
	$errorMessage = "Invalid Email: ".$email."<br>";
}

if(isset($_POST['regEmail']) && user::checkExists($email = $_POST['regEmail'])){
	$errorMessage = "Email already exists in our database: ".$email."<br>";
}

if(isset($_POST['regEmail']) && $database->match($_POST['regEmail'], $_POST['confirmEmail'])){
	$errorMessage .= "Emails do not match!<br>";
}

if(isset($_POST['regPassword']) && $database->match($_POST['regPassword'], $_POST['confirmPassword'])){
	$errorMessage .= "Passwords do not match!<br>";
}
//error need to be placed before so that if the $errorMessage isset then we can print it out
require_once('includes_MarkUP/HTMLregForm.php');

if (isset($_POST['createUser'])) {
	$user = new user();
	$user->username = $_POST['regUsername'];
	$user->firstname = $_POST['regFirstname'];
	$user->lastname = $_POST['regLastname'];
	$user->ageRange = $_POST['regAgeRange'];
	$user->email = $_POST['regEmail'];
	$user->password = $_POST['regPassword'];
	$user->termsAndConditionsCheck = $_POST['termsAndConditionsCheck'];
	
	if ($user->create()) {
		if (isset($_POST['logout'])){
			$session->login($user);
			header('Refresh:0');
		}
		
	}
}

?>