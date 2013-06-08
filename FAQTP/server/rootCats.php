<?php
	include('../fascade/fascade.php');
	$category = Array();;
	$fassi = new Fascade();
	foreach($fassi->showRootCats() AS $myCats) {
		array_push($category,$myCats->getCategoryName(), $myCats->getCategory());
	}
	echo json_encode($category);
?>