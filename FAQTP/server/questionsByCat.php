
<?php
session_start();

include('/../business/fascade/fascade.php');
$cat = $_POST['cat'];
$multiple = null;
$fassi = new Fascade();

$btnIdAnswer = array();
$i = 0;

$btnIdComment = array();
$j = 0;

$divTargetComments = array();
$k = 0;

$ratings = array();
$r = 0;

$commentModals = array();
$c = 0;

$commentFormular = array();
$f = 0;



$username='Anonymous';
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}

if(isset($_SESSION['userRole'])) {
	$userrole = $_SESSION['userRole'];
}
else {
	$userrole = "NoAdmin";
}

echo("	<!-- RATING -->
		<script type=\"text/javascript\" src=\"../client/js/jquery.raty.min.js\"></script>
		
		
		<h2 class=\"headersContainers\">Result List</h2>
		<div class = \"row-fluid\">
		<div class =\"span12 qacContainer\">
		");

// 	<!-- ============================================================================ -->
// 	<!-- 							Question
// 	<!-- ============================================================================ -->
foreach($fassi->showQuestionsByCategory($cat) AS $myQs) {
	// Bug in SQL - get Questions in morge ChildCategories just one Time --> Same Like Distinct
	if($multiple == $myQs->getQuestionId()) {
		continue;
	}
	$multiple = $myQs->getQuestionId();

	
	// ===================================================
	// 				Publicity State = public
	// ===================================================
	// User ist nicht angemeldet und kann nur die Fragen sehen mit status "public"
	if($myQs->getQState() == "public") {
	
		$btnIdAnswer[] = "btnAnswerHideShow" . $i;
	
		echo("
				<!-- bsp. QUESTTION -->
				<div class = \"row-fluid questionObject\">
		
				<div class = \"span12 question\">
				<p class=\"questionFont\">".$myQs->getQuestion()."</p>
				</div>
		
				<div class = \"row-fluid questionFooter\">
				<div class=\" span2 offset1 \">
				<a id=\"".$btnIdAnswer[$i]."\" onClick=\"btnAnswerShowHide('$btnIdAnswer[$i]')\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"collapse\" data-target=\"#".$myQs->getQuestionId()."\">
				Show Answers
				</a>
				</div>
		
		
				<div class=\" span8\">
				<p class=\"questionFooterText\" id=\"autorDateQuestion\">(".$myQs->getUsername().", ".$myQs->getQDate().")</p>
				</div>
				</div>
		
				<!-- Container begin for answers-->
				<div id=".$myQs->getQuestionId()." class = \"row-fluid  collapse\">
				");
		$i++;
			
		// 	<!-- ============================================================================ -->
		// 	<!-- 						Answers
		// 	<!-- ============================================================================ -->
		foreach($myQs->getAnswers() as $myA) {
	
	
			$btnIdComment[] = "btnCommentHideShow" . $j;
	
			$divTargetComments[] = "divTargetComments" . $k;
	
			$ratings[] = "score-callback" . $r;
	
			$commentModals[] = "commentModal" . $c;
			$commentFormular[] = "commentFormular" . $f;
	
			echo("
					<!-- bsp. ANSWER -->
					<div id=\"answer\" class =\"row-fluid\">
					<div class = \"span10 answer\">
					<p class = \"answerFont\">".$myA->getAnswer()."</p>
					</div>
	
		
					<!-- -------------------------------------- -->
					<!-- 				Rating 					-->
					<!-- -------------------------------------- -->
					<script>
						$.fn.raty.defaults.path = '../client/img';
						$('#".$ratings[$r]."').raty({
	
	    	 				click: function(score, evt) {
	
								console.log(\"Answwer-ID: ".$myA->getAnswerId()."\");
								console.log(\"clicked Score: \" + score);
								console.log(\"Username: ".$username." \");
								$.ajax({
									async: 		true,
									type: 		\"POST\",
									url: 		\"../server/applyRaty.php\",
									data: 		{
												'answer' :	'".$myA->getAnswerId()."',
												'score':	score,
												'user':		'".$username."',
												},
									success: function() {
											console.log('Juhu');
									}
								});
		     				},
		       				 score: function() {
		        			 	return $(this).attr('data-score');
		       				 }
	
	     				 });
					</script>
		
					<div class = \"span1\">
						<div id=\"".$ratings[$r]."\" data-score=\"".$fassi->showRatingByAnswer($myA)."\"></div>
					</div>
		
	
	
					<div class = \"row-fluid questionFooter\">
					<div class=\"span3 offset1 \">
					<a id=".$btnIdComment[$j]." onClick=\"btnCommentsHideShow('$btnIdComment[$j]')\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"collapse\" data-target=\"#".$divTargetComments[$k]."\">
					Show Comments
					</a>
					</div>
					</div>
	
					</div>
					<!-- Container begin for comments-->
					<div id=\"".$divTargetComments[$k]."\" class =\"row-fluid collapse\">
	
					<div class =\"row-fluid\">
					<div class=\"span2 offset1\">
	
	
		
		
		
					<a href=\"#".$commentModals[$c]."\" role=\"button\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"modal\">Leave Comment</a>
	
					<!-- Modal -->
					<form name=\"$commentFormular[$f]\" method=\"post\" action=\"../server/postComment.php\">
	
					<div id=\"".$commentModals[$c]."\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
					<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
					<h3 id=\"myModalLabel\">Leave Comment</h3>
					</div>
					<div class=\"modal-body\">
					<p>Comment...</p>
					<textarea name=\"comment\" class=\"span10\" rows=\"8\" placeholder=\"Please enter your comment\"></textarea>
					<span hidden=\"true\">
						<input type=\"text\" id=\"answer\" name=\"answer\" value=\"".$myA->getAnswerId()."\"></input>
						<input type=\"text\" id=\"user\" name=\"user\" value=\"".$username."\"></input>
					</span>
					</div>
					<div class=\"modal-footer\">
					<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
					<button class=\"btn btn-primary\" type=\"submit\">Post</button>
					</div>
					</div>
					</form>
	
	
					</div>
					</div>
					");
					$k++;
					$j++;
					$r++;
					$c++;
					$f++;
	
					// 	<!-- ============================================================================ -->
					// 	<!-- 							Comments
					// 	<!-- ============================================================================ -->
					foreach($fassi->showCommentsByAnswer($myA) as $myC) {
	
	
						echo("
	
						<div class=\"comment in span8 offset1\">
						<p class=\"commentText\">  ".$myC->getComment()."</p>
						</div>
	
						<div class=\"span4 offset6 commentFooter\">
						<p class=\"commentFooterFont\" id=\"autorDateComment\">(".$myC->getUser()->getUsername().", ".$myC->getCDate().")</p>
								</div>
								");
					}
					echo("</div>");
	
		}
		echo("</div></div>");
	
		continue;
	}
	// Ende "Public"
		
	
	// ===================================================
	// 				Publicity State = users only
	// ===================================================
	// User ist angemeldet und kann die Fragen sehen mit status "public" und "users only"
	if ($_SESSION['angemeldet'] == "1" && $myQs->getQState() == "users only") {
	
		$btnIdAnswer[] = "btnAnswerHideShow" . $i;
		
		echo("
				<!-- bsp. QUESTTION -->
				<div class = \"row-fluid questionObject\">
			
				<div class = \"span12 question\">
				<p class=\"questionFont\">".$myQs->getQuestion()."</p>
				</div>
			
				<div class = \"row-fluid questionFooter\">
				<div class=\" span2 offset1 \">
				<a id=\"".$btnIdAnswer[$i]."\" onClick=\"btnAnswerShowHide('$btnIdAnswer[$i]')\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"collapse\" data-target=\"#".$myQs->getQuestionId()."\">
				Show Answers
				</a>
				</div>
			
			
				<div class=\" span8\">
				<p class=\"questionFooterText\" id=\"autorDateQuestion\">(".$myQs->getUsername().", ".$myQs->getQDate().")</p>
				</div>
				</div>
			
				<!-- Container begin for answers-->
				<div id=".$myQs->getQuestionId()." class = \"row-fluid  collapse\">
				");
		$i++;
			
		// 	<!-- ============================================================================ -->
		// 	<!-- 						Answers
		// 	<!-- ============================================================================ -->
		foreach($myQs->getAnswers() as $myA) {
	
	
			$btnIdComment[] = "btnCommentHideShow" . $j;
	
			$divTargetComments[] = "divTargetComments" . $k;
	
			$ratings[] = "score-callback" . $r;
	
			$commentModals[] = "commentModal" . $c;
			$commentFormular[] = "commentFormular" . $f;
				
			echo("
					<!-- bsp. ANSWER -->
					<div id=\"answer\" class =\"row-fluid\">
					<div class = \"span10 answer\">
					<p class = \"answerFont\">".$myA->getAnswer()."</p>
					</div>
	
			
					<!-- -------------------------------------- -->
					<!-- 				Rating 					-->
					<!-- -------------------------------------- -->
					<script>
						$.fn.raty.defaults.path = '../client/img';
						$('#".$ratings[$r]."').raty({
	
	    	 				click: function(score, evt) {
	
								console.log(\"Answwer-ID: ".$myA->getAnswerId()."\");
								console.log(\"clicked Score: \" + score);
								console.log(\"Username: ".$username." \");
								$.ajax({
									async: 		true,
									type: 		\"POST\",
									url: 		\"../server/applyRaty.php\",
									data: 		{
												'answer' :	'".$myA->getAnswerId()."',
												'score':	score,
												'user':		'".$username."',
												},
									success: function() {
											console.log('Juhu');
									}
								});
		     				},
		       				 score: function() {
		        			 	return $(this).attr('data-score');
		       				 }
	
	     				 });
					</script>
			
					<div class = \"span1\">
						<div id=\"".$ratings[$r]."\" data-score=\"".$fassi->showRatingByAnswer($myA)."\"></div>
					</div>
			
	
	
					<div class = \"row-fluid questionFooter\">
					<div class=\"span3 offset1 \">
					<a id=".$btnIdComment[$j]." onClick=\"btnCommentsHideShow('$btnIdComment[$j]')\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"collapse\" data-target=\"#".$divTargetComments[$k]."\">
					Show Comments
					</a>
					</div>
					</div>
	
					</div>
					<!-- Container begin for comments-->
					<div id=\"".$divTargetComments[$k]."\" class =\"row-fluid collapse\">
	
					<div class =\"row-fluid\">
					<div class=\"span2 offset1\">
	
	
			
			
			
					<a href=\"#".$commentModals[$c]."\" role=\"button\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"modal\">Leave Comment</a>
	
					<!-- Modal -->
					<form name=\"$commentFormular[$f]\" method=\"post\" action=\"../server/postComment.php\">
	
					<div id=\"".$commentModals[$c]."\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
					<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
					<h3 id=\"myModalLabel\">Leave Comment</h3>
					</div>
					<div class=\"modal-body\">
					<p>Comment...</p>
					<textarea name=\"comment\" class=\"span10\" rows=\"8\" placeholder=\"Please enter your comment\"></textarea>
					<span hidden=\"true\">
						<input type=\"text\" id=\"answer\" name=\"answer\" value=\"".$myA->getAnswerId()."\"></input>
						<input type=\"text\" id=\"user\" name=\"user\" value=\"".$username."\"></input>
					</span>
					</div>
					<div class=\"modal-footer\">
					<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
					<button class=\"btn btn-primary\" type=\"submit\">Post</button>
					</div>
					</div>
					</form>
	
	
					</div>
					</div>
					");
			$k++;
			$j++;
			$r++;
			$c++;
			$f++;
	
			// 	<!-- ============================================================================ -->
			// 	<!-- 							Comments
			// 	<!-- ============================================================================ -->
			foreach($fassi->showCommentsByAnswer($myA) as $myC) {
				
	
			echo("
	
			<div class=\"comment in span8 offset1\">
						<p class=\"commentText\">  ".$myC->getComment()."</p>
						</div>
	
			<div class=\"span4 offset6 commentFooter\">
						<p class=\"commentFooterFont\" id=\"autorDateComment\">(".$myC->getUser()->getUsername().", ".$myC->getCDate().")</p>
							</div>
							");
			}
			echo("</div>");
	
		}
		echo("</div></div>");
	
			// If Ende "users only"
			continue;
	}
	

	// ===================================================
	// 				Publicity State = private
	// ===================================================
	// User ist angemeldet und kann nur die Fragen sehen mit status "private" (= die eigenen Fragen) und "users only" und "public"
	if($_SESSION['angemeldet'] == "1" && $myQs->getUsername() == $_SESSION['username'] || $userrole == 'Admin') {
	
		$btnIdAnswer[] = "btnAnswerHideShow" . $i;
	
		echo("
				<!-- bsp. QUESTTION -->
				<div class = \"row-fluid questionObject\">
			
				<div class = \"span12 question\">
				<p class=\"questionFont\">".$myQs->getQuestion()."</p>
				</div>
			
				<div class = \"row-fluid questionFooter\">
				<div class=\" span2 offset1 \">
				<a id=\"".$btnIdAnswer[$i]."\" onClick=\"btnAnswerShowHide('$btnIdAnswer[$i]')\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"collapse\" data-target=\"#".$myQs->getQuestionId()."\">
				Show Answers
				</a>
				</div>
			
			
				<div class=\" span8\">
				<p class=\"questionFooterText\" id=\"autorDateQuestion\">(".$myQs->getUsername().", ".$myQs->getQDate().")</p>
				</div>
				</div>
			
				<!-- Container begin for answers-->
				<div id=".$myQs->getQuestionId()." class = \"row-fluid  collapse\">
				");
		$i++;
			
		// 	<!-- ============================================================================ -->
		// 	<!-- 						Answers
		// 	<!-- ============================================================================ -->
		foreach($myQs->getAnswers() as $myA) {
	
	
			$btnIdComment[] = "btnCommentHideShow" . $j;
	
			$divTargetComments[] = "divTargetComments" . $k;
	
			$ratings[] = "score-callback" . $r;
	
			$commentModals[] = "commentModal" . $c;
			$commentFormular[] = "commentFormular" . $f;
				
			echo("
					<!-- bsp. ANSWER -->
					<div id=\"answer\" class =\"row-fluid\">
					<div class = \"span10 answer\">
					<p class = \"answerFont\">".$myA->getAnswer()."</p>
					</div>
	
			
					<!-- -------------------------------------- -->
					<!-- 				Rating 					-->
					<!-- -------------------------------------- -->
					<script>
						$.fn.raty.defaults.path = '../client/img';
						$('#".$ratings[$r]."').raty({
	
	    	 				click: function(score, evt) {
	
								console.log(\"Answwer-ID: ".$myA->getAnswerId()."\");
								console.log(\"clicked Score: \" + score);
								console.log(\"Username: ".$username." \");
								$.ajax({
									async: 		true,
									type: 		\"POST\",
									url: 		\"../server/applyRaty.php\",
									data: 		{
												'answer' :	'".$myA->getAnswerId()."',
												'score':	score,
												'user':		'".$username."',
												},
									success: function() {
											console.log('Juhu');
									}
								});
		     				},
		       				 score: function() {
		        			 	return $(this).attr('data-score');
		       				 }
	
	     				 });
					</script>
			
					<div class = \"span1\">
						<div id=\"".$ratings[$r]."\" data-score=\"".$fassi->showRatingByAnswer($myA)."\"></div>
					</div>
			
	
	
					<div class = \"row-fluid questionFooter\">
					<div class=\"span3 offset1 \">
					<a id=".$btnIdComment[$j]." onClick=\"btnCommentsHideShow('$btnIdComment[$j]')\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"collapse\" data-target=\"#".$divTargetComments[$k]."\">
					Show Comments
					</a>
					</div>
					</div>
	
					</div>
					<!-- Container begin for comments-->
					<div id=\"".$divTargetComments[$k]."\" class =\"row-fluid collapse\">
	
					<div class =\"row-fluid\">
					<div class=\"span2 offset1\">
	
	
			
			
			
					<a href=\"#".$commentModals[$c]."\" role=\"button\" class=\"btn btn-link linksAnswerAndComment\" data-toggle=\"modal\">Leave Comment</a>
	
					<!-- Modal -->
					<form name=\"$commentFormular[$f]\" method=\"post\" action=\"../server/postComment.php\">
	
					<div id=\"".$commentModals[$c]."\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
					<div class=\"modal-header\">
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
					<h3 id=\"myModalLabel\">Leave Comment</h3>
					</div>
					<div class=\"modal-body\">
					<p>Comment...</p>
					<textarea name=\"comment\" class=\"span10\" rows=\"8\" placeholder=\"Please enter your comment\"></textarea>
					<span hidden=\"true\">
						<input type=\"text\" id=\"answer\" name=\"answer\" value=\"".$myA->getAnswerId()."\"></input>
						<input type=\"text\" id=\"user\" name=\"user\" value=\"".$username."\"></input>
					</span>
					</div>
					<div class=\"modal-footer\">
					<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
					<button class=\"btn btn-primary\" type=\"submit\">Post</button>
					</div>
					</div>
					</form>
	
	
					</div>
					</div>
					");
			$k++;
			$j++;
			$r++;
			$c++;
			$f++;
	
			// 	<!-- ============================================================================ -->
			// 	<!-- 							Comments
			// 	<!-- ============================================================================ -->
			foreach($fassi->showCommentsByAnswer($myA) as $myC) {
				
	
			echo("
	
			<div class=\"comment in span8 offset1\">
						<p class=\"commentText\">  ".$myC->getComment()."</p>
						</div>
	
			<div class=\"span4 offset6 commentFooter\">
						<p class=\"commentFooterFont\" id=\"autorDateComment\">(".$myC->getUser()->getUsername().", ".$myC->getCDate().")</p>
							</div>
							");
			}
			echo("</div>");
	
		}
		echo("</div></div>");
	
			// If Ende "private"
			continue;
	
	}
	
	else {
		// user is not authorisiezed to see this question
	}
}

echo("
		</div>
		</div>
		");

?>



