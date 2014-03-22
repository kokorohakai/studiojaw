<?php
class User{
	private function checkRequest(){
		if (isset($_REQUEST["logout"])){
			$this->logout();
		}
		if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])){
			$this->login( stripslashes($_REQUEST["username"]), stripslashes($_REQUEST["password"]) );
		}
	}

	private function login( $username, $password ){
		global $db;
		$userData = $db->query('SELECT * FROM "users" WHERE "username"'." = '".$username."'");

		$this->logout();
		if(isset($userData[0])){
			if (isset($userData[0]['password'])){
				$password = crypt($password,"$2a$14");
				if ( $password == $userData[0]['password'] ){
					if (isset($userData[0]['permission'])){
						$_SESSION['permission'] = $userData[0]['permission'];
					}
					$_SESSION['user']=$username;
				} else {
					$this->errors[] = "Incorrect Password.";
				}
			} else {
				$this->errors[] = "User disabled.";
			}
		} else {
			$this->errors[] = "No such user.";
		}
	}

	private function logout(){
		$_SESSION['user']="";
		$_SESSION['permission']="";
	}

	public $errors = array();

	public function __construct(){
		if (!isset($_SESSION['user'])){
			$this->logout();
		}
		$this->checkRequest();
	}

	public function isAdmin(){
		if ($_SESSION['permission'] == "admin") {
			return true;
		} else {
			return false;
		}
	}

	public function loggedIn(){
		if ($_SESSION['user']!=""){
			return true;
		} else {
			return false;
		}
	}
}