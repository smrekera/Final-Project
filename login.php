<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Login</title>
<link rel=stylesheet href="style.css" type="text/css" />
</head>
<body>
<div class="box">
<form method='post' action='login.php'>
<table id='tbl' align='center'>
	<tr><td></td><td><h2>Login Page</h2></td></tr>
	<tr><td>Username </td><td><input type='text' name='username'></td></tr>
	<tr><td>Password </td><td><input type='password' name='password'></td></tr>
	<tr><td><input type='submit' name='login' value='Login'></td>
</form>
<form method='post' action='Register.php'>
	<td><strong>Not Registered? Click -></strong><input type='submit' name='gotoReg' value='Register'></td></tr>
</form>
<?php
	include_once('connect.php');
	
	if(isset($_POST['login'])) {
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$_SESSION['username']=$username;
		
		$query = $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
		if(mysqli_num_rows($query)>0){
			echo "<script>window.open('movies.php','_self')</script>";
		}
		else{
			echo "Username or password is incorrect";
			}
	}
?>
</div>
</table>
</body>
</html>

