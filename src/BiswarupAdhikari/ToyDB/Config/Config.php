<?php
namespace BiswarupAdhikari\ToyDB\Config;
class Config
{
	function __construct(){
		$this->dbPath=__DIR__.'/../databases';
		$this->cacheDir=__DIR__.'/../Cache';
	}
	public $username="root";
	public $password="123456";
}