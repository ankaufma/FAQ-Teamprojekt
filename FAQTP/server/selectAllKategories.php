<h2>Assign category</h2>

<select class="span6"  size="10" name="Cats[]" id="Cats" multiple>
<?php
	$fassi = new Fascade();
	foreach($fassi->showAllCategories() AS $cats) {
		echo("<option value=\"".$cats->getCategory()."\">".$cats->getCategoryName()."</option>");
	}
?>
</select>