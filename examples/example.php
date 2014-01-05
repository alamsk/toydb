<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__ . '/../vendor/' . '/autoload.php';
use BiswarupAdhikari\ToyDB\DataBase;
use BiswarupAdhikari\ToyDB\Models\Benchmark;
$bm=new Benchmark;
$bm->start();
$faker = Faker\Factory::create();
$db=new DataBase("root",123456);
$db->selectDB('blog');
// for($i=1;$i<5000;$i++){
// 	$user=array(
// 		"fname"=>$faker->name,
// 		"email"=>$faker->email
// 	);
// 	$db->save('mydata',$user);
// }


// $data='['.$db->selectAll('users2').']';

echo '<pre>';
// $db->select->limit=0;
// $db->select->orderBy="id desc";
// $db->select->where("`id`==1 || `id`==3");
// $rows=$db->select->all('posts','*');
$rows=$db->select('id,title')->from('posts')
			->where('`id`>2')
			->limit(1,2)
			->orderBy('title DESC')
			->get();
print_r($rows);
echo '</pre>';
$bm->stop();
$bm->results();
// echo'<hr>';
// echo '<pre>';
// $db->select->limit=0;
// $db->select->orderBy="id DESC";
// print_r($db->select->byId('users2','id,fname,email',array(122,182,162,192,125,1255,3569)));
// echo '</pre>';
// echo'<hr>';
// echo '<pre>';
// $db->select->start=6;
// $db->select->limit=10;
// print_r($db->select->byId('users2','fname,id,email',array(122,182,162,192,125,1255,3569)));
// echo '</pre>';

