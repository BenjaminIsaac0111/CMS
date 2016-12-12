<?php 
require_once('db/database.php');
require_once('databaseObject.php');
class user extends DatabaseObject
{
	// You can set the attributes that you want from the user here.
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $ageRange;
	public $email;
	public $password;//password always needed from table required
	public $termsAndConditionsCheck;
	public $adminFlag = FALSE;

	protected static $table_name="user";//for self identifying the table to build from
	protected static $db_fields = array('id','username','firstname','lastname','ageRange','email','password','termAndConditionsCheck','adminFlag');

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
		return !empty($result_array) ? array_shift($result_array) : false;
		
	}

//Must abstract these later. For now, just list the attribute in and array($db_fields).

	public static function checkExists($userInfo=''){
		global $database;
	    $userInfo = $database->cleanString($userInfo);

	    $sql  = "SELECT * FROM ";
	    $sql .= static::$table_name;
	    $sql .= " WHERE email = '$userInfo' ";
	    $sql .= " LIMIT 1";
	    $result_array = $database->query($sql);
		if(!mysqli_num_rows($result_array) > 0) {
		    return false;
		}else{
			return true;
	
		}
	}
}


			

?>