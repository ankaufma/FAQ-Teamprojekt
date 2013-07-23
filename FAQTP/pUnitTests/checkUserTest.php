<?php
require_once('/../business/fascade/fascade.php');

//100% BranchCoverage UserCheck
class CheckUserTest extends PHPUnit_Framework_TestCase {
	
	function testUserTrue() {
		$fassi = new Fascade();
		$this->assertTrue($fassi->checkUser('ankaufma', 'Test'));
	}
	
	function testUserFalsePassword() {
		$fassi = new Fascade();
		$this->assertFalse($fassi->checkUser('ankaufma', 'Tes'));
	}
	
	function testUserFalseName() {
		$fassi = new Fascade();
		$this->assertFalse($fassi->checkUser('anka', 'Test'));
	}
	
	function testUserCompleteFalse() {
		$fassi = new Fascade();
		$this->assertFalse($fassi->checkUser('anka', '1234'));
	}

}
?>