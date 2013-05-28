<?php
class Question
{
	private $questionID;
	private $question;
	private $fDate;
	private $language;
	private $user;
	private $category = Array();
	private $publicityState;
	
	public function __construct( $question, $language, Array $category, $user) {
		$this->question = $question;
		$this->language = $language;
		$this->user = $user;
		$this->category = $category;

	}

	public function setQuestionID($questionID) {
		$this->questionID = $questionID;
	}

	public function setQuestion($question) {
		$this->question = $question;
	}
	
	public function setFDate($fDate) {
		$this->fDate = $fDate;
	}
	
	public function setLanguage($language) {
		$this->language= $language;
	}
	
	public function setAnswers($User) {
		$this->User = $User;
	}
	
	public function setUser($user) {
		$this->user = $user;
	}

	public function setCategory(Array $category) {
		$this->category = $category;
	}

	public function getQuestionID() {
		return $this->category;
	}

	public function getQuestion() {
		return $this ->question;
	}

	public function getFDate() {
		return $this->fDate;
	}

	public function getLanguage() {
		return $this->language;
	}
	
	public function getAnswers() {
		return $this->answers;
	}
	
	public function getUser() {
		return $this->user;
	}	
	
}
?>