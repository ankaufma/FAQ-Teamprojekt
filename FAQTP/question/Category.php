<?php
class Category
{
	private $catID;
	private $descriptionOfCategory;
	private $preCategory;

	public function __construct($catID, $descriptionOfCategory, $preCategory) {
		$this->catID=$catID;
		$this->descriptionOfCategory = $descriptionOfCategory;
		$this->preCategory = $preCategory;

	}

	public function setCatID($catID) {
		$this->catID = $catID;
	}

	public function setDescriptionOfCategory($descriptionOfCategory) {
		$this->descriptionOfCategory = $descriptionOfCategory;
	}

	public function setpreCategory($preCategory) {
		$this->preCategory = $preCategory;
	}

	public function getCatID() {
		return $this ->catID;
	}

	public function getDescriptionOfCategory() {
		return $this->descriptionOfCategory;
	}

	public function getPreCategory() {
		return $this->preCategory;
	}



	#private $categories = Array();

	public function loadAllCategories(){

	$db = mysqli_connect('localhost', 'root', '', 'tpfaq');
			$sql = "SELECT * FROM CATEGORY";
			$result = mysqli_query($db, $sql) or die ('Fucking Nightmare!');

			while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			#nur die namen werden ausgelesen und in den array reingeschrieben
				array_push($this->categoriess,$row[1]);
			}

			mysqli_free_result($result);
			mysqli_close($db);

			return $this->users;



	}


	}

?>