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
    <script tpye="text/javascript" src="../client/js/AdminAnswer.js"></script>
	<script>  
		$(function ()  
			{ $("#example").popover();  
		});  
	</script>  

	<link rel="stylesheet" href="../client/css/bootstrap.min.css">
	<link rel="stylesheet" href="../client/css/HomeCSS.css">

</head>
<form id="AdminAnswer" name="AdminAnswer" method="post" action="/../server/XXXX.php">
<?php
include('/../server/ThisQuestion.php');
include('/../server/MainAnswer.php');
include('/../server/ChooseAvailableAnswer.php');
include('/../server/selectAllKategories.php');
?>
<div>
	<button type="submit" value="Antworten">Antworten</button>
</div>
</form>