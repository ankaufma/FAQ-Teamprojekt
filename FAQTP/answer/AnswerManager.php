<?php
include('Answer.php');
include('Question.php');

class AnswerManager {
	private $answers = Array();
	private $relatedAnswers = Array();
	private $questions = Array();
	
	public function createAnswer(Answer $answer) {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "INSERT INTO Answer (answer, user) VALUES " .
				"('" . $answer->getAnswer() . "'" .
				", '" . $answer->getUser()->getUserId() ."');";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		mysqli_close($db);
	}
	
	public function loadAnswersById($id) {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		/*
		 * Finde alle Fragen zu einer Antwort
		*/
		$questions = "SELECT q.* from question q, answer a, questionanswer qa where q.questionid=qa.question and qa.answer=a.answerid and a.AnswerID ='" . $id . "';";
		$resultQuesions = mysqli_query($db, $questions) or die ('Fucking Nightmare!');
		while ($qRows = mysqli_fetch_array($resultQuestions)) {
			$userQuestion = "SELECT * FROM USER WHERE UserId='". $row[5] ."';";
			$resultUserQ = mysqli_query($db, $userQuestion) or die ('Fucking Nightmare!');
			$userQRow = mysqli_fetch_row($resultUserQ);
			array_push($this->questions,
					new Question($qRows[0],
							$qRows[1],
							$qRows[2],
							$qRows[3],
							$qRows[4],
							new User($userQRow[0],$userQRow[1],$userQRow[2],$userQRow[3],$userQRow[4],$userRow[5],$userRow[6]))
			);
		}
		mysqli_free_result($resultQuestions);
		mysqli_free_result($resultUserQ);
		/*
		 * Gib alle Antworten zurück
		*/
		$sql = "SELECT * FROM Answer WHERE AnswerID = '". $id ."';";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			/*
			 * Finde den richtige User zur Antwort
			*/
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0],
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6]),
							$this->questions)
			);
		}
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadAnswersByText($text) {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		/*
		 * Finde alle Fragen zu einer Antwort
		 */
		$questions = "SELECT q.* from question q, answer a, questionanswer qa where q.questionid=qa.question and qa.answer=a.answerid and a.answer like '%" . $text . "%';";
		$resultQuesions = mysqli_query($db, $questions) or die ('Fucking Nightmare!');
		while ($qRows = mysqli_fetch_array($resultQuestions)) {
			$userQuestion = "SELECT * FROM USER WHERE UserId='". $row[5] ."';";
			$resultUserQ = mysqli_query($db, $userQuestion) or die ('Fucking Nightmare!');
			$userQRow = mysqli_fetch_row($resultUserQ);
			array_push($this->questions, 
					new Question($qRows[0],
							$qRows[1],
							$qRows[2],
							$qRows[3],
							$qRows[4],
							new User($userQRow[0],$userQRow[1],$userQRow[2],$userQRow[3],$userQRow[4],$userRow[5],$userRow[6]))
					);
		}
		mysqli_free_result($resultQuestions);
		mysqli_free_result($resultUserQ);
		/*
		 * Gib alle Antworten zurück
		 */
		$sql = "SELECT * FROM Answer WHERE Answer like '%". $text ."%';";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			/*
			 * Finde den richtige User zur Antwort
			 */
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0], 
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6]),
							$this->questions)
					);
		}
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadAnswerByQuestion(Question $question) {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		
		/*
		 * Gib alle Antworten zu einer Frage zurück
		 */
		$sql = "SELECT a.* FROM Answer a, QuestionAnswer qa WHERE a.AnswerID=qa.Answer and qa.Question='". $question->getQuestionID() ."';";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0], 
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6]),
							$this->questions)
					);
		}
		mysqli_free_result($result2);
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadAllAnswers() {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
	
		/*
		 * Gib alle Antworten zurück
		*/
		$sql = "SELECT * FROM ANSWER;";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			$sqlQ = "SELECT q.* FROM Question q, Answer a, QuestionAnswer qa WHERE q.QuestionID=qa.Question and qa.Answer=a.AnswerID and a.AnswerID='".$row[0]."';";
			$resultQ = mysqli_query($db,$sqlQ);
			while($rowQ = mysqli_fetch_array($resultQ)){
				array_push($this->questions, new Question($rowQ[1],$rowQ[2],$rowQ[3],$rowQ[4]));
			}
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0],
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6]),
							$this->questions)
			);
			$this->question = Array();
		}
		mysqli_free_result($resultQ);
		mysqli_free_result($result2);
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadRelatedAnswers(Answer $answer) {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		
		/*
		 * Gib alle Related Antworten zurück
		*/
		$sql = "SELECT a.* FROM ANSWER a WHERE a.AnswerID IN (SELECT ra.relanswer FROM relatedAnswer ra WHERE ra.Answer='".$answer->getAnswerId()."';";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			$sqlQ = "SELECT q.* FROM Question q, Answer a, QuestionAnswer qa WHERE q.QuestionID=qa.Question and qa.Answer=a.AnswerID and a.AnswerID='".$row[0]."';";
			$resultQ = mysqli_query($db,$sqlQ);
			while($rowQ = mysqli_fetch_array($resultQ)){
				array_push($this->questions, new Question($rowQ[0],$rowQ[1],$rowQ[2],$rowQ[3],$rowQ[4]));
			}
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$userRow = mysqli_fetch_row($result2);
			$myAnswer = new Answer($row[0],
					$row[1],
					$row[2],
					new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6]),
					$this->questions);
			$myAnswer->setDescription($row[6]);
			array_push($this->$relatedAnswers,$myAnswer);
			$this->question = Array();
		}
		mysqli_free_result($result2);
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function setRelatedAnswer(Answer $answer, Answer $relAnswer, $description){
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "INSERT INTO RelatedAnswer VALUES (".$answer->getAnswerID().",".$relAnswer->getAnswerID().",'".$description."');";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		mysqli_free_result($result);
		mysqli_close($db);
	}
}

?>