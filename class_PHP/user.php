<?php 
require_once('db/database.php');
require_once('databaseObject.php');
class user extends DatabaseObject
{
	protected static $table_name="user";
	
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $ageRange;
	public $email;
	public $password;
	public $termsAndConditionsCheck;
	
	public $adminFlag = false;
	
	
	public static function authenticate($email="", $password="") {
	    global $database;
	    $email = $database->cleanString($email);
	    $password = $database->cleanString($password);

	    $sql  = "SELECT * FROM ";
	    $sql .= static::$table_name;
	    $sql .= " WHERE email = '$email' ";
	    $sql .= " LIMIT 1";
	    $result_array = static::build($sql);
	    //var_dump($result_array);
	    $result_array = array_shift($result_array);

		if(!empty($result_array)){
		    if (static::verifyHash($password, $result_array->password)){ 
		    	return $result_array;
		    }else{
		    	return false;
		    }
		}else{
			return false;
		}
	}

	public static function verifyHash($inputPassword, $hashedDatabasePassword){
		return password_verify($inputPassword, $hashedDatabasePassword);
	}

	public function hashPassword(){
		return $this->password = password_hash($this->password, PASSWORD_DEFAULT);
	}

	public function generateRegstrationError($confirmEmail,$confirmPassword){

		$errorMessage = '';

		if($this->checkIfAlpha()){
			$errorMessage .= "Username contains numbers!<br>"; 
		}
		if($this->validateUserEmail()){
			$errorMessage .= "Invalid Email!<br>"; 
		}
		if($this->checkUserExists()){
			$errorMessage .= "User: ".$this->email." exists!<br>"; 
		}
		if($this->matchUserEmail($confirmEmail)){
			$errorMessage .= "Emails do not match!<br>"; 
		}
		if($this->checkPasswordFormat()){
			$errorMessage .= "Password needs at least one capital letter, a number and a symbol!<br>"; 
		}
		if($this->matchUserPassword($confirmPassword)){
			$errorMessage .= "Passwords do not match!<br>"; 
		}

		return $errorMessage;
	}		

	public function validateRegstrationForm($confirmEmail,$confirmPassword){

		if($this->checkIfAlpha()){
			return false;  
		}
		if($this->validateUserEmail()){
			return false; 
		}
		if($this->checkUserExists()){
			return false;  
		}
		if($this->matchUserEmail($confirmEmail)){
			return false; 
		}
		if($this->checkPasswordFormat()){
			return false;  
		}
		if($this->matchUserPassword($confirmPassword)){
			return false;  
		}
		return true;
	}

	public function checkIfAlpha(){
		global $database;
		return !ctype_alpha($this->username);
	}
	
	public function checkPasswordFormat(){
		global $database;
		return !preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[\W]).{1,50}$/', $this->password);
	}

	public function validateUserEmail(){
		global $database;
		$email = $database->sanitizeEmail($this->email);
		return $database->validateEmail($email);
	}

	public function checkUserExists(){
		return user::read($this->email, 'email');
	} 

	public function matchUserEmail($emailToMatch){
		global $database;
		return $database->match($this->email,$emailToMatch);
	}

	public function matchUserPassword($passwordToMatch){
		global $database;
		return $database->match($this->password,$passwordToMatch);
	}
	

	public static function toggleUserAdministrator($id){
		global $database;
		$id = $database->cleanString($id);
		
		$userTomakeAdmin = static::findById($id);
		//var_dump($userTomakeAdmin);
		if(!$userTomakeAdmin->adminFlag) {
			$userTomakeAdmin->adminFlag = true;
		}elseif($userTomakeAdmin->adminFlag) {
			$userTomakeAdmin->adminFlag = false;
		}
		$userTomakeAdmin->update();
	}
	




}
?>