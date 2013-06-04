<?php
class ShowCategoriesDTO {
	private $category;
	private $categoryname;
	
	public function __construct ($category, $categoryname) {
		$this->category = $category;
		$this->categoryname = $categoryname;
	}
	
	public function setCategory ($category) {
		$this->category = $category;
	}
	
	public function setCategoryName ($categoryname) {
		$this->categoryname = $categoryname;
	}
	
	public function getCategory () {
		return $this->category;
	}
	
	public function getCategoryName () {
		return $this->categoryname;
	}
}
?>