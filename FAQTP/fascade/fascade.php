<?php
	class Fascade {
		public function applyUser($firstname, $lastname, $username, $email, $password) {
			$audto = new ApplyUserDTO($firstname, $lastname, $username, $email, $password);
			$usermanager = new Usermanager();
			$newUser = new User();
			$newUser->setFirstname($audto->getFirstname());
			$newUser->setLastname($audto->getLasttname());
			$newUser->setUsername($audto->getUsername());
			$newUser->setEmail($audto->getEmail());
			$newUser->setPassword($audto->getPassword());
			if($usermanager->validateUsername($newUser)){
				$usermanager->$createUser($newUser);
			}
		}
	}
	
	$fassi = new Fascade();
	$fassi->applyUser("Hallo", "Welt", "HiWorld", "MyName@gmx.li", "firstTest");
?>