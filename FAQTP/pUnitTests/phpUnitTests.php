<?php
require_once('/../business/fascade/fascade.php');

class PHPUnitTests extends PHPUnit_Framework_TestCase {
	
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
	
	function testUserByUsername() {
		$sut = new Fascade();
		$this->assertEquals($sut->userByUsername('ankaufma')->getUserId(),1);
	}
	
	function testTryToAplyExistingUsername() {
		$sut = new Fascade();
		$this->assertFalse($sut->applyUser('test', 'test', 'ankaufma', 'test', 'test'));
	}
	
	function testApplyNewUser() {
		$sut = new Fascade();
		$this->assertTrue($sut->applyUser('Christian', 'Johner', 'chjohner', 'johner@johner.org', 'chJ0hn3r'));
	}
	
	function testRatingCalculation() {
		$sut = new Fascade();
		$user = new User(5, "Mock", "Mock", "Mock", "Mock", "Mock", "Mock");
		$answer = new Answer(3, 'Test', 'Test', $user);
		$this->assertEquals($sut->showRatingByAnswer($answer),8);
		$sut->applyRating('Anonymous', 3, 2);
		$this->assertEquals($sut->showRatingByAnswer($answer),5);
	}
	
	function testQuestionById() {
		$sut = new Fascade();
		foreach($sut->showQuestionById(1) as $myQuestion) {
			$this->assertEquals($myQuestion->getQuestionId(), 1);
		}
	}
	
	function testQuestionByText() {
		$sut = new Fascade();
		foreach($sut->showQuestionByText('jetzt') as $myQs) {
			$this->assertEquals($myQs->getQuestionId(),2);
		}
	}

	
	function tearDown() {
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "DELETE FROM User Where UserName='chjohner'";
		$sql2 = "DELETE FROM Rating Where answer='3' and user='5' and Rating='2'";
		mysqli_query($db, $sql) or die ('DatabaseError!');
		mysqli_query($db, $sql2) or die ('DatabaseError!');
	}

}
?>