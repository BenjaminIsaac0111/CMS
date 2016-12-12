<?php

/* Provides a basic template for a user with validation for both string and database returns.
TO DO...
*****-Registration Form
***-Create password hasher class/helper
*-Further develop the user attributes such as Location, Names
*/
require_once('class_PHP/user.php');
require_once('includes/session.php');
if(!$session->isLoggedIn())
{
   require_once('includes_MarkUp/HTMLloginForm.php');

   if (isset($_POST['email']))
   {
      if($database->validateEmail($email = $_POST['email'])){
         $errorMessage = "Invalid Email '";
         $errorMessage .= $email;
         echo "<p class='navbar-text navbar-right'>".$errorMessage."</p>";
      }else{
         $password = $_POST['password'];
         $table = "email";
         if ($user = user::authenticate($email,$password)) {
            $session->login($user);
            header("Refresh:0");
         }elseif(!$user = user::checkExists($email,$table)){
            $errorMessage = "No user '";
            $errorMessage .= $email;
            $errorMessage .= "' found!";
            echo "<p class='navbar-text navbar-right'>".$errorMessage."</p>";
         }else{
            $errorMessage = "Incorrect Password!";
            echo "<p class='navbar-text navbar-right'>".$errorMessage."</p>";
         }
      }
   }
}else{
   //if post contains a logout flag then logout, else never mind, stay logged in
   if (isset($_POST['logout'])) {
      $session->logout();
      header("Refresh:0");
   }else{
      $user = user::findById($session->userId);
      require_once('includes_MarkUp/HTMLlogout.php');
      echo "<p class='navbar-text navbar-right'>Welcome ".$user->username."</p>";
   }
}






?>