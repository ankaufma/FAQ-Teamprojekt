<?php
	class ShowAllAnswersDTO {
		private $answerid;
		private $answer;
		
		public function __construct($answerid, $answer) {
			$this->answerid = $answerid;
			$this->answer = $answer;
		}
		
		public function setAnswerId($answerid) {
			$this->answerid = $answerid;
		}
		
		public function setAnswer($answer) {
			$this->answer = $answer;
		}
		
		public function getAnswerId() {
			return $this->answerid;
		}
		
		public function getAnswer() {
			return $this->answer;
		}
	}