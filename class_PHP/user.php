<?php 
require_once('db/database.php');
require_once('databaseObject.php');
class user extends DatabaseObject
{
	protected static $table_name="user";//for self identifying the table to build from
	// protected static $db_fields = array(
	// 	'id',
	// 	'username',
	// 	'firstname',
	// 	'lastname',
	// 	'ageRange',
	// 	'email',
	// 	'password',
	// 	'termAndConditionsCheck',
	// 	'adminFlag'
	// );

	
	
	//You can set the attributes that you want from the user here.
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $ageRange;
	public $email;
	public $password;//password always needed from table required
	public $termsAndConditionsCheck;
	
	public $adminFlag = false;//always false unless specified by an admin.
	
	
	



	public static function authenticate($email="", $password="") {
	    global $database;
	    $email = $database->cleanString($email);
	    $password = $database->cleanString($password);

	    $sql  = "SELECT * FROM ";
	    $sql .= static::$table_name;
	    $sql .= " WHERE email = '$email' ";
	    $sql .= " AND password = '$password' ";
	    $sql .= " LIMIT 1";
	    $result_array = static::build($sql);
	    var_dump($result_array);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public function generateRegstrationError($confirmEmail,$confirmPassword){

		$errorMessage = '';

		 if($this->validateUserEmail()){
		 	$errorMessage .= "Invalid Email!<br>"; 
		 }
		 if($this->checkUserExists()){
		 	$errorMessage .= "User: ".$this->email." exists!<br>"; 
		 }
		 if($this->matchUserEmail($confirmEmail)){
		 	$errorMessage .= "Emails do not match!<br>"; 
		 }
		 if($this->matchUserPassword($confirmPassword)){
		 	$errorMessage .= "Passwords do not match!<br>"; 
		 }
		 return $errorMessage;
	}		

	public function validateRegstrationForm($confirmEmail,$confirmPassword){

		if($this->validateUserEmail()){
			return false; 
		}
		if($this->checkUserExists()){
			return false;  
		}
		if($this->matchUserEmail($confirmEmail)){
			return false; 
		}
		if($this->matchUserPassword($confirmPassword)){
			return false;  
		}
		return true;
	}

	public function validateUserEmail(){
		global $database;
		$email = $database->sanitizeEmail($this->email);
		
		if(!$database->validateEmail($email)){
			return false;
		}else{
			return true;
		}
	}

	public function checkUserExists(){
		if(!user::read($this->email, 'email')){
			return false;
		}else{
			return true;
		}
	} 

	public function matchUserEmail($emailToMatch){
		global $database;
		if(!$database->match($this->email,$emailToMatch)){
			return false;
		}else{
			return true;
		}
	}

	public function matchUserPassword($passwordToMatch){
		global $database;
		if(!$database->match($this->password,$passwordToMatch)){
			return false;
		}else{
			return true;
		}
	}
	




}
?>