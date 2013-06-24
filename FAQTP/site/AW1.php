<!DOCTYPE html>
<html>
  <head>
    <title>FAQ-Manager | Select Question</title>
  
	<script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="../client/js/buildTree.js"></script>
	<script type="text/javascript" src="../client/js/askQuestion.js"></script>
	<script type="text/javascript" src="../client/js/bootstrap.js"></script>
	<script type="text/javascript" src="../client/js/findQuestionsAnswers.js"></script>
	<script tpye="text/javascript" src="../client/js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="../client/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="../client/js/jquery.raty.min.js"></script>
	<script type="text/javascript" src="../client/js/ratyFunctions.js"></script>
	<script type="text/javascript" src="../client/js/indexFunctions.js"></script>
	<script type="text/javascript" src="../client/js/PostComment.js"></script>
	<script type="text/javascript" src="../client/js/bootstrap-modal.js"></script>

	
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
			<div class="span12 ">
				<div class="row">
					<div class="span4"></div>	
						<div class="span4">
							<p class="lead textForSelect">Select Question to answer</p>
						</div>
					<div class="span4"></div>	
				</div>
			</div>
					
					
					
				<div class ="span4"></div>
				<div class="span4">
					
					<form  class="form-horizontal" action="AdminAnswer.php" method="post">
						<div class="row">
							<div class="span8">
															
								<select size="20" class="selectQuestion input-xxlarge  id="select" name="auswahl_frage" multiple="multiple">
									<?php
										include('..\server\QuestionNoAnswer.php');	
									?>
								</select>
								
							</div>
						</div>
						<div class="span12"> </div>	
						<div class="row">
							<div class ="span8">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>	
					</form>
					
				</div>
		
				<div class ="span4"></div>
			</div>
		
		</div>
		<!-- ============================================================================ -->
		<!-- 									FOOTER
		<!-- ============================================================================ -->
		<?php 
			include('/../server/Footer.php');
		?>
		
	</body>
</html>
	