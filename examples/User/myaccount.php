<?php
require_once __DIR__ . '/config.php';
if(!isset($_SESSION['loggedId'])){
	header("Location:login.php");
}
$rows=$db->select('*')
	->from('users')
	->get();
?>
<html>
<head>
	<title>My Account</title>	
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="register.php">Create New User</a></li>
            <li><a href="myaccount.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
<h1>Users</h1>
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>#ID</th>
			<th>Name</th>
			<th>Username</th>
			<th>E-mail</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rows as $row){ ?>
		<tr>
			<td><?php echo $row->id;?></td>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->username;?></td>
			<td><?php echo $row->email;?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</body>
</html>