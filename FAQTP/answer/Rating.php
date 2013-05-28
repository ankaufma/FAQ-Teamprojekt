<?php
class Rating
{
	private $bwID;
	private $rating;
	private $answer;
	private $user;

	public function __construct($user, $answer, $rating) {
		$this->answer = $answer;
		$this->user = $user;
		$this->rating = $rating;
	}

	public function setBwID($answer) {
		$this->answer = $answer;
	}

	public function setAnswer($answer) {
		$this->answer = $answer;
	}

	public function setUser($user) {
		$this->user = $user;
	}

	public function setRating($rating) {
		$this->rating = $rating;
	}

	public function getBwID() {
		return $this->bwID;
	}

	public function getAnswer() {
		return $this ->answer;
	}

	public function getUser() {
		return $this->user;
	}


	public function getRating() {
		return $this->rating;
	}

}

?>