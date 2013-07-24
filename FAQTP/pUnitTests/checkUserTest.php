<?php
require_once('/../business/fascade/fascade.php');
//100% BranchCoverage UserCheck
class CheckUserTest extends PHPUnit_Framework_TestCase {
	
	function testUserTrue() {
		$sut = new Fascade();
		$this->assertTrue($sut->checkUser('ankaufma', 'Test'));
	}
	
	function testUserFalsePassword() {
		$sut = new Fascade();
		$this->assertFalse($sut->checkUser('ankaufma', 'Tes'));
	}
	
	function testUserFalseName() {
		$sut = new Fascade();
		$this->assertFalse($sut->checkUser('anka', 'Test'));
	}
	
	function testUserCompleteFalse() {
		$sut = new Fascade();
		$this->assertFalse($sut->checkUser('anka', '1234'));
	}

}
?>