<?php
require_once __DIR__ . '/config.php';
if(isset($_POST['register'])){
	$user=array();
	$user['name']=$_POST['name'];
	$user['username']=$_POST['username'];
	$user['email']=$_POST['email'];
	$user['password']=sha1($_POST['password']);
	$db->save('users',$user);
	header("LOCATION:login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Registration Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	 <div class="container">
	 	<ul class="nav navbar-nav navbar-right">
            <?php 
            if(isset($_SESSION['loggedId'])){
            	?>

            

            <li><a href="logout.php">Logout</a></li>
            	<?php
            }else{
            	?>

            <li><a href="login.php">Login</a></li>
            	<?php
            }
            ?>
          </ul>
	<h1>User Registration Page</h1>
	<form action="register.php" method="POST">
		<ul>
			<li>
				<label for="name">Full Name</label>
				<input type="text" name="name">
			</li>
			<li>
				<label for="username">Username</label>
				<input type="text" name="username">
			</li>
			<li>
				<label for="email">E-mail</label>
				<input type="text" name="email">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password">
			</li>
			<li>
				<input type="submit" value="Register" name="register">
			</li>
		</ul>
		<a href="login.php">Login</a>
	</form>
</div>
</body>
</html>