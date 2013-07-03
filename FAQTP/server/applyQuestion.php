<html>
<head>
<title>FAQ-Manager</title>

<script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="../client/js/bootstrap.js"></script>
<script type="text/javascript" src="../client/js/jquery.raty.min.js"></script>

<link rel="stylesheet" href="../client/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="../client/css/MessageBoxes.css"></link>
<link rel="stylesheet" href="../client/css/HomeCSS.css"></link>

</head>
<body>
	<div class="row-fluid top-buffer">
		<div class="span4"></div>

		<div class="span4">
			<h1 class="headline">FAQ Manager</h1>
		</div>
		<div class="span4"></div>
	</div>

	<div class="row-fluid">
		<div class="span12">

			<div class="row-fluid">
				<div class="span12 applyQuestionBox">
					<div class="row-fluid">
						<div class="span2"></div>

						<div class="span8 applyQuestionText">

							<p class="lead text-success">Your question was sent to the
								expert!</p>
							<p class="text-success text">When the expert has answered your
								question, you will get an email as reminder...</p>

						</div>
						<div class="span2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12 lastFooter"></div>
	</div>
</body>
</html>

<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
$fassi->applyQuestion($_POST['question'],$_POST['veroeffentlichung'],$_SESSION['username']);
header("Location: ../site/index.php");
?>
