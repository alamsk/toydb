<?php
use BiswarupAdhikari\ToyDB\DataBase;
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
		$db=new DataBase("root",123456);
		$db->drop('testdb');		
		$db->selectDB("testdb");
		for($i=0;$i<5;$i++){
			$user=array(
				"name"=>"User Name ".$i,
				"username"=>"username".$i,
				"password"=>sha1(microtime())
			);
			$db->save('users',$user);
		}
		$this->assertEquals($i,$db->autoId('users'));
		$db->drop('testdb');
	}
}