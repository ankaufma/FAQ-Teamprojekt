<h2>Kategorien zuordnen</h2>

<select class="span6" name="Cats" size="10" multiple>
<?php
	$fassi = new Fascade();
	foreach($fassi->showAllCategories() AS $cats) {
		echo("<option value=\"".$cats->getCategory()."\">".$cats->getCategoryName()."</option>");
	}
?>
</select>