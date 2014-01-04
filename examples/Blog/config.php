<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__ . '/../../vendor/' . '/autoload.php';
use BiswarupAdhikari\ToyDB\DataBase;
$db=new DataBase("root",123456);
$db->selectDB('blog');