<?php
include('Comment.php');
class CommentManager {
	private $comments = Array();
	
	public function createComment(Comment $comment){
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "INSERT INTO Comment (comment, user, answer) VALUES " .
				"('" . $comment->getComment() . "'" .
				", '" . $comment->getUser()->getUserId() ."'" .
				", '". $comment->getAnswer()->getAnswerId() ."');";
		
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		
		mysqli_close($db);
	}
	
	public function loadCommentsByAnswer(Answer $answer){
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql1 = "SELECT * FROM COMMENT WHERE Answer='". $answer->getAnswerId() ."';";
		$result1 = mysqli_query($db, $sql1) or die ('Fucking Nightmare!');
		
		while ($row = mysqli_fetch_array($result1)) {
			$sql2 = "SELECT * FROM USER WHERE UserId='". $row[3] ."';";
			$result2 = mysqli_query($db, $sql2) or die ('Fucking Nightmare!');
			$userRow = mysqli_fetch_row($result2);
			array_push($this->comments,new Comment($row[0],$row[1],$row[2],new User($userRow[0],$userRow[1],$userRow[2],$userRow[3],$userRow[4],$userRow[5],$userRow[6]),$answer));
		}
		mysqli_close($db);
		
		return $this->comments;
	}
}
?>