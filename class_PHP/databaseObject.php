<?php 
require_once('db/database.php');
class DatabaseObject
{
	
	public static function findById($id){
    $result_array = static::build("SELECT * FROM ".static::$table_name." WHERE id='$id' LIMIT 1");
	return !empty($result_array) ? array_shift($result_array) : false;
  	}


	protected static function build($sql){
		//pull in database class object
		global $database;
		$result = $database->query($sql);
		
		$objectArray = array();
		
		while ($row = mysqli_fetch_assoc($result)) {
			$objectArray[] = static::buildObject($row);
		}			
		
		return $objectArray;
	}
	
	private static function buildObject($row){
		$object = new static;

		foreach($row as $attribute=>$value){
		  if($object->hasAttribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}

	private function hasAttribute($attribute){
		//find out what attributes are present to the object.
 
		$object_vars = get_object_vars($this);
		return array_key_exists($attribute, $object_vars);
	}
	
	// protected function attributes() { 
	// 	// return an array of attribute names and their values
 	//  	$attributes = array();
	//   	foreach(static::$db_fields as $field) {
	//     if(property_exists($this, $field)) {
	//       $attributes[$field] = $this->$field;
	//     }
	//   }
	//   return $attributes;
	// }
	
	protected function attributes(){ 
		return get_object_vars($this);
	}
	
	protected function sanitized_attributes(){
	  global $database;
	  $clean_attributes = array();
	  	  // sanitize the values before submitting
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->cleanString($value);
	  }
	  return $clean_attributes;
	}
	
	public function create(){
		global $database;

		$attributes = static::sanitized_attributes();
		$sql = "INSERT INTO ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  if($database->query($sql)) {
	    $this->id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public static function read($InfoToFind, $inWhichColumn){
	    global $database;
	    $InfoToFind = $database->cleanString($InfoToFind);
	    $inWhichColumn = $database->cleanString($inWhichColumn);


	    $sql  = "SELECT * FROM ";
	    $sql .= static::$table_name;
	    $sql .= " WHERE ".$inWhichColumn." = '$InfoToFind'";
	    $sql .= " LIMIT 1";
	    $result_array = $database->query($sql);
		if(!mysqli_num_rows($result_array) > 0) {
		    return false;
		}else{
			return true;
		}
	}


	public function update() {
	  global $database;

		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->cleanString($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;

	  $sql = "DELETE FROM ".static::$table_name;
	  $sql .= " WHERE id=". $database->cleanString($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	
	}

}

			

?>