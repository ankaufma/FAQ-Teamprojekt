<?php
	class ShowAllAnswersDTO {
		private $answer;
		
		public function __construct($answer) {
			$this->answer = $answer;
		}
		
		public function setAnswer($answer) {
			$this->answer = $answer;
		}
		
		public function getAnswer($answer) {
			return $this->answer;
		}
	}