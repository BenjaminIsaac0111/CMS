<?php 
/**
* Session class. Keeps track of Session.
*/
class Session {
	
	private $loggedIn=false;
	public $userId;
	
	function __construct() {
		session_start();
		$this->check_login();
	}
	
  public function isLoggedIn() {
    return $this->loggedIn;
  }

	public function login($user) {
    if($user){
      $this->userId = $_SESSION['id'] = $user->id;
      $this->loggedIn = true;
    }
  }
  
  public function logout() {
    unset($_SESSION['id']);
    unset($this->userId);
    $this->loggedIn = false;
  }

	private function check_login() {
    if(isset($_SESSION['id'])) {
      $this->userId = $_SESSION['id'];
      $this->loggedIn = true;
    } else {
      unset($this->userId);
      $this->loggedIn = false;
    }
  }
  
}
$session = new session();
 ?>