<form name="questionForm" id="questionForm" method="post" action="askQuestion.php">
<?php
session_start();
if ( isset($_SESSION['username']) ) { 
	echo($_SESSION['username']);
	?>
	
	<label name="question" value="question">Deine Frage: </label>	
	<textarea id="question" name="question"></textarea>
	
<?php } else { ?>
	<label name="name" value="name">Name: </label>
	<input id="name" name="name" type="text"/>
	<label name="email" value="email">eMail: </label>
	<input id="eMail" name="eMail" type="text"/>
	<label name="question" value="question">Deine Frage: </label>
	<textarea id="question" name="question"></textarea>
	
<?php }
?>
</form>