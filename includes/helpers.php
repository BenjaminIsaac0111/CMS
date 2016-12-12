<?php 
	/**
	* This class contains a variety of global functions.
	*/
	class helper
	{
		public static function validateText($data)
		{
			$data = self::processText($data);
			return $data;
		}

		private function processText($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

	}

 ?>