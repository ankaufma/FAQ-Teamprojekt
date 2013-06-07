<!DOCTYPE html>
  <head>
    <title>FAQ-Manager</title>
    <!-- Einbinden des Bootstrap-Stylesheets -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
 
    <!-- optional: Einbinden der jQuery-Bibliothek -->
    <script type="text/javascript" src="../js/jquery-2.0.0.min></script>
 
    <!-- optional: Einbinden der Bootstrap-JavaScript-Plugins -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/buildTree.js"></script>
  </head>
  <body>
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4"><h3>Bitte einloggen<h3></div>
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
				<form class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input type="text" id="inputEmail" placeholder="Email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Password</label>
						<div class="controls">
							<input type="password" id="inputPassword" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label>
								<button class="btn btn-link btn-small" type="button" onclick="window.location.replace('Register.php')">register</button>
							</label>
							<button class="btn btn-success btn-small" type="button">login</button>
							<button class="btn btn-danger btn-small" type="button">cancel</button>
						</div>
					</div>
				</form>
			</div>
			<div class="span4"></div>
		</div>
  </body>
</html>