<!DOCTYPE html>
<html>
<head>
<title>FAQ-Manager</title>
<!-- Einbinden des Bootstrap-Stylesheets -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- optional: Einbinden der jQuery-Bibliothek -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script type="text/javascript">
	
	</script>

<!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
<script src="js/bootstrap.min.js"></script>




</head>
<body>


	<form class="form-horizontal" action="/../FAQTP/server/?????.php"
		method="post">

		<h1>FAQ-Manager</h1>

		
			<h2>Relate to category</h2>

			<div>
				<input id="RelateAnswer" type="text"
					onkeyup="findCategory(this.value)">
			</div>

			<div>
				<select id="RelateCategory" name="AnswerSelect" size=5
					style="width: 300px">
				</select>
			</div>
		


		<button class="btn btn-link btn-small" type="submit"">Submit</button>

	</form>






</body>
</html>

