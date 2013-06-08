<?php
class ShowCommentByAnswerDTO{
	private $comments = Array();
	
	public function __construct(Array $comments) {
		$this->comments = $comments;
	}
	public function setComments(Array $comments) {
		$this->comments = $comments;
	}
	public function getComments() {
		return $this->comments;
	}
}
?>