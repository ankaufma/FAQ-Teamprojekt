<label>W�hle Kategorie/en</label>
<select name="Cats" size="10" multiple>
<?php
	$fassi = new Fascade();
	foreach($fassi->showAllCategories() AS $cats) {
		echo("<option id=\"".$cats->getCategory()."\">".$cats->getCategoryName()."</option>");
	}
?>
</select>