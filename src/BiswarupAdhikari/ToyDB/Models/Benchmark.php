<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
class Benchmark extends Model
{
	private $startTime;
	private $stopTime;
	private $results=array();
	public function start()
	{
		$this->startTime=microtime(true);
	}

	public function stop()
	{
		$this->stopTime=microtime(true);
		array_push($this->results,$this->stopTime - $this->startTime);
		$this->startTime=microtime(true);

	}
	public function results()
	{
		echo '<ul>';
		foreach($this->results as $result)
		{
			echo '<li>'.$result.'</li>';
		}
		echo '</ul>';
	}
}