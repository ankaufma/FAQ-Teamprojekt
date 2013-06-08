<?php
include('ShowCommentByAnswerDTO.php');
include('ShowRatingByAnswerDTO.php');
include('ShowCategoriesDTO.php');
include('ShowAllAnswersDTO.php');
include('ShowQuestionAnswerDTO.php');
include('ApplyUserDTO.php');
include('ApplyRatingDTO.php');
include('CheckUserDTO.php');
include('..\user\usermanager.php');
include('..\answer\AnswerManager.php');
include('..\answer\RatingManager.php');
include('..\question\QuestionManager.php');
include('..\question\CategoryManager.php');
include('..\answer\CommentManager.php');

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
				array_push($allQbyC,new ShowAllAnswersDTO($myA->getAnswer()));
			}
			return $allQbyId;
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
		
		public function showRatingByAnswer($answer) {
			$rm = new RatingManager();
			$swrba = new ShowRatingByAnswerDTO($rm->calcRatingForEachAnswer($answer));
			return $swrba->getRating();
		}
		
		public function showCommentsByAnswer($answer) {
			$cm = new CommentManager();
			$swcba = new ShowCommentByAnswerDTO($cm->loadCommentsByAnswer($answer));
			return $swcba->getComments();
		}
		
		public function checkUser($username, $password) {
			$cudto = new CheckUserDTO($username, $password);
			$user = new User($cudto->getUsername(), $cudto->getPassword(), "Mock", "Mock", "Mock");
			$um = new Usermanager();
			if($um->validatePassword($user) && $um->validateUsername($password)) {
				return true;
			} else {
				return false;
			}
		}
	}
?>