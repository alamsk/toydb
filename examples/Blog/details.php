<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__ . '/../../vendor/' . '/autoload.php';
use BiswarupAdhikari\PJD\PJD;
$db=new PJD("root",123456);
$db->database->selectDB('blog');
$id=intval($_GET['id']);
$post=$db->database->select->byId('posts','*',$id);
?>
<ul>
	<li>
		<h1><?php echo $post->title;?></h1>
		<p><?php echo $post->content;?></p>
	</li>
</ul>
<a href="create.php">Create New POST</a> || 
<a href="index.php">View All Posts</a>