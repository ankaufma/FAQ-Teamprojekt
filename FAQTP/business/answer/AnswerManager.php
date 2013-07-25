<?php
include('Answer.php');

class AnswerManager {
	private $answers = Array();
	private $relatedAnswers = Array();
	
	public function createMainAnswer(Answer $answer) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "INSERT INTO Answer (answer, user) VALUES " .
				"('" . $answer->getAnswer() . "'" .
				", '" . $answer->getUser()->getUserId() ."');";
		
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		
		mysqli_close($db);
	}
	
	public function createRelAnswer($qid, $aid) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "INSERT INTO questionanswer (question, answer, description) VALUES " .
				"('" . $qid . "'" .
				",'" . $aid . "'" .
				",'Related');";
	
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
	
		mysqli_close($db);
	}
	
	public function loadRelAnswerByQuestion($questionId) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		/*
		 * Gib alle Antworten zurück
		*/
		$sql = "SELECT a.* FROM Answer a, QuestionAnswer qa WHERE a.AnswerID = qa.Answer and qa.Description='Related' and qa.question=".$questionId.";";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			/*
			 * Finde den richtige User zur Antwort
			*/
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0],
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
					)
			);
		}
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadMainAnswerByQuestion($questionId) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		/*
		 * Gib alle Antworten zurück
		*/
		$sql = "SELECT a.* FROM Answer a, QuestionAnswer qa WHERE a.AnswerID = qa.Answer and qa.Description='Main' and qa.question=".$questionId.";";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			/*
			 * Finde den richtige User zur Antwort
			*/
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0],
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
					)
			);
		}
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadAnswersById($AnswerId) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		/*
		 * Gib alle Antworten zurück
		*/
		$sql = "SELECT * FROM Answer WHERE AnswerID = '". $AnswerId ."';";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			/*
			 * Finde den richtige User zur Antwort
			*/
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			$myAnswer =  new Answer($row[0],
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
							);
		}
		mysqli_free_result($result);
		mysqli_free_result($result2);
		mysqli_close($db);
		return $myAnswer;
	}
	

	
	public function loadAnswersByText($text) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		/*
		 * Gib alle Antworten zurück
		 */
		$sql = "SELECT * FROM Answer WHERE Answer like '%". $text ."%';";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			/*
			 * Finde den richtige User zur Antwort
			 */
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0], 
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
							)
					);
		}
		mysqli_free_result($result);
		//mysqli_free_result($result2);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadAnswerByQuestion($question) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		
		/*
		 * Gib alle Antworten zu einer Frage zurück
		 */
		$sql = "SELECT a.* FROM Answer a, QuestionAnswer qa WHERE a.AnswerID=qa.Answer and qa.Question='". $question ."';";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0], 
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
							)
					);
		}
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadAllAnswers() {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
	
		/*
		 * Gib alle Antworten zurück (Antwort hat Question-Collection, Question hat Category-Collection)
		*/
		$sql = "SELECT * FROM ANSWER;";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->answers,
					new Answer($row[0],
							$row[1],
							$row[2],
							new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
							)
			);
		}
		mysqli_free_result($result2);
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->answers;
	}
	
	public function loadRelatedAnswers(Answer $answer) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		
		/*
		 * Gib alle Related Antworten zurück
		*/
		$sql = "SELECT a.* FROM ANSWER a WHERE a.AnswerID IN (SELECT ra.relanswer FROM relatedAnswer ra WHERE ra.Answer='".$answer->getAnswerId()."';";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Unknown Database Error!');
			$userRow = mysqli_fetch_row($result2);
			$myAnswer = new Answer($row[0],
					$row[1],
					$row[2],
					new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6])
					);
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
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "INSERT INTO RelatedAnswer VALUES (".$answer->getAnswerID().",".$relAnswer->getAnswerID().",'".$description."');";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		mysqli_free_result($result);
		mysqli_close($db);
	}
}

?>