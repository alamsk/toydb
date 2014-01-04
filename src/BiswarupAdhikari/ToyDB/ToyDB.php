<?php
namespace BiswarupAdhikari\ToyDB;
use BiswarupAdhikari\ToyDB\Models\DataBase;
class ToyDB
{

	function __construct($username,$password){
		
		$this->database=new DataBase($username,$password);
	}
}