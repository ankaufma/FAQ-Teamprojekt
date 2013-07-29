<?php
session_start();
if(!isset($_SESSION["angemeldet"])){
	$_SESSION['angemeldet']= false;
	$_SESSION['test'] = $_SESSION['angemeldet'];
}

if($_SESSION['angemeldet'] == 0){

	echo("<div class=\"span4\" align=\"center\">
			<table frame=\"void\" border=\"1\">
			<tr align=\"center\">
			<td width=\"60px\">

			<!-- Calling Modal for Login and Registration -->");

	include('LoginAndRegist.php');

	echo("
			</td>
					
			<td width=\"60px\">
			<script type=\"text/javascript\" src=\"../client/js/CreateContactMessage.js\"></script>
			
			<!-- ---------------------------------------------------- -->
			<!-- 					Contact Modal					  -->
			<!-- ---------------------------------------------------- -->
				<a href=\"#contactModal\" role=\"button\" class=\" btn-link headerLinks\" data-toggle=\"modal\">Contact</a>
					<!-- Modal -->
				
						<div id=\"contactModal\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
							<div class=\"modal-header\">
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">x</button>
								<h3 id=\"myModalLabel\">Contact us</h3>
								</div>
								<div class=\"modal-body\">
									<p>Write message...</p>
								<form name = \"ContactFormular\" action = \"\">
									<textarea name=\"textfeld\" class=\"span10\" rows=\"8\" placeholder=\"Please enter your message\"></textarea>
									</div>
									<div class=\"modal-footer\">
									<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
									<button class=\"btn btn-primary\" onClick=\"sendFormular()\">Send</button>
								</form>
							</div>
						</div>
					
				</div>
			</td>
			
			<td width=\"60px\">
			<a href=\"#\" id=\"aboutPopover\"
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
			<li><a href=\"#\"><i class=\"icon-comment\"></i>English</a></li>
			</ul>
			</div>
			</div>
			</div>
			");

}else{

	echo("
			<div class=\"span4\" align=\"center\">
			<table frame=\"void\" border=\"1\">
			<tr align=\"center\">
			<td width=\"60px\">

			<a href=\"../server/logout.php\" class=\"headerLinks btn-Links\">Logout</a>
			


			</td>

			
			
			<td width=\"60px\">
			
			<script type=\"text/javascript\" src=\"../client/js/CreateContactMessage.js\"></script>
			
			
			
			<!-- ---------------------------------------------------- -->
			<!-- Contact Modal -->
			<!-- ---------------------------------------------------- -->
				<a href=\"#contactModal2\" role=\"button\" class=\"btn-link headerLinks\" data-toggle=\"modal\">Contact</a>
					<!-- Modal -->
				
						<div id=\"contactModal2\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
							<div class=\"modal-header\">
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">x</button>
								<h3 id=\"myModalLabel2\">Contact us</h3>
								</div>
								<div class=\"modal-body\">
									<p>Write message...</p>
								<textarea name=\"textfeld\" class=\"span10\" rows=\"8\" placeholder=\"Please enter your message\"></textarea>
								</div>
								<div class=\"modal-footer\">
								<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
								<button class=\"btn btn-primary\" onClick=\"sendFormular()\">Send</button>
							</div>
						</div>
					
				</div>
			</td>
			
			
			<td width=\"60px\"><a href=\"#\" id=\"aboutPopover\"
			class=\" headerLinks btn-links\" rel=\"popover\" data-placement=\"bottom\"
			data-html=\"true\" data-content=\"<strong> FAQ Manager</strong> <br/>
			No Rights Reserved!!!\" data-original-title=\"About\">About</a></td>
			</tr>
			</table>

			<div>
			<label>User: <strong>".$_SESSION['username']."</strong></label>
			</div>
			<div>
			<label>Role: <strong>".$_SESSION['userRole']."</strong></label>
			</div>
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

			
			
			
			
			");
}
?>
