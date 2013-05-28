<?php
include('ShowAllAnswersDTO.php');
include('ApplyUserDTO.php');
include('ApplyRatingDTO.php');
include('usermanager.php');
include('AnswerManager.php');
include('RatingManager.php');

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
	}
	
?>