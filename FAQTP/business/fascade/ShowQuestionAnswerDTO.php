<?php
class ShowQuestionAnswerDTO {
	private $questionId;
	private $question;
	private $qDate;
	private $qState;
	private $username;
	private $answers = Array();
	
	public function __construct ($questionId, $question, $qDate, $qState, $username,Array $answers) {
		$this->questionId=$questionId;
		$this->question=$question;
		$this->qDate=$qDate;
		$this->qState=$qState;
		$this->username=$username;
		$this->answers=$answers;
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
	public function setQState($qState) {
		$this->qState=$qState;
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
	public function getQState() {
		return $this->qState;
	}
	public function getUsername() {
		return $this->username;
	}
	public function getAnswers() {
		return $this->answers;
	}
}