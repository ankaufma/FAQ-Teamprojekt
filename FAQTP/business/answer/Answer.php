<?php
class Answer {
	
	private $answerId;
	private $answer;
	private $aDate;
	private $user;
	private $description;
	
	public function __construct($answerId, $answer, $aDate, User $user) {
		$this->answerId=$answerId;
		$this->answer=$answer;
		$this->aDate=$aDate;
		$this->user=$user;
	}
	
	public function setAnswerId($answerId)  {
		$this->answerId=answerId;	
	}
	
	public function setAnswer($answer) {
		$this->answer=answer;	
	}
	
	public function setADate($aDate) {
		$this->aDate=aDate;	
	}
	
	public function setUser($user) {
		$this->user=$user;	
	}
	
	public function setDescription(Array $description) {
		$this->description=$descriptions;
	}
	
	public function getAnswerId() {
		return $this->answerId;
	}
	
	public function getAnswer() {
		return $this->answer;
	}
	
	public function getADate() {
		return $this->aDate;
	}
	
	public function getUser() {
		return $this->user;
	}
		
	public function getDescription() {
		return $this->description;
	}
} 

?>