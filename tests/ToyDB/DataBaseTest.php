<?php
use BiswarupAdhikari\ToyDB\ToyDB;
use BiswarupAdhikari\ToyDB\Models\DataBase;
use BiswarupAdhikari\ToyDB\Config\Config;
class DataBaseTest extends PHPUnit_Framework_TestCase
{
	protected function setup()
	{
		$config=new Config();
		$username=$config->username;
		$password=$config->password;
		$dbName="testdb";
		$db=new DataBase($username,$password);
		$db->drop($dbName);
		$db->drop('testdb2');

	}
	public function testCreateDataBase()
	{		
		$config=new Config();
		$username=$config->username;
		$password=$config->password;
		$db=new DataBase($username,$password);
		$dbName="testdb";
		$db->create($dbName);
		$this->assertTrue(file_exists($config->dbPath.'/'.$dbName),"Create DataBase Test");
		$this->assertEquals($db->dbName,$dbName,"DataBase Setting Up Tests");

	}
	/**
	 * Check Database is Setting in Constructor or Not
	 * @return [type] [description]
	 */
	public function testDefaultDataBase()
	{
		$config=new Config();
		$username=$config->username;
		$password=$config->password;
		$dbName="testdb";
		$db=new DataBase($username,$password,$dbName);
		$db->selectDB('testdb2');
		$this->assertEquals($db->dbName,'testdb2',"Default DB in Constructir");

	}
	/**
	 * Test Change DataBase
	 * @return [type] [description]
	 */
	public function testChangeDataBase()
	{
		$config=new Config();
		$username=$config->username;
		$password=$config->password;
		$dbName="testdb";
		$db=new DataBase($username,$password,$dbName);
		$this->assertEquals($db->dbName,$dbName,"Default DB in Constructir");
	}
	/**
	 * Drop Delete DataBase Test
	 * @return [type] [description]
	 */
	public function testDropDataBase()
	{
		$config=new Config();
		$username=$config->username;
		$password=$config->password;
		$db=new DataBase($username,$password);
		$dbName="testdb";
		$db->create($dbName);
		$db->drop($dbName);
		$this->assertFalse(file_exists($config->dbPath.'/'.$dbName),"Drop DataBase Test");
		$this->assertNull($db->dbName);
	}
}