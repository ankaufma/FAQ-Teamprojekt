<?php
class DatabaseTest extends PHPUnit_Framework_TestCase{
	
	function testDatabaseConnection() {
		$sut = @new mysqli('127.0.0.1', 'root', '', 'tpfaq');
		if($sut->connect_error) {
			$this->assertTrue(false);
		} else  {
			$this->assertTrue(true);
		}
	}
	
	function testTestDataExisting() {
		$username='Test';
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sut = "SELECT Username FROM User Where UserID=1";
		$result = mysqli_query($db, $sut);
		while ($row = mysqli_fetch_array($result)) {
			$username = $row[0];
		}
		$this->assertEquals('ankaufma', $username);	
	}
}
?>