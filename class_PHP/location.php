<?php 
require_once('db/database.php');
require_once('databaseObject.php');
class location extends DatabaseObject
{
	public $id;
	public $name;
	public $imgFileName;
	public $description;


	protected static $table_name="location";

	public static function deleteLocation($id){
		$location = static::findById($id);
		if ($location) {
			$location->delete();
		}else{
			unset($_GET['remove']);
		}
	}

}
?>