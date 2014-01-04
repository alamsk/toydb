<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../vendor/' . '/autoload.php';
use BiswarupAdhikari\ToyDB\ToyDB;
$db=new ToyDB("root",123456);
echo "<h1>My DB</h1>";
$db->database->selectDB("akash");
// $row=array(
// 	"username"=>"biswarup",
// 	"password"=>"123456",
// 	"block"=>2
// );
// $db->database->save('users',$row);
// $row=array(
// 	"username"=>"alam",
// 	"password"=>"95142",
// 	"block"=>3
// );
// $db->database->save('users',$row);
// $row=array(
// 	"username"=>"samir",
// 	"password"=>"654321",
// 	"block"=>0
// );
// $db->database->save('users',$row);
$rows=$db->database->select->all('users');
echo '<pre>';
print_r($rows);
echo '</pre>';
echo '<hr>';
$db->database->select->where("`username`=='samir' || `username`=='alam'");
$rows=$db->database->select->byId('users','*',array(1,3));
echo '<pre>';
print_r($rows);
echo '</pre>';