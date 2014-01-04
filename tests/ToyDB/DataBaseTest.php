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
		$database=new DataBase($username,$password);
		$database->drop($dbName);
		$database->drop('testdb2');

	}
	public function testCreateDataBase()
	{		
		$config=new Config();
		$username=$config->username;
		$password=$config->password;
		$database=new DataBase($username,$password);
		$dbName="testdb";
		$database->create($dbName);
		$this->assertTrue(file_exists($config->dbPath.'/'.$dbName),"Create DataBase Test");
		$this->assertEquals($database->dbName,$dbName,"DataBase Setting Up Tests");

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
		$database=new DataBase($username,$password,$dbName);
		$database->selectDB('testdb2');
		$this->assertEquals($database->dbName,'testdb2',"Default DB in Constructir");

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
		$database=new DataBase($username,$password,$dbName);
		$this->assertEquals($database->dbName,$dbName,"Default DB in Constructir");
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
		$database=new DataBase($username,$password);
		$dbName="testdb";
		$database->create($dbName);
		$database->drop($dbName);
		$this->assertFalse(file_exists($config->dbPath.'/'.$dbName),"Drop DataBase Test");
		$this->assertNull($database->dbName);
	}
}