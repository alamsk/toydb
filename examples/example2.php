<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../vendor/' . '/autoload.php';
use BiswarupAdhikari\ToyDB\DataBase;
use BiswarupAdhikari\ToyDB\Models\Benchmark;
$bm=new Benchmark;
$bm->start();
$db=new DataBase("root",123456);
echo "<h1>My DB</h1>";
$db->selectDB("akash");
// $faker = Faker\Factory::create();
// for($i=0;$i<25000;$i++)
// {
// 	$row=array(
// 		"name"=>$faker->name,
// 		"username"=>$faker->username,
// 		"email"=>$faker->email
// 	);
// 	$db->database->save('users',$row);
// }
$db->select->cache('200250');
$db->select->where("`id`==200 || `id`==250");
$rows=$db->select->all('users');
echo '<pre>';
print_r($rows);
echo '</pre>';
$bm->stop();
$bm->start();
echo '<hr>';
$db->select->clear();
$db->select->limit(0,6);
$db->select->cache('zero-to-6');
$rows=$db->select->all('users','id,name');
echo '<pre>';
print_r($rows);
echo '</pre>';
$bm->stop();
$bm->results();	
// $db->database->select->where("`username`=='samir' || `username`=='alam'");
// $rows=$db->database->select->byId('users','*',array(1,3));
// echo '<pre>';
// print_r($rows);
// echo '</pre>';