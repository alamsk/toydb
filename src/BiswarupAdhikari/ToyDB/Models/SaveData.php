<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
use BiswarupAdhikari\ToyDB\Models\FileSystem;
class SaveData extends Model
{
	private $dbName;
	private $tblName;
	private $data;
	
	function __construct($dbName,$tblName,$data){		
		parent::__construct();
		$this->dbName=$dbName;
		$this->tblName=$tblName;
		$this->data=$data;
		$this->store();

	}

	private function store(){
		$filesystem=new FileSystem;
		$tablePath=$this->config->dbPath.'/'.$this->dbName.'/'.$this->tblName;
		if(!file_exists($tablePath)){
			$filesystem->mkdir($tablePath);
		}
		$data_exists=true;
		$tableStructurePath=$tablePath.'/structure.json';
		if(!file_exists($tableStructurePath)){			
			$arr=array();
			$arr['table']=$this->tblName;
			$arr['auto_id']=0;
			$filesystem->writeContent($tableStructurePath, json_encode($arr));
		}
		$tableDataPath=$tablePath.'/data.json';
		if(!file_exists($tableDataPath)){
			$data_exists=false;
		}
		$data=$filesystem->readContent($tableStructurePath);
		$tableStructure=json_decode($data);		
		$tableStructure->auto_id=intval($tableStructure->auto_id) + 1;
		$filesystem->writeContent($tableStructurePath, json_encode($tableStructure));
		$arr=array();
		$arr[$tableStructure->auto_id]=$this->data;
		if($data_exists){
			$tableData=','.json_encode($arr);
		}else{
			$tableData=json_encode($arr);
		}
		$filesystem->appendContent($tableDataPath,$tableData);
	}	
}