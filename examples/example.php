<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__ . '/../vendor/' . '/autoload.php';
use BiswarupAdhikari\PJD\PJD;
use BiswarupAdhikari\PJD\Models\Benchmark;
$bm=new Benchmark;
$bm->start();
$faker = Faker\Factory::create();
$db=new PJD("root",123456);
$db->database->selectDB('testdbg');
// for($i=1;$i<5000;$i++){
// 	$user=array(
// 		"fname"=>$faker->name,
// 		"email"=>$faker->email
// 	);
// 	$db->database->save('mydata',$user);
// }


// $data='['.$db->database->selectAll('users2').']';

echo '<pre>';
$db->database->select->limit=0;
$db->database->select->orderBy="id desc";
$rows=$db->database->select->all('mydata','*');
print_r($rows);
echo '</pre>';
$bm->stop();
$bm->results();
// echo'<hr>';
// echo '<pre>';
// $db->database->select->limit=0;
// $db->database->select->orderBy="id DESC";
// print_r($db->database->select->byId('users2','id,fname,email',array(122,182,162,192,125,1255,3569)));
// echo '</pre>';
// echo'<hr>';
// echo '<pre>';
// $db->database->select->start=6;
// $db->database->select->limit=10;
// print_r($db->database->select->byId('users2','fname,id,email',array(122,182,162,192,125,1255,3569)));
// echo '</pre>';

