<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Config\Config;
class Model
{
	function __construct(){
		$this->config=new Config();
	}
	public function display($msg){
		//echo $msg."\n";
	}
	public function error($errorMsg){
		echo $errorMsg."\n";
		exit(1);
	}
}