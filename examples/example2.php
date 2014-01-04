<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../vendor/' . '/autoload.php';
use BiswarupAdhikari\ToyDB\ToyDB;
$db=new ToyDB("root",123456);
echo "<h1>My DB</h1>";
$db->database->selectDB("akash");
// for($i=0;$i<25;$i++){
// 	$product=array(
// 		"name"=>"Product ".$i,
// 		"price"=>3.75 *$i
// 	);
// 	$db->database->save('items',$product);
// }
$rows=$db->database->select->all('items');
echo '<pre>';
print_r($rows);