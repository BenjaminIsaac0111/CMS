<?php 

//can break into a function belonging to the user class, have a flag for error in user.
//If the flag is set then that prevents create from happeing and the returns a error code???

$errorMessage;
$isValid;
//error needs to be placed before so that if the $errorMessage isset then we can print it out

if (isset($_POST['createUser'])) {
	$user = new user();
	$user->username = $_POST['regUsername'];
	$user->firstname = $_POST['regFirstname'];
	$user->lastname = $_POST['regLastname'];
	$user->ageRange = $_POST['regAgeRange'];
	$user->email = $_POST['regEmail'];
	$user->password = $_POST['regPassword'];
	$user->termsAndConditionsCheck = $_POST['termsAndConditionsCheck'];

	// var_dump($user->validateRegstrationForm($_POST['confirmEmail'],$_POST['confirmPassword']));
	// var_dump($user->generateRegstrationError($_POST['confirmEmail'],$_POST['confirmPassword']));

	if(!$user->validateRegstrationForm($_POST['confirmEmail'],$_POST['confirmPassword'])){
		$errorMessage = $user->generateRegstrationError($_POST['confirmEmail'],$_POST['confirmPassword']);
	}else{
		$isValid = true;
		$user->create();
	}
}

require_once('includes_MarkUP/HTMLregForm.php');


?>