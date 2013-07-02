<html>
<head>
	<title>FAQ-Manager</title>
	<meta http-equiv="refresh" content="1; URL= ../site/index.php">

	<script type="text/javascript" src="../client/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../client/js/jquery-2.0.0.min.js"></script>
	<script type="text/javascript" src="../client/js/bootstrap.js"></script>
	<script type="text/javascript" src="../client/js/jquery.raty.min.js"></script>
	
	<link rel="stylesheet" href="../client/css/bootstrap.min.css"></link>
	
	
</head>
<body>
	
	<div class="alert">
 		<button type="button" class="close" data-dismiss="alert" onClick="window.location.replace(../site/index.php)">&times;</button>
  		<strong>Your Question was sent!</strong>An expert will answer you soon.
	</div>
</body>
</html>

<?php
include('/../business/fascade/fascade.php');
$fassi = new Fascade();
session_start();
$fassi->applyQuestion($_POST['question'],$_POST['veroeffentlichung'],$_SESSION['username']);

?>
