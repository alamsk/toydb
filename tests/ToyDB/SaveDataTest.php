<?php
use BiswarupAdhikari\ToyDB\ToyDB;
use BiswarupAdhikari\ToyDB\Models\SaveData;
class SaveDataTest extends PHPUnit_Framework_TestCase
{
	protected function setup()
	{
		$this->db=new ToyDB("root",123456);		
		$this->db->database->selectDB("testdb");
	}
	public function testInsertData()
	{
		
		$sd=new SaveData('testdb','mytable',array());
		$this->assertEquals("Test","Test");
	}

	public function testAutoIncrementID()
	{
		
	}

	protected function tearDown()
	{
		$this->db->database->drop('testdb');
	}
}