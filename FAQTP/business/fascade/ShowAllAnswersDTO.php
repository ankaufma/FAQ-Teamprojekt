<?php
	class ShowAllAnswersDTO {
		private $answerid;
		private $answer;
		
		public function __construct($answerid, $answer) {
			$this->answerid = $answerid;
			$this->answer = $answer;
		}
		
		public function setAnswer($answer) {
			$this->answerid = $answerid;
		}
		
		public function setAnswer($answer) {
			$this->answer = $answer;
		}
		
		public function getAnswer() {
			return $this->answerid;
		}
		
		public function getAnswer() {
			return $this->answer;
		}
	}