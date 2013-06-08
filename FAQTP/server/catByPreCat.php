<?php
	include('../fascade/fascade.php');
	$category = Array();
	$precat = $_POST['precat'];
	$fassi = new Fascade();
	foreach($fassi->showCatByPreCat($precat) AS $myCats) {
		array_push($category,$myCats->getCategoryName(), $myCats->getCategory());
	}
	echo json_encode($category);
?>