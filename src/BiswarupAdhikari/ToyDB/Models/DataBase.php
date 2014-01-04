<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
use BiswarupAdhikari\ToyDB\Models\FileSystem;
use BiswarupAdhikari\ToyDB\Models\Auth;
use BiswarupAdhikari\ToyDB\Models\SaveData;
use BiswarupAdhikari\ToyDB\Models\Select;
class DataBase extends Model
{
	public $dbName=null;
	public $tblName=null;
	function __construct($username,$password,$dbName=null){
		parent::__construct();
		$auth=new Auth();
		if($auth->validate($username,$password)){
			$this->display( "Login Success");
		}else{
			$this->display( "Login Failed");		
		}
		if(isset($dbName)){
			$this->dbName=$dbname;
		}
		$this->select=new Select($this->dbName);
	}
	public function selectDB($dbname){
		$this->dbName=$dbname;
		if(!file_exists($this->config->dbPath.'/'.$this->dbName)){
			$this->create($this->dbName);
		}
		$this->select->dbName=$this->dbName;
	}
	public function create($dbName=null)
	{
		if(isset($dbName)){
			$this->dbName=$dbName;
			$this->select->dbName=$this->dbName;
		}		
		$this->createDBFolder();
	}
	private function createDBFolder()
	{
		$filesystem=new FileSystem();
		$filesystem->mkdir($this->config->dbPath.'/'.$this->dbName);			
		$this->display($this->dbName." Database Created");
	}

	public function save($tblName,$obj){
		$this->tblName=$tblName;
		new SaveData($this->dbName,$this->tblName,$obj);
	}

	public function update($tblName,$id,$obj){

	}

	public function delete($tblName,$id){

	}

}