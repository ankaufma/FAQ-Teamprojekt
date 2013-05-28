<?php
include('Question.php');
class QuestionManager {
	
	private $questions = Array();
	
	public function createQuestion(Question $question){
		
			$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
			$sql = "INSERT INTO Question (question, user) VALUES " .
					"('" . $question->getQuestion() . "'" .
					", '" . $question->getUser()->getUserId() ."');";
		
			$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
			mysqli_close($db);	
	}
	
	
	Public function updateQuestion(Question $question){
	
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "Update Question set Question =".$question->getQuestion()." where QuestionID =".$question->getQuestionID()." ;";
				
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		mysqli_close($db);
	}
	
	Public function loadQuestionByCategory(Category $category){
			
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT Question.* FROM Question RIGHT JOIN catquestion ON".
			   "Catquestion.QuestionID=Question.QuestionID WHERE catquestion.CategoryID =". 
				$category->getCatID() ." ORDER BY Question.QuestionID;";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			array_push($this->questions,new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
		}
		
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;
		
		
		
	}
	
	Public function loadAllQuestions(){
		
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT Question.* FROM Question;";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			array_push($this->questions,new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
		}
		
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;
		
	}
	
	
	Public function loadQuestionsByNoAnswer(){
		#

		
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = 		"SELECT Question . *". 
					"FROM Question".
					"LEFT JOIN questionanswer ON Question.QuestionID = questionanswer.Question".
					"WHERE Questionanswer.Question IS NULL";
		
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			array_push($this->questions,new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
		}
		
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;
		
	}
	
	Public function loadQuestionByText($text){
	
	}
	
}
?>