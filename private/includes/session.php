<?php 
/**
* Session class. Keeps track of Session and what type of session.
*/
class Session {
	
	private $loggedIn  = false;
  public  $userId;
	
	function __construct() {
		session_start();
		$this->check_login();
	}
	
	private function check_login() {
    if(isset($_SESSION['id'])) {
      $this->userId = $_SESSION['id'];
      $this->adminFlag = $_SESSION['adminFlag'];
      $this->loggedIn = true;
    } else {
      unset($this->userId);
      $this->adminFlag = false;
      $this->loggedIn = false;
    }
  }

  public function login($user) {
    if($user){
      $this->userId = $_SESSION['id'] = $user->id;
      $this->adminFlag = $_SESSION['adminFlag'] = $user->adminFlag;
      $this->loggedIn = true;
    }
  }

  public function logout() {
    unset($_SESSION['id']);
    // unset($_SESSION['adminFlag'])
    unset($this->userId);
    $this->loggedIn = false;
  }

  public function isLoggedIn() {
    return $this->loggedIn;
  }

  public function isAdmin(){
    return $this->adminFlag;
  }
  
}
$session = new session();
 ?>