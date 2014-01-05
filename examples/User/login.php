<?php
require_once __DIR__ . '/config.php';
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=sha1($_POST['password']);
	$rows=$db->select('*')
	->from('users')
	->where("`username`=='$username' && `password`=='$password'")
	->get();
	if(count($rows)==1){
		$_SESSION['loggedId']=$rows[0]->id;
		header("LOCATION:myaccount.php");
	}else{
		header("LOCATION:login.php");
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Login Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	 <div class="container">
	 	<ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="register.php">Create New User</a></li>
            <li><a href="myaccount.php">Dashboard</a></li>
          </ul>
	<h1>User Login Page</h1>
	<form action="login.php" method="POST">
		<ul>
			<li>
				<label for="username">Username</label>
				<input type="text" name="username">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password">
			</li>
			<li>
				<input type="submit" value="Login" name="login">
			</li>
		</ul>
		<a href="register.php">Register</a>
	</form>
</div>
</body>
</html>