<?php
class ShowQuestionAnswerDTO {
	private $questionId;
	private $question;
	private $qDate;
	private $username;
	private $answers = Array();
	
	public function __construct ($questionID, $question, $qDate, $username, Array $answers) {
		$this->question=$question;
		$this->qDate=$qDate;
		$this->username=$username;
		$this->answers=$answers;
		$this->questionId=$questionId;
	}
	public function setQuestionId($questionId) {
		$this->questionId=$questionId;
	}
	public function setQuestion($question) {
		$this->question=$question;
	}
	public function setQDate($qDate) {
		$this->qDate=$qDate;
	}
	public function setUsername($username) {
		$this->username=$username;
	}
	public function setAnswers($answers) {
		$this->answers=$answers;
	}
	
	public function getQuestionId() {
		return $this->questionId;
	}
	public function getQuestion() {
		return $this->question;
	}
	public function getQDate() {
		return $this->qDate;
	}
	public function getUsername() {
		return $this->username;
	}
	public function getAnswers() {
		return $this->answers;
	}
}