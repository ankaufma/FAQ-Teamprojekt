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


 
//re turn in JSON format
echo "{";
echo "item1: ", json_encode($item1), "\n";
echo "item2: ", json_encode($item2), "\n";
echo "item3: ", json_encode($item3), "\n";
echo "}";
?>
