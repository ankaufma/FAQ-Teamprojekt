<?php

class User {
	
		private $userId;
		private $username;
		private $password;
		private $email;
		private $firstname;
		private $lastname;
		private $userrole;
		
		public function __construct($username, $password, $email, $firstname, $lastname) {
			$this->username = $username;
			$this->password = $password; 
			$this->email = $email;
			$this->firstname = $firstname;
			$this->lastname = $lastname;
		}
		
		public function setUserId($userId) {
			$this->userId = $userId;
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
		
		public function setUserrole($userrole) {
			$this->userrole = $userrole;
		}
		
		public function getUserId() {
			return $this->userId;
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
		
		public function getUserrole() {
			return $this->userrole;
		}
	}
?>