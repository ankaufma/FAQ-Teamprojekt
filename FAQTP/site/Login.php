<!DOCTYPE html>
<head>
<title>FAQ-Manager</title>
<!-- Einbinden des Bootstrap-Stylesheets -->
<link rel="stylesheet" href="../client/css/bootstrap.min.css">

<!-- optional: Einbinden der jQuery-Bibliothek -->
<script type="text/javascript"
	src="../client/js/jquery-2.0.0.min></script>
 
    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script 
	<script type="text/javascript" src="..client/js/jquery.raty.min.js"></script>
	<script type="text/javascript" src="..client/js/ratyFunctions.js"></script>
	
</head>
<body>
	<div class="row-fluid">
		<div class="span4"></div>
		<div class="span4">
			<h3>
				Bitte einloggen
				<h3>
		
		</div>
		<div class="span4"></div>
	</div>
	<div class="row-fluid">
		<div class="span12"></div>
	</div>
	<div class="row-fluid">
		<div class="span12"></div>
	</div>
	<div class="row-fluid">
		<div class="span4"></div>
		<div class="span4">
			<form class="form-horizontal"
				action="/../FAQTP/server/SessionBasedUserLogin.php" method="post">
				<div class="control-group">
					<label class="control-label" for="inputEmail">Username</label>
					<div class="controls">
						<input type="text" id="inputEmail" placeholder="Username"
							name="username">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Password</label>
					<div class="controls">
						<input type="password" id="inputPassword" placeholder="Passwort"
							name="passwort">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label>
							<button class="btn btn-link btn-small" type="button"
								onclick="window.location.replace('Register.php')">register</button>
						</label>
						<button class="btn btn-success btn-small" type="submit">login</button>
						<button class="btn btn-danger btn-small" type="button">cancel</button>
					</div>
				</div>
			</form>
		</div>
		<div class="span4">
			<?php
			session_start();
			foreach($_SESSION as $sessionWert){
				print_r($sessionWert);
}?>
		</div>
	</div>
	  <div id="container">
          <div class="demo">
            <div id="default-demo"></div>
          </div>
		  <div id="score-demo"></div>
  </div>
</body>
</html>
