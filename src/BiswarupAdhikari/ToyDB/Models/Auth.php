<?php
namespace BiswarupAdhikari\ToyDB\Models;
use BiswarupAdhikari\ToyDB\Models\Model;
class Auth extends Model
{
	public function validate($username,$password)
	{
		if($username==$this->config->username && $this->config->password){
			return true;
		}else{
			return false;
		}
	}
}