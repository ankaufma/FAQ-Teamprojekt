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
		$sql = 
		
		"SELECT * FROM QUESTION q, CATQUESTION cq inner join "
		."("
		."	SELECT" 
		."	c2.categoryid as child1,"
		."	c3.categoryid as child2,"
		."	c4.categoryid as child3"
		."	FROM "
		."	Category c1" 
		."	left join category c2 on c1.categoryid=c2.precategory"
		."	left join Category c3 on c2.categoryid=c3.precategory"
		."	left join category c4 on c3.categoryid=c4.precategory"
		."	WHERE c1.categoryid=".$category->getCatId().") as cats"
		." ON "
		."cq.categoryid = cats.child1 or cq.categoryid = cats.child2 or cq.categoryid = cats.child3 or cq.categoryid=".$category->getCatId()." WHERE q.QuestionID = cq.QuestionId;";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare! CatQuest');
		
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
		mysqli_free_result($result);
		mysqli_close($db);
		
		return $this->questions;;
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

	Public function loadQuestionById($id){
	
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM QUESTION WHERE QuestionId=".$id.";";
	
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
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT * FROm Question q left join Questionanswer qa on q.questionid=qa.question where qa.question IS NULL;";
		
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
	
	
}
?>