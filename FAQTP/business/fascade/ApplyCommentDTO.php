<?php
class ApplyCommentDTO {

	private $comment;
	private $user;
	private $answerid;
	
	
	public function __construct($user, $answerid,$comment) {
		$this->comment=$comment;
		$this->user=$user;
		$this->answerid=$answerid;
	}
	
	
	public function setComment($comment) {
		$this->comment=$comment;
	}
	
	public function setUser($user) {
		$this->user=$user;
	}
	
	public function setAnswerId($answerid) {
		$this->answerid=$answerid;
	}
	
	public function getAnswerId() {
		return $this->answerid;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	
	public function getComment() {
		return $this->comment;
	}
	
	
}

?>