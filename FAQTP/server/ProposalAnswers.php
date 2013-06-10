<?php
	include('/../business/fascade/fascade.php');
#	$proposal = Array();
#	$fassi = new Fascade();
#	foreach($fassi->showAllAnswers() AS $proposals) {
#		array_push($proposal,$proposals->getAnswer());
#	}
	
//	$what = "what";
//	array_push($proposal,$what);
	
//	echo json_encode($proposal);


 

include('/../business/fascade/fascade.php');
	$category = Array();
	$fassi = new Fascade();
	foreach($fassi->showRootCats() AS $myCats) {
		array_push($category,$myCats->getCategoryName(), $myCats->getCategory());
	}
	echo json_encode($category);
?>
