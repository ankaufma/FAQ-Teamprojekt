<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>FAQ-System</title>
    <script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="../client/js/buildTree.js"></script>
	<script type="text/javascript" src="../client/js/bootstrap.js"></script>
    <script type="text/javascript" src="../client/js/findQuestionsAnswers.js"></script>
    <script tpye="text/javascript" src="../client/js/bootstrap-tooltip.js"></script>
	<script>  
		$(function ()  
			{ $("#example").popover();  
		});  
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
						<td width = "60px"><a class ="headerLinks" href="Login.php">Login</a></td>
						<td width = "60px"><a class="headerLinks" href="">Contact</a><a href="#" id="example" class="btn btn-danger" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a></td>
						
						<td width = "60px"><a class="headerLinks" href=$('#example').popover(options)>About</a></td>
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
			<!-- 				NavigationTree
			<!-- ============================================================================ -->
  			<div class="accordion navAccordeon" id="accordion2">
  				<div class="accordion-group">
    				<div class="accordion-heading">
     					<a class="accordion-toggle navAccordLink" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">hide /show Navigation Tree
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
						<div class="span9 contResultList">
							<h2 class="headersContainers">Result List</h2>
							<p> Questions related to Banane</p>
							
							
							<?php 
								include('/../server/ResultList.php');
							?>							
							
							
							<div class = "row-fluid">
								<div class = "span12">
									<!-- bsp. QUESTTION -->
									<div class = "row-fluid">
										<div class = "span8 question">
											<p class = "lead">Warum ist die Banane krumm und so komisch gelb?</p>
										</div>
										<div class = "span2 offset1">
											$('#star').raty();
											<div id="star"></div>
										
										</div>
										
										<!-- bsp. ANSWER -->
										<div class ="row-fluid">
											<div class = "span8 answer offset1">
												<p class = "answerFont">Weil sie keiner gerade gebogen hat! So eine dumme frage hab ich selten gehört! Geht ja gar nicht und das wird hier auch ncoh gepostet! Traurig!</p>
											</div>
										</div>
									</div>
									
								</div>
							
							
							
							</div>
							
							
						</div>
							
						<!-- ============================================================================ -->
						<!-- 				"Ask New Question"
						<!-- ============================================================================ -->
						<div class="span3 contAskNewQuestion" align="center">
							<h2 class="headersContainers">Ask New Question</h2>
							<div class="textNewQuestion">
								<p class = "text-center">We are deligthed to give you answers related to questions related to software development</p>
							</div>
							<button class = "btn btn-danger"" type = "button">Ask New Question</button>
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
				<a href = "http://www.google.de">Further Information</a>				
			</div>
		</div>
	</body>



</html>
