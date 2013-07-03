<?php
include('User.php');
class Usermanager {
	
	private $users = Array(); 
	
	public function validatePassword(User $user) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM USER";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->users,new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]));
		}
		
		mysqli_free_result($result);
		mysqli_close($db);
		
		foreach($this->users AS $searchUser) {
			if($searchUser->getPassword() == $user->getPassword() && $searchUser->getUsername() == $user->getUsername()) {
				return true;
			}
		}
		return false;
	}
	
	public function validateUsername(User $user) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM USER";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
	
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->users,new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]));
		}
	
		mysqli_free_result($result);
		mysqli_close($db);
	
		foreach($this->users AS $searchUser) {
			echo($searchUser->getUsername());
			echo($user->getUsername());
			if($searchUser->getUsername() == $user->getUsername()) {
				return true;
			}
		}
		return false;
	}
	
	public function createUser(User $user) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "INSERT INTO User (username, email, firstname, lastname, password, userrole) VALUES " .
		"('" . $user->getUsername() . "'" .
		", '" . $user->getEmail() ."'" .
		", '". $user->getFirstname() ."'" .
		", '". $user->getLastname() . "'" .
		", '". $user->getPassword() . "'" .
		", 'User')";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');	
		mysqli_close($db);
	}
	
	public function loadUserByUsername($username) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM User WHERE Username='".$username."';";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			$sessionUser = new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
		}	
		mysqli_close($db);
		return $sessionUser;
	}
}
?>