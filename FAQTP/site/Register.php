<!DOCTYPE html>
  <head>
    <title>FAQ-Manager</title>
    <!-- Einbinden des Bootstrap-Stylesheets -->
    <link rel="stylesheet" href="../client/css/bootstrap.min.css">
 
    <!-- optional: Einbinden der jQuery-Bibliothek -->
    <script type="text/javascript" src="../client/js/jquery-2.0.0.min></script>
 
    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../client/js/buildTree.js"></script>
  </head>
  <body>
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4"><h3>Bitte registrieren<h3></div>
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
				<form class="form-horizontal" action="/../FAQTP/server/RegisterOnServer.php" method="post">
					<div class="control-group">
						<label class="control-label" for="inputUserName">Benutzername</label>
						<div class="controls">
							<input name="user" type="text" id="inputUserName" placeholder="User">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputVorname">Vorname</label>
						<div class="controls">
							<input name="vorname" type="text" id="inputVorname" placeholder="Vorname">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputNachname">Nachname</label>
						<div class="controls">
							<input name="nachname" type="text" id="inputNachname" placeholder="Nachname">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input name="email"type="text" id="inputEmail" placeholder="Email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Password</label>
						<div class="controls">
							<input name="passwort" type="password" id="inputPassword" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Password wiederholen</label>
						<div class="controls">
							<input type="password" id="inputPassword" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-success btn-small" type="submit">register</button>
							<button class="btn btn-danger btn-small" type="button" onclick="window.location.replace('Login.php')">cancel</button>
						</div>
					</div>
				</form>
			</div>
			<div class="span4">
			<?php echo '$_SESSION["berechtigter_User"]'; ?>
			</div>
		</div>
  </body>
</html>