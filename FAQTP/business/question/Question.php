<?php
class Question
{
	private $questionID;
	private $question;
	private $qDate;
	private $language;
	private $user;
	private $answers = Array();
	private $category = Array();
	private $publicityState;
	
	public function __construct($questionID, $question, $language, $publicityState, $qDate, Array $answers, Array $category, User $user) {
		$this->questionID = $questionID;
		$this->question = $question;
		$this->language = $language;
		$this->publicityState = $publicityState;
		$this->qDate=$qDate;
		$this->answers = $answers;
		$this->category = $category;
		$this->user = $user;
	}

	public function setPublicityState($publicityState) {
		$this->publicityState = $publicityState;
	}	
	
	public function setQuestionID($questionID) {
		$this->questionID = $questionID;
	}

	public function setQuestion($question) {
		$this->question = $question;
	}
	
	public function setqDate($qDate) {
		$this->qDate = $qDate;
	}
	
	public function setLanguage($language) {
		$this->language= $language;
	}
	
	public function setAnswers(Array $answer) {
		$this->answers = $answers;
	}
	
	public function setUser(User $user) {
		$this->user = $user;
	}

	public function setCategory(Array $category) {
		$this->category = $category;
	}

	public function getQuestionID() {
		return $this->questionID;
	}

	public function getQuestion() {
		return $this ->question;
	}

	public function getqDate() {
		return $this->qDate;
	}

	public function getLanguage() {
		return $this->language;
	}
	
	public function getAnswers() {
		return $this->answers;
	}
	
	public function getCategories() {
		return $this->category;
	}
	
	public function getUser() {
		return $this->user;
	}	
	
	public function getPublicityState() {
		return $this->publicityState;
	}
}
?>