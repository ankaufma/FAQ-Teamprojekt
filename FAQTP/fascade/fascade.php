<?php
include('ApplyUserDTO.php');
include('usermanager.php');
	class Fascade {
		public function applyUser($firstname, $lastname, $username, $email, $password) {
			$audto = new ApplyUserDTO($firstname, $lastname, $username, $email, $password);
			$usermanager = new Usermanager();
			$newUser = new User($audto->getUsername(),$audto->getPassword(),$audto->getEmail(),$audto->getFirstname(),$audto->getLastname());
			if($usermanager->validateUsername($newUser)){
				$usermanager->createUser($newUser);
			}
		}
	}
?>