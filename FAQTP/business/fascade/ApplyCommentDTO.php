<?php
class Comment {

	private $comment;
	private $cDate;
	private $user;

	
	public function __construct($comment, $cDate, User $user) {
		$this->comment=$comment;
		$this->user=$user;
		
	}
	
	
	public function setComment($comment) {
		$this->comment=$comment;
	}
	
	public function setCDate($cDate) {
		$this->cDate=$cDate;
	}
	
	public function setUser($user) {
		$this->user=$user;
	}
	
	
	public function getComment() {
		return $this->comment;
	}
	
	public function getCDate() {
		return $this->cDate;
	}
	
	public function getUser() {
		return $this->user;
	}
	

}

?>