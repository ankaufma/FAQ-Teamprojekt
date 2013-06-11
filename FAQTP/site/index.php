<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>FAQ-System</title>
    <script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../client/js/buildTree.js"></script>
    <script type="text/javascript" src="../client/js/askQuestion.js"></script>
	<script type="text/javascript" src="../client/js/bootstrap.js"></script>
    <script type="text/javascript" src="../client/js/findQuestionsAnswers.js"></script>
    <script tpye="text/javascript" src="../client/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="../client/js/bootstrap-popover.js"></script>
    <script tpye="text/javascript" src="../client/js/jquery.raty.js"></script>

	<script>  
		$(function ()  
			{ $("#aboutPopover").popover();  
		});  
	</script>  
	<script>
		$('#star').raty();

	</script>

	<link rel="stylesheet" href="../client/css/bootstrap.min.css">
	<link rel="stylesheet" href="../client/css/HomeCSS.css">

</head>

		<!-- ============================================================================ -->
		<!-- 									Header
		<!-- ============================================================================ -->
		<div class = "row-fluid top-buffer">
			<div class ="span4"></div>
			
			<div class = "span4">
				<h1 class="headline">FAQ Manager</h1>
			</div>
			<!-- Header-Funktions-->
			<div class="span4" align="center">
				<table frame = "void" border = "1">
					<tr align = "center">
						<td width = "60px"><a class ="headerLinks btn-links" href="Login.php">Login</a></td>
						<td width = "60px"><a class="headerLinks btn-links" href="">Contact</a></td>
						<td width = "60px"><a href="#" id="aboutPopover" class="headerLinks btn-links" rel="popover" data-placement="bottom" data-html="true" data-content="<strong>FAQ Manager</strong> <br/> No Rights Reserved!!!" data-original-title="About">About</a></td>
					</tr>
				</table>
				
				<!-- Language Selection -->
				<div class="btn-group languageBtn">
  					<a class="btn dropdown-toggle btn-success btn-mini" data-toggle="dropdown" href="#"><i class="icon-globe"></i>Language<span class="caret"></span>
					</a>
 					<ul class="dropdown-menu">
    					<li><a href="#"><i class="icon-comment"></i>Deutsch</a></li>
						<li><a href="#"><i class="icon-comment"></i>English</a></li>
			 		</ul>
				</div>
		
			</div>
		</div>
		
		<!-- ============================================================================ -->
		<!-- 									Content
		<!-- ============================================================================ -->
		<div class = "row-fluid">
			<div class = "span12 content">
			
			<!-- ============================================================================ -->
			<!-- 							NavigationTree
			<!-- ============================================================================ -->
  			<div class="accordion navAccordeon" id="accordion2">
  				<div class="accordion-group">
    				<div class="accordion-heading">
     					<a class="accordion-toggle navAccordLink btn-link" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
     						hide /show Navigation Tree
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
				
						<input id="search" name="search" type="text" list="searchResults" class="input-medium search-query input-xxlarge" onkeyup="findQuestion(this.value)" placeholder="Search">
						<datalist id="searchResults" name="searchResults"></datalist>
						<button class="btn btn-success" onclick="loadQuestionsByText(search.value)">Search</button>
						<div class="row-fluid">
						<!-- ============================================================================ -->
						<!-- 								ResultList
						<!-- ============================================================================ -->
						
							<?php 
								include('/../server/ResultList.php');
							?>							
											
							
						<!-- ============================================================================ -->
						<!-- 				"Ask New Question"
						<!-- ============================================================================ -->
						<div class="span3 contAskNewQuestion" align="center">
							<h2 class="headersContainers">Ask New Question</h2>
							<div class="textNewQuestion">
								<p class = "text-center">We are deligthed to give you answers related to questions related to software development</p>
							</div>
							<button class = "btn btn-danger"" onclick="askQuestion()" type = "button">Ask New Question</button>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- ============================================================================ -->
		<!-- 									FOOTER
		<!-- ============================================================================ -->
		<div class = "row footer"  align = "center">
			<div class = "span12">
				<h3>FAQ Manager</h3>
				<p>Lovely programming by Andreas Kaufmann, Gian-Lucas Piras, Hasancan Cifci and Thomas Winter</p>
				<a href = "http://www.google.de">Further Information -> Google weiss alles</a>				
			</div>
		</div>
	</body>



</html>
