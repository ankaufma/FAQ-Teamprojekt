<?php
class Comment {
	private $commentId;
	private $comment;
	private $cDate;
	private $user;
	private $answer;
	
	public function __construct($commentId, $comment, $cDate, User $user, Answer $answer) {
		$this->comment=$comment;
		$this->user=$user;
		$this->answer=$answer;
	}
	
	public function setCommentId($commentId) {
		$this->commentId=$commentId;
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
	
	public function setAnswer($answer) {
		$this->answer=$answer;
	}

	public function getCommentId() {
		return $this->commentId;
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
	
	public function getAnswer() {
		return $this->answer;
	}
}

?>