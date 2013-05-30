<?php
include('ShowAllAnswersDTO.php');
include('ShowQuestionAnswerDTO.php');
include('ApplyUserDTO.php');
include('ApplyRatingDTO.php');
include('..\user\usermanager.php');
include('..\answer\AnswerManager.php');
include('..\answer\RatingManager.php');
include('..\question\QuestionManager.php');

	class Fascade {
		public function applyUser($firstname, $lastname, $username, $email, $password) {
			$audto = new ApplyUserDTO($firstname, $lastname, $username, $email, $password);
			$usermanager = new Usermanager();
			$newUser = new User($audto->getUsername(),$audto->getPassword(),$audto->getEmail(),$audto->getFirstname(),$audto->getLastname());
			if($usermanager->validateUsername($newUser)){
				$usermanager->createUser($newUser);
			}
		}
		
		public function applyRating($username, $answerid, $rating) {
			$usermanager = new Usermanager();
			$answermanager= new AnswerManager();
			$ardto = new ApplyRatingDTO($username, $answerid, $rating);
			$ratingmanager = new RatingManager();
			$ratingmanager->createRating(
					new Rating(
							$usermanager->loadUserByUsername($ardto->getUser()), $answermanager->loadAnswerById($ardto->getAnswer()), $ardto->getRating())
					);
		}
		
		public function showAllAnswers() {
			$showAnswers = Array();
			$answermanager = new AnswerManager();
			$allAnswers = $answermanager->loadAllAnswers();
			foreach($allAnswers AS $myAnswer) {
				array_push($showAnswers, new ShowAllAnswersDTO($myAnswer->getAnswer()));
			}
			return $showAnswers;
		}
		
		public function showQuestionAnswerDTO() {
			$qm = new QuestionManager();
			$allQAs = Array();
			foreach($qm->loadAllQuestions() AS $myQ) {
				array_push($allQAs,new ShowQuestionAnswerDTO($myQ->getQuestion(), $myQ->getqDate(), $myQ->getUser()->getUsername(), $myQ->getAnswers()));
			}
			return $allQAs;
		}
	}
	
	$fassi = new Fascade();
	foreach($fassi->showQuestionAnswerDTO() AS $myQA) {
		echo("<p>Frage: " . $myQA->getQuestion() . " " . $myQA->getQDate(). "</p>");
		foreach($myQA->getAnswers() AS $myAnswers) {
			echo("<p>Antwort: " .$myAnswers->getAnswer(). "</p>");
		}
	}
?>