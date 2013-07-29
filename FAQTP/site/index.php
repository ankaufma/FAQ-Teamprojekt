<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
	xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>FAQ-Manager | Home</title>
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


<link rel="stylesheet" href="../client/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="../client/css/HomeCSS.css"></link>
<link rel="stylesheet" href="../client/css/ExpertPages.css"></link>



</head>
<body>
	<!-- ============================================================================ -->
	<!-- 									Header
	<!-- ============================================================================ -->
	<?php 
	  	include('../server/Header.php');
	?>

	<!-- ============================================================================ -->
	<!-- 									Content
	<!-- ============================================================================ -->
	<div class="row-fluid">
		<div class="span12 content">
	
			<!-- ============================================================================ -->
			<!-- 							NavigationTree
			<!-- ============================================================================ -->
			<div class="accordion navAccordeon" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					
						<a class="accordion-toggle navAccordLink btn-link"
							data-toggle="collapse" data-parent="#accordion2"
							href="#collapseOne" onClick="NavTreeShowHide()">
							<p id="NavTreeHideShow">Hide Navigation Tree</p>
						</a>
					
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
						<div class="accordion-inner">
							<?php 
								include('/../server/tree.php');
							?>
						</div>
					</div>
				</div>
			</div>
	
			<div class="container-fluid">
				<!-- ============================================================================ -->
				<!-- 								"Search Bar"
				<!-- ============================================================================ -->
	
				<input id="search" name="search" type="text" list="searchResults"
					class="input-medium search-query input-xxlarge"
					onkeyup="findQuestion(this.value)" placeholder="Search"> 
					<datalist id="searchResults" name="searchResults"></datalist>
					<button class="btn btn-success"
						onclick="loadQuestionsByText(search.value)">Search</button>
					<div class="row-fluid">
						<!-- ============================================================================ -->
						<!-- 								ResultList
						<!-- ============================================================================ -->
						<div id="QContainer" class="span9 contResultList">
							
						</div>
						<!-- ============================================================================ -->
						<!-- 				"Ask New Question"
						<!-- ============================================================================ -->
						<div class="span3 contAskNewQuestion" align="center">
							<h2 class="headersContainers">Ask New Question</h2>
							<div class="textNewQuestion">
								<p class="text-center">We are deligthed to give you answers
									related to questions related to software development</p>
							</div>
							<button class="btn btn-danger" " onclick="askQuestion()"
								type="button">Ask New Question</button>
								
								<?php 
									include('/../server/ExperteButton.php');
								?>
						</div>
					</div>
			
			</div>
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
