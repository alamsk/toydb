<?php
namespace BiswarupAdhikari\ToyDB\Config;
class Config
{
	function __construct(){
		$this->dbPath=__DIR__.'/../Storage/Databases';
		$this->cacheDir=__DIR__.'/../Storage/cache';
	}
	public $username="root";
	public $password="123456";
}