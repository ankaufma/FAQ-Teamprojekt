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


	}

?>