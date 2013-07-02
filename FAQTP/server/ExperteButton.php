<?php
if(isset($_SESSION['userRole']) && $_SESSION['userRole']=='Admin') {
	echo("<script type=\"text/javascript\" src=\"../client/js/AnswerQuestion.js\"></script><div><p></p></div><div><button class=\"btn btn-primary\" onclick=\"answerQuestion()\" type=\"button\">Answer Question</button></div>");
}
?>