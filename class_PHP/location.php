<?php 
require_once('db/database.php');
require_once('databaseObject.php');
class location extends DatabaseObject
{
	public $id;
	public $name;
	public $imgFileName;//make the file name the same as the name
	public $description;


	protected static $table_name="location";
	protected static $db_fields = array(
		'id',
		'name',
		'imgFileName',
		'description',
	);

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