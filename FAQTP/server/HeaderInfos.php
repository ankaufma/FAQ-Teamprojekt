<?php

session_start();

	echo($_SESSION['angemeldet']);

// if($_SESSION['angemeldet']== 1) {

// 	echo("
	<div class=\"span4\" align=\"center\">
			<table frame=\"void\" border=\"1\">
				<tr align=\"center\">
					<td width=\"60px\">
				
					<!-- Calling Modal for Login and Registration -->
					\<\?php  
							include('/../server/LoginAndRegist.php');
					\?\>	
					</td>
	
					<td width=\"60px\"><a class=\"headerLinks btn-links\" href=\"\">Contact</a>
					</td>
					<td width=\"60px\"><a href=\"#\" id=\"aboutPopover\"
						class=\"headerLinks btn-links\" rel=\"popover\" data-placement=\"bottom\"
						data-html=\"true\" data-content=\"<strong> FAQ Manager</strong> <br/>
							No Rights Reserved!!!\" data-original-title=\"About\">About</a></td>
				</tr>
			</table>
	
			<!-- Language Selection -->
			<div class=\"btn-group languageBtn\">
				<a class=\"btn dropdown-toggle btn-success btn-mini\"
					data-toggle=\"dropdown\" href=\"#\"><i class=\"icon-globe\"></i>Language<span
					class=\"caret\"></span> </a>
				<ul class=\"dropdown-menu\">
					<li><a href=\"#\"><i class=\"icon-comment\"></i>Deutsch</a></li>
					<li><a href=\"#\"><i class=\"icon-comment\"></i>English</a></li>
				</ul>
			</div>
		</div>
	</div>
// 			");
// 	}
	
// 	else {
		
// 		echo("
// 			<div class=\"span4\" align=\"center\">
// 				<table frame=\"void\" border=\"1\">
// 					<tr align=\"center\">
// 						<td width=\"60px\">
					
// 						<a class=\"headerLinks btn-Links\">Logout</a>".$_SESSION['angemeldet']=false." ".location.reload()."
				

// 						</td>
		
// 						<td width=\"60px\"><a class=\"headerLinks btn-links\" href=\"\">Contact</a>
// 						</td>
// 						<td width=\"60px\"><a href=\"#\" id=\"aboutPopover\"
// 							class=\"headerLinks btn-links\" rel=\"popover\" data-placement=\"bottom\"
// 							data-html=\"true\" data-content=\"<strong> FAQ Manager</strong> <br/>
// 							No Rights Reserved!!!\" data-original-title=\"About\">About</a></td>
// 					</tr>
// 				</table>
		
// 				<!-- Language Selection -->
// 				<div class=\"btn-group languageBtn\">
// 					<a class=\"btn dropdown-toggle btn-success btn-mini\"
// 						data-toggle=\"dropdown\" href=\"#\"><i class=\"icon-globe\"></i>Language<span
// 						class=\"caret\"></span> </a>
// 					<ul class=\"dropdown-menu\">
// 						<li><a href=\"#\"><i class=\"icon-comment\"></i>Deutsch</a></li>
// 						<li><a href=\"#\"><i class=\"icon-comment\"></i>English</a></li>
// 					</ul>
// 				</div>
// 			</div>
// 		</div>
		
// 		");
		
// 	}

?>
