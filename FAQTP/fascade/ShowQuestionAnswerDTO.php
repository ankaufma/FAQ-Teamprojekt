<?php
class ShowQuestionAnswerDTO {
	private $question;
	private $qDate;
	private $username;
	private $answers = Array();
	
	public function __construct ($question, $qDate, $username, Array $answers) {
		$this->question=$question;
		$this->qDate=$qDate;
		$this->username=$username;
		$this->answers=$answers;
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