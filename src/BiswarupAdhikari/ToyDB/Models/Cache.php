<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
use BiswarupAdhikari\ToyDB\Models\FileSystem;
class Cache extends Model
{
	public function store($key,$data)
	{
		$filesystem=new FileSystem;
		$cacheFile=$this->config->cacheDir.'/'.$key.'.json';
		$filesystem->writeContent($cacheFile,json_encode($data));
	}
	public function clear($key)
	{
		$filesystem=new FileSystem;
		$cacheFile=$this->config->cacheDir.'/'.$key.'.json';
		$filesystem->deleteFile($cacheFile);

	}
	public function get($key)
	{
		$filesystem=new FileSystem;
		$cacheFile=$this->config->cacheDir.'/'.$key.'.json';
		if(!file_exists($cacheFile)){
			return false;
		}
		$data=$filesystem->readContent($cacheFile);
		return json_decode($data);
	}
}