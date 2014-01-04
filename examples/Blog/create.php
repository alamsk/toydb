<?php
require_once __DIR__ . '/config.php';
if(isset($_POST['create_post'])){
	$post=array();
	$post['title']=$_POST['title'];
	$post['content']=$_POST['content'];
	$db->save('posts',$post);
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