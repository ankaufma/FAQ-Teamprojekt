<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FAQ-Manager | Answer Question</title>
<script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script


<script type="text/javascript" src="../client/js/bootstrap.js"></script>
<script tpye="text/javascript" src="../client/js/AdminAnswer.js"></script>

<link rel="stylesheet" href="../client/css/bootstrap.min.css">
	<link rel="stylesheet" href="../client/css/ExpertPages.css">

</head>
<body>


	<!-- ============================================================================ -->
	<!-- 									Header
		<!-- ============================================================================ -->

	<?php 
	include('..\server\Header.php');
	?>

	<!-- ============================================================================ -->
	<!-- 									Content
		<!-- ============================================================================ -->
	<div class="row-fluid">
		<div class="span12">
			<h2 class="textForSelect">Answer Selected Question:</h2>
			<form id="AdminAnswer" name="AdminAnswer" method="post"
				action="/../server/StoreAnswer.php">

				<div class="row-fluid">
					<div class="row-fluid">
						<div class="span1"></div>


						<div class="span4 rowQuestAsk">
							<?php
							include('/../server/ThisQuestion.php');
							?>
						</div>
						<div class="span6 rowQuestAsk">
							<?php 
							include('/../server/MainAnswer.php');
							?>
						</div>
						<div class="span1"></div>
					</div>
				</div>


				<div class="row-fluid">
					<div class="span5"></div>
					<div class="span4 answerAndRelated">
						<?php 
						include('/../server/ChooseAvailableAnswer.php');
						?>
					</div>
					<div class="span2"></div>
				</div>

				<div class="row-fluid">
					<div class="span5"></div>
					<div class="span4 answerAndRelated">
						<?php 
						include('/../server/selectAllKategories.php');
						?>
					</div>
					<div class="span1"></div>
				</div>
		
		</div>






		</form>
	</div>
	</div>







	<div>
		<button type="submit" value="Antworten">Antworten</button>
	</div>






	<!-- ============================================================================ -->
	<!-- 									FOOTER
		<!-- ============================================================================ -->
	<?php 
	include('/../server/Footer.php');
	?>

</body>
</html>


