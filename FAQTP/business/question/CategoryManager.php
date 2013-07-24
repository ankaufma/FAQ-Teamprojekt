<?php
class CategoryManager {
	private $categories = Array();
	
	public function loadCategoryByCatId ($catId) {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM Category WHERE PRECATEGORY=".$catId.";";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->categories, new Category($row[0],$row[1],$row[2]));
		}
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->categories;
	}
	
	public function loadAllCategories () {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM Category";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->categories, new Category($row[0],$row[1],$row[2]));
		}
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->categories;
	}
	
	public function loadRoots () {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT * FROM Category WHERE PreCategory IS NULL";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		while ($row = mysqli_fetch_array($result)) {
			array_push($this->categories, new Category($row[0],$row[1],$row[2]));
		}
		mysqli_free_result($result);
		mysqli_close($db);
		return $this->categories;
	}
}
?>