<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Register</title>
 <link rel=stylesheet href="style.css" type="text/css" />
</head>
<body>
<div class="box">
<div id="a"><?php echo $a; ?></div>
<form method='post' action='Register.php'>
<table id='tbl' align='center'>
	<tr><td></td><td><h2>Registration Page</h2></td></tr>
	<tr><td>Username </td><td><input type='text' name='username'></td></tr>
	<tr><td>Password </td><td><input type='password' name='password'></td></tr>
	<tr><td>First Name </td><td><input type='text' name='fname'></td></tr>
	<tr><td>Last Name </td><td><input type='text' name='lname'></td></tr>
	<tr><td><input type='submit' name='submit' value='Register'></td>
	</form>
	<form method='post' action='login.php'>
	<td><input type='submit' name='gotologin' value='Login'></td></tr>
</table>
</form>
<?php
include_once('connect.php');

	if(isset($_POST['submit'])){
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $fname = $_POST['fname'];
		 $lname = $_POST['lname'];
		
		if($username=='' || $password==''){
			echo 'Enter your username and/or password';
			exit();
		}
		$query = $mysqli->query ("SELECT * FROM users WHERE username='$username'");
		
		if(mysqli_num_rows($query)>0){
			echo 'This username is already in use.';
			exit();
		}
		
		$sql = $mysqli->prepare("INSERT INTO users (username, password, fname, lname) VALUES ('$username', '$password', '$fname', '$lname')");
		$sql->bind_param("ssss", $username, $password, $fname, $lname);
			$sql->execute();
			$sql->close();
			echo 'Registration Successful. Now Please Login';
		
	}

?>
</div>

</body>
</html>

