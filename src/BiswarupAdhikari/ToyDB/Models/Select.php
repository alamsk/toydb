<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
use BiswarupAdhikari\ToyDB\Models\FileSystem;
class Select extends Model
{
	public $dbName;
	private $tblName;
	private $data;
	public $limit=0;
	public $start=0;
	public $orderBy="id ASC";
	public $where=null;
	function __construct($dbName){		
		parent::__construct();
		$this->dbName=$dbName;

	}
	public function all($tblName,$fields='*',$condition=null){	
		$this->tblName=$tblName;
		$this->fields=$fields;

		$this->data=$this->readData();

		$this->filterData();

		$this->applyCondition();
		$this->sortResults();
		$this->applyLimitOffset();
		return $this->data;
	}

	public function byId($tblName,$fields='*',$ids){
		if(!is_array($ids)){
			$ids=array($ids);
		}
		$this->tblName=$tblName;
		$this->fields=$fields;

		$this->data=$this->readData();

		$this->filterData();
		$this->applyCondition();
		

		$rows=array();
		foreach($this->data as $d){
			if(in_array($d->id, $ids)){
				array_push($rows,$d);
			}
		}
		$this->data=$rows;
		$this->sortResults();
		$this->applyLimitOffset();
		if(count($ids)>1){
			return $this->data;
		}else{
			return $this->data[0];
		}		
	}
	public function readData(){
		$filesystem=new FileSystem();
		$tablePath=$this->config->dbPath.'/'.$this->dbName.'/'.$this->tblName;
		$tableDataPath=$tablePath.'/data.json';
		$data=$filesystem->readContent($tableDataPath);
		$data='['.$data.']';
		return json_decode($data,true);
	}
	public function filterData(){
		$rows=array();
		foreach($this->data as $d){
			$d=(ARRAY)$d;
			$key=array_keys($d)[0];
			$row=$d[$key];
			$row['id']=$key;
			if($this->fields!="*"){
				$tmprow=array();
				$fields=explode(',', $this->fields);				
				foreach($row as $key=>$val){
					if(in_array($key,$fields)){
						$tmprow[$key]=$val;
					}
				}
				$row=$tmprow;
			}
			array_push($rows,(object)$row);
		}
		$this->data=$rows;
	}

	public function applyCondition(){
		if(isset($this->where)){
			$pattern='#`(.*?)`#is';
			$rows=array();
			foreach($this->data as $d){
				$result=false;
				$row=(ARRAY)$d;
				$replacement='$row["$1"]';
				$condition='if('.preg_replace($pattern, $replacement, $this->where).'){ $result=true;}';
				eval($condition);				
				if((bool)$result){
					array_push($rows,(object)$row);
				}
			}
			$this->data=$rows;
		}
	}
	public function sortResults(){
		$tmp=explode(' ',$this->orderBy);
		$orderBy=$tmp[0];
		$direction=strtolower($tmp[1]);
		$rows=array();
		foreach($this->data as $d){
			$rows[$d->$orderBy]=$d;			
		}
		if($direction=="desc"){
			krsort($rows);
		}else{
			ksort($rows);
		}
		$sorted=array();
		foreach($rows as $row){
			array_push($sorted,$row);
		}
		$this->data=$sorted;
	}

	public function applyLimitOffset(){
		if($this->limit==0){
			return false;
		}
		$total=count($this->data);
		$tmp=$this->start;
		$rows=array();
		for($i=0;$i<$this->limit;$i++){
			if(isset($this->data[$tmp])){
				array_push($rows,$this->data[$tmp]);
			}
			$tmp++;
		}
		$this->data=$rows;
	}

	public function getResults(){
		return $this->data;
	}

	public function orderBy($or,$dir="asc"){
		$this->orderBy=$or.' '.$dir;
	}

	public function limit($start,$limit){
		$this->start=$start;
		$this->limit=$limit;
	}
	public function fields($fields){
		$this->fields=$fields;
	}
	public function where($where)
	{
		$this->where=$where;
	}
}