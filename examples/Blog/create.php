<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__ . '/../../vendor/' . '/autoload.php';
use BiswarupAdhikari\PJD\PJD;
if(isset($_POST['create_post'])){
$db=new PJD("root",123456);
$db->database->selectDB('blog');
$post=array();
$post['title']=$_POST['title'];
$post['content']=$_POST['content'];
$db->database->save('posts',$post);
header("LOCATION:index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Post</title>
</head>
<body>
	<form action="create.php" method="POST">
		<ul>
			<li>
				<label for="title">Title</label>
				<input type="text" name="title">
			</li>
			<li>
				<label for="title">Content</label>
				<textarea name="content" id="" cols="30" rows="10"></textarea>
			</li>
			<li>
				<input type="submit" value="Save" name="create_post">
			</li>
		</ul>
	</form>
</body>
</html>