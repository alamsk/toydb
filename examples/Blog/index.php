<?php
require_once __DIR__ . '/config.php';
$db->select->orderBy('id','desc');
$db->select->limit(0,10);
$posts=$db->select->all('posts');
?>
<ul>
	<?php foreach($posts as $p){ ?>
	<li>
		<h1><?php echo $p->id;?>. <a href="details.php?id=<?php echo $p->id;?>"><?php echo $p->title;?></a></h1>
		<p><?php echo $p->content;?></p>
	</li>
	<?php } ?>

</ul>
<a href="create.php">Create New POST</a>