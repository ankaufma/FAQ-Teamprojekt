<?php
include('Question.php');
include('Category.php');
class QuestionManager {
	
	private $questions = Array();
	private $categories = Array();
	private $answers = Array();
	
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
		$sql = "SELECT Question.* FROM Question INNER JOIN catquestion ON".
			   "Catquestion.QuestionID=Question.QuestionID WHERE catquestion.CategoryID =". 
				$category->getCatID() ." ORDER BY Question.QuestionID;";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result)) {
			$this->answers = Array();
			$sqlA = "SELECT A.* FROM Answer a, QuestionAnswer qa WHERE a.answerid=qa.answer and qa.question=".$row[0].";";
			$resultA = mysqli_query($db, $sqlA) or die ('Fucking Nightmare!');
			while ($rowA = mysqli_fetch_array($resultA)) {
				$sqlU = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
				$resultU = mysqli_query($db, $sqlU) or die ('Fucking Nightmare!');
				$rowU = mysqli_fetch_row($resultU);
				array_push($this->answers,
						new Answer($rowA[0],
								$rowA[1],
								$rowA[2],
								new User($rowU[0],$rowU[1],$rowU[2],$rowU[3],$rowU[4],$rowU[5],$rowU[6])
								)
						);
			}
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[5] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$rowU = mysqli_fetch_row($result2);
			array_push($this->questions,
					new Question(
							$row[0],
							$row[1],
							$row[2],
							$row[3],
							$row[4],
							$this->answers,
							array_push($this->categories,$category),
							new User($rowU[0],$rowU[1],$rowU[2],$rowU[3],$rowU[4],$rowU[5],$rowU[6])));
		}
		mysqli_free_result($result2);
		mysqli_free_result($resultU);
		mysqli_free_result($resultA);
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;
		
		
		
	}
	
	Public function loadAllQuestions(){
		
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM QUESTION;";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare! Questions');
		
		while ($row = mysqli_fetch_array($result)) {
			$this->answers = Array();
			$sqlA = "SELECT A.* FROM Answer a, QuestionAnswer qa WHERE a.answerid=qa.answer and qa.question=".$row[0].";";
			$resultA = mysqli_query($db, $sqlA) or die ('Fucking Nightmare! Answers');
			while ($rowA = mysqli_fetch_array($resultA)) {
				$sqlU = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
				$resultU = mysqli_query($db, $sqlU) or die ('Fucking Nightmare!');
				$rowU = mysqli_fetch_row($resultU);
				array_push($this->answers,
						new Answer($rowA[0],
								$rowA[1],
								$rowA[2],
								new User($rowU[0],$rowU[1],$rowU[2],$rowU[3],$rowU[4],$rowU[5],$rowU[6])
								)
						);
			}
			$this->categories = Array();
			$sqlC = "SELECT C.* FROM Category c, CatQuestion cq WHERE c.categoryid=cq.categoryid and cq.questionid=".$row[0].";";
			$resultC = mysqli_query($db, $sqlA) or die ('Fucking Nightmare! Categories');
			while ($rowC = mysqli_fetch_array($resultC)) {
				array_push($this->categories,new Category($rowC[0],$rowC[1],$rowC[2]));
			}
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[5] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$rowU = mysqli_fetch_row($result2);
			array_push($this->questions,
					new Question(
							$row[0],
							$row[1],
							$row[2],
							$row[3],
							$row[4],
							$this->answers,
							$this->categories,
							new User($rowU[0],$rowU[1],$rowU[2],$rowU[3],$rowU[4],$rowU[5],$rowU[6])));
		}
		mysqli_free_result($resultC);
		mysqli_free_result($result2);
		mysqli_free_result($resultU);
		mysqli_free_result($resultA);
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
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->questions,new User($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
		}
		
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;
		
	}
	
	Public function loadQuestionByText($text){
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM QUESTIONS WHERE Question Like '%".$text."%';";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result)) {
			$this->answers = Array();
			$sqlA = "SELECT A.* FROM Answer a, QuestionAnswer qa WHERE a.answerid=qa.answer and qa.question=".$row[0].";";
			$resultA = mysqli_query($db, $sqlA) or die ('Fucking Nightmare!');
			while ($rowA = mysqli_fetch_array($resultQ)) {
				$sqlU = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
				$resultU = mysqli_query($db, $sqlU) or die ('Fucking Nightmare!');
				$rowU = mysqli_fetch_row($resultU);
				array_push($this->answers,
						new Answer(
								$rowA[0],
								$rowA[1],
								$rowA[2],
								new User($rowU[0],$rowU[1],$rowU[2],$rowU[3],$rowU[4],$rowU[5],$rowU[6])
						)
				);
			}
			$this->categories = Array();
			$sqlC = "SELECT C.* FROM Category c, CatQuestion cq WHERE c.categoryid=cq.categoryid and cq.questionid=".$row[0].";";
			$resultC = mysqli_query($db, $sqlA) or die ('Fucking Nightmare!');
			while ($rowC = mysqli_fetch_array($resultC)) {
				array_push($this->categories,new Category($rowC[0],$rowC[1],$rowC[2]));
			}
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[5] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$rowU = mysqli_fetch_row($result2);
			array_push($this->questions,
					new Question(
							$row[0],
							$row[1],
							$row[2],
							$row[3],
							$row[4],
							$this->answers,
							$this->categories,
							new User($rowU[0],$rowU[1],$rowU[2],$rowU[3],$rowU[4],$rowU[5],$rowU[6])));
		}
		mysqli_free_result($resultC);
		mysqli_free_result($result2);
		mysqli_free_result($resultU);
		mysqli_free_result($resultA);
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;
	}
	
	public function 
	
	
	
}
?>