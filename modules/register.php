<?php 
$errorMessage;
$isValid;

if (isset($_POST['createUser'])) {
	$user = new user();
	$user->username = $_POST['regUsername'];
	$user->firstname = $_POST['regFirstname'];
	$user->lastname = $_POST['regLastname'];
	$user->ageRange = $_POST['regAgeRange'];
	$user->email = $_POST['regEmail'];
	$user->password = $_POST['regPassword'];
	$user->termsAndConditionsCheck = $_POST['termsAndConditionsCheck'];

	if(!$user->validateRegstrationForm($_POST['confirmEmail'],$_POST['confirmPassword'])){
		$errorMessage = $user->generateRegstrationError($_POST['confirmEmail'],$_POST['confirmPassword']);
	}else{
		$isValid = true;
		$user->hashPassword();
		$user->create();
		$session->login($user);
		header('Location: index.php');

	}
}

require_once('includes_MarkUP/HTMLregForm.php');


?>