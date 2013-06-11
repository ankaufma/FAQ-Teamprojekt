<!DOCTYPE html>
<html>
  <head>
    <title>FAQ-Manager</title>
  

    <!-- Einbinden des Bootstrap-Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    <!-- optional: Einbinden der jQuery-Bibliothek -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 
    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script src="js/bootstrap.min.js"></script>
	
	

	
  </head>
  <body>
    <h1>FAQ-Manager</h1>

	<div class="row-fluid">
	
		
	<div class="span4">
		
		<form  class="form-horizontal" action="AW2.php" method="post">
			
			
		
			<select id="select" name="auswahl_frage" size=5 >
				<?php
			
					include('..\server\QuestionNoAnswer.php');
					
				?> 
			
			
			</select>
			
		  	
			
		 <button type="submit"  class="btn">Submit</button>
		</form>
			

	</div>
	<div class="span4"></div>
	</div>
</body>
</html>