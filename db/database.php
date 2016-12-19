
<?php
require_once("config.php");

class database{

		private $connection;

		function __construct(){
			$this->open_connection();
		}

		function destruct(){
			close_connection();
		}
//open connection
		private function open_connection(){
			$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			if(mysqli_connect_errno()) {
				die('<div class="row">
						<h1 class="col-md-12 text-center">Sorry, there seems to be an issue with our Database :(</h1>
					</div>');
			}
		}

//close connection
		private function close_connection(){
			if(isset($this->connection)) {
				mysqli_close($this->connection);
				unset($this->connection);
			}
		} 
		
//run a query
		public function query($sql){
			$result = mysqli_query($this->connection,$sql);
			//echo $sql."<br>";
			$this->confirmQuery($result);
			return $result;
		} 
		
//check if query was successful
		private function confirmQuery($result){
			if (!$result){
				die("Query has failed ");
			}
		}

		public function cleanString($string){
			$string = trim($string);
			$string = stripslashes($string);
			$string = htmlspecialchars($string);

			$stringPrepared = mysqli_real_escape_string($this->connection, $string);
			return $stringPrepared;
		}

		public function sanitizeEmail($email){
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			return $email;
		}

		public function validateEmail($email){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				return false;			
			} else {
			    return true;
			}
		}

		public function match($value1 , $value2){
		if ($value1 == $value2)
			{
				return false;			
			}else{
				return true;
			}
		}

		public function insert_id(){
// get the last id inserted over the current db connection
			return mysqli_insert_id($this->connection);
		}

		public function affected_rows(){
			return mysqli_affected_rows($this->connection);
		}
	}
$database = new database();
?>
