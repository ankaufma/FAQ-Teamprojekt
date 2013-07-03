<?php
class Rating
{
	private $bwID;
	private $rating;
	private $answer;
	private $user;

	public function __construct(User $user, Answer $answer, $rating) {
		$this->answer = $answer;
		$this->user = $user;
		$this->rating = $rating;
	}

	public function setAnswer(Answer $answer) {
		$this->answer = $answer;
	}

	public function setUser(User $user) {
		$this->user = $user;
	}

	public function setRating($rating) {
		$this->rating = $rating;
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