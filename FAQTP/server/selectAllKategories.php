<label>Wähle Kategorie/en</label>
<select name="Cats" size="10" multiple>
<?php
	include('/../business/fascade/fascade.php');
	$fassi = new Fascade();
	foreach($fassi->showAllCategories() AS $cats) {
		echo("<option id=\"".$cats->getCategory()."\">".$cats->getCategoryName()."</option>");
	}
?>
</select>