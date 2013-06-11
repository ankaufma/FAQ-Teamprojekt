<?php

$pfad = '/../';
include('ShowCommentByAnswerDTO.php');
include('ShowRatingByAnswerDTO.php');
include('ShowCategoriesDTO.php');
include('ShowAllAnswersDTO.php');
include('ShowQuestionAnswerDTO.php');
include('ApplyUserDTO.php');
include('ApplyRatingDTO.php');
include('CheckUserDTO.php');
include $pfad.'user/usermanager.php';
include $pfad.'answer/AnswerManager.php';
include $pfad.'answer/RatingManager.php';
include $pfad.'question/QuestionManager.php';
include $pfad.'question/CategoryManager.php';
include $pfad.'answer/CommentManager.php';

	class Fascade {
		
		public function userByUsername($username) {
			$usermanager = new Usermanager();
			$user = $usermanager->loadUserByUsername($username);
			$audto = new ApplyUserDTO($user->getUserId(), $user->getFirstname(), $user->getLastname(), $user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getUserrole());
			return $audto;
		}
		
		public function applyUser($firstname, $lastname, $username, $email, $password) {
			$audto = new ApplyUserDTO(1, $firstname, $lastname, $username, $email, $password, 'User');
			$usermanager = new Usermanager();
			$newUser = new User(1,$audto->getUsername(),$audto->getPassword(),$audto->getEmail(),$audto->getFirstname(),$audto->getLastname(), $audto->getUserrole());
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
				array_push($showAnswers, new ShowAllAnswersDTO($myAnswer->getAnswerId(), $myAnswer->getAnswer()));
			}
			return $showAnswers;
		}
		
		public function showMainAnswers($questionId) {
			$answermanager = new AnswerManager();
			$allAnswers = $answermanager->loadMainAnswerByQuestion($questionId);
			foreach($allAnswers AS $myAnswer) {
				$showAnswers = new ShowAllAnswersDTO($myAnswer->getAnswerId(), $myAnswer->getAnswer());
			}
			return $showAnswers;
		}
		
		public function showRelAnswers($questionId) {
			$showAnswers = Array();
			$answermanager = new AnswerManager();
			$allAnswers = $answermanager->loadRelAnswerByQuestion($questionId);
			foreach($allAnswers AS $myAnswer) {
				array_push($showAnswers, new ShowAllAnswersDTO($myAnswer->getAnswerId(), $myAnswer->getAnswer()));
			}
			return $showAnswers;
		}
		
		public function showQuestionAnswerDTO() {
			$qm = new QuestionManager();
			$allQAs = Array();
			foreach($qm->loadAllQuestions() AS $myQ) {
				array_push($allQAs,new ShowQuestionAnswerDTO($myQ->getQuestionId(), $myQ->getQuestion(), $myQ->getqDate(), $myQ->getUser()->getUsername(), $myQ->getAnswers()));
			}
			return $allQAs;
		}
		
		public function applyQuestion($question, $publicityState, $username) {
			$qm = new QuestionManager();
			$um = new Usermanager();
			$user = new User(1, $username, 'Anonymmous', 'Anonymous', 'Anonymmous', 'Anonymmous', 'User');
			if($um->validateUsername($user)) {
				$udto = self::userByUsername($username);
				$user = new User($udto->getUserId(), $udto->getUserName(), $udto->getPassword(), $udto->getEmail(), $udto->getFirstname(), $udto->getLastname(), $udto->getUserrole());
			}
			$qm->createQuestion(new Question(1, $question, 'German', $publicityState, 'date', Array(), Array(), $user));
		}
		
		
		//in Entwicklung
		public function applyAnswer($answer, $username) {
			$am = new AnswerManager();
			$um = new Usermanager();
			$user = new User(1, $username, 'Anonymmous', 'Anonymous', 'Anonymmous', 'Anonymmous', 'User');
			if($um->validateUsername($user)) {
				$udto = self::userByUsername($username);
				$user = new User($udto->getUserId(), $udto->getUserName(), $udto->getPassword(), $udto->getEmail(), $udto->getFirstname(), $udto->getLastname(), $udto->getUserrole());
			}
			$am->createMainAnswer(new Answer($answerId, $answer, 'date', $user));
		}
		
		
		public function showQuestionById($id) {
			$qm = new QuestionManager();
			$allQAs = Array();
			foreach($qm->loadQuestionById($id) AS $myQ) {
				array_push($allQAs,new ShowQuestionAnswerDTO($myQ->getQuestionId(), $myQ->getQuestion(), $myQ->getqDate(), $myQ->getUser()->getUsername(), $myQ->getAnswers()));
			}
			return $allQAs;
		}
		
		public function showQuestionNoAnswer() {
			$qm = new QuestionManager();
			$allQAs = Array();
			foreach($qm->loadQuestionsByNoAnswer() AS $myQ) {
				array_push($allQAs,new ShowQuestionAnswerDTO($myQ->getQuestionId(), $myQ->getQuestion(), $myQ->getqDate(), $myQ->getUser()->getUsername(), $myQ->getAnswers()));			}
			return $allQAs;
		}
		
		public function showQuestionByText($text) {
			$qm = new QuestionManager();
			$allQAs = Array();
			foreach($qm->loadQuestionByText($text) AS $myQ) {
				array_push($allQAs,new ShowQuestionAnswerDTO($myQ->getQuestionId(), $myQ->getQuestion(), $myQ->getqDate(), $myQ->getUser()->getUsername(), $myQ->getAnswers()));
			}
			return $allQAs;
		}
		
		public function showQuestionsByCategory($catId) {
			$qm = new QuestionManager();
			$allQAs = Array();
			foreach($qm->loadQuestionByCategory(new Category($catId, "Mock", 1)) AS $myQ) {
				array_push($allQAs,new ShowQuestionAnswerDTO($myQ->getQuestionId(), $myQ->getQuestion(), $myQ->getqDate(), $myQ->getUser()->getUsername(), $myQ->getAnswers()));
			}
			return $allQAs;
		}
		
		public function showAnswersByQId($id) {
			$am = new AnswerManager();
			$allQbyId = Array();
			foreach($am->loadAnswerByQuestion($id) AS $myA) {
				array_push($allQbyC,new ShowAllAnswersDTO($myA->getAnswerId(), $myA->getAnswer()));
			}
			return $allQbyId;
		}
		
		public function showAnswersByText($text) {
			$am = new AnswerManager();
			$anByText = Array();
			foreach($am->loadAnswersByText($text) AS $myA) {
				array_push($anByText,new ShowAllAnswersDTO($myA->getAnswerId(), $myA->getAnswer()));
			}
			return $anByText;
		}
		
		public function showCatByPreCat($id){
			$cm = new CategoryManager();
			$allNachfolger = Array();
			foreach($cm->loadCategoryByCatId($id) AS $nachfolger) {
				array_push($allNachfolger, new ShowCategoriesDTO($nachfolger->getCatID(), $nachfolger->getDescriptionOfCategory()));
			}
			return $allNachfolger;
		}
		
		public function showRootCats(){
			$cm = new CategoryManager();
			$roots = Array();
			foreach($cm->loadRoots() AS $myRoot) {
				array_push($roots, new ShowCategoriesDTO($myRoot->getCatID(), $myRoot->getDescriptionOfCategory()));
			}
			return $roots;
		}
		
		public function showAllCategories() {
			$cm = new CategoryManager();
			$allCats = Array();
			foreach($cm->loadAllCategories() AS $myCats) {
				array_push($allCats, new ShowCategoriesDTO($myCats->getCatID(), $myCats->getDescriptionOfCategory()));
			}
			return $allCats;
		}
		
		public function showRatingByAnswer($answerId) {
			$rm = new RatingManager();
			$swrba = new ShowRatingByAnswerDTO($rm->calcRatingForEachAnswer($answerId));
			return $swrba->getRating();
		}
		
		public function showCommentsByAnswer($answerId) {
			$cm = new CommentManager();
			$swcba = new ShowCommentByAnswerDTO($cm->loadCommentsByAnswer($answerId));
			return $swcba->getComments();
		}
		
		public function checkUser($username, $password) {
			$cudto = new CheckUserDTO($username, $password);
			$user = new User(1, $cudto->getUsername(), $cudto->getPassword(), "Mock", "Mock", "Mock", "Mock");
			$um = new Usermanager();
			if($um->validatePassword($user) && $um->validateUsername($password)) {
				return true;
			} else {
				return false;
			}
		}
	}
?>
