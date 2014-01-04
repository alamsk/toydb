<?php
namespace BiswarupAdhikari\ToyDB\Config;
class Config
{
	function __construct(){
		$this->dbPath=__DIR__.'/../databases';
	}
	public $username="root";
	public $password="123456";
}