<?php
use BiswarupAdhikari\ToyDB\ToyDB;
use BiswarupAdhikari\ToyDB\Models\SaveData;
class SaveDataTest extends PHPUnit_Framework_TestCase
{
	
	public function testInsertData()
	{
		
		$sd=new SaveData('testdb','mytable',array());
		$this->assertEquals("Test","Test");
	}

	public function testAutoIncrementID()
	{
		$db=new ToyDB("root",123456);
		$db->database->drop('testdb');		
		$db->database->selectDB("testdb");
		for($i=0;$i<5;$i++){
			$user=array(
				"name"=>"User Name ".$i,
				"username"=>"username".$i,
				"password"=>sha1(microtime())
			);
			$db->database->save('users',$user);
		}
		$this->assertEquals($i,$db->database->autoId('users'));
		$db->database->drop('testdb');
	}
}