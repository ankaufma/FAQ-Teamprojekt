<?php
class ApplyUserDTO {
	private $firstname;
	private $lastname;
	private $username;
	private $email;
	private $password;
	
	public function __construct($firstname, $lastname, $username, $email, $password) {
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
	}
	
	public function setUserName($username) {
		$this->username = $username;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}
	
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}
	
	public function getUsername() {
		return $this->username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getFirstname() {
		return $this->firstname;
	}
	
	public function getLastname() {
		return $this->lastname;
	}
	
}
?>