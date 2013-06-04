<?php
class CategoryManager {
	private $categories = Array();
	
	public function loadCategoryByCatId ($catId) {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM Category WHERE PRECATEGORY=".$catId.";";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->categories, new Category($row[0],$row[1],$row[2]));
		}
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->categories;
	}
	
	public function loadAllCategories () {
		$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM Category";
		$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->categories, new Category($row[0],$row[1],$row[2]));
		}
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->categories;
	}
}
?>