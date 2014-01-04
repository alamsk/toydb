<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
class FileSystem extends Model
{
	public function mkdir($dir){
		if(is_dir($dir)){
			return true;
		}
		if(@mkdir($dir,0777,true)){
			return true;
		}else{
			return false;
		}
	}
	public function writeContent($file,$data){
		$fp = fopen($file, "w+");
		if (flock($fp, LOCK_EX)) {     
			fwrite($fp,$data);
			fflush($fp);            
			flock($fp, LOCK_UN);  
		} else {
			echo "Couldn't get the lock!";
		}
		fclose($fp);
	}

	public function appendContent($file,$data){
		$fp = fopen($file, "a+");
		if (flock($fp, LOCK_EX)) {    
			fwrite($fp,$data);
			fflush($fp);            
			flock($fp, LOCK_UN);  
		} else {
			echo "Couldn't get the lock!";
		}
		fclose($fp);
	}
	public function readContent($file)
	{
		$fp = fopen($file, "rb");

		if (flock($fp, LOCK_EX)) { 
			$contents = '';
			while (!feof($fp)) {
				$contents .= fread($fp, 8192);
			}
			fflush($fp);
			flock($fp, LOCK_UN);
		} else {
			echo "Couldn't get the lock!";
		}

		fclose($fp);
		return $contents;
	}
	public function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}
}