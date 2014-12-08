<?php
session_start();

if(!$_SESSION['username']){
header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>User Home</title>
<style type="text/css">
body{
	background-color: #E0E0E0;
}
.box{
	background: #FFFFFF;
	width: 500px;
	height: 261px;
	float: right;
	right: -300px;

}
.ww{
		background: #FFFFFF;
		
}
h1{
	color: #003333;
}
</style>
</head>
<body>


<p>Welcome: <font color='red'>
<?php echo $_SESSION['username'];?>
</font>
<form method='post' action='logout.php'>
	<input type='submit' name='logout' value='Logout'>
</form>
</p>
<h1 align='center'>Movie Review Database</h1>
<form method='post' action='movies.php'>
<table id='tbl' align='center'>
	<tr><td></td><td><h2 align='center'>Movie Review Entry</h2></td></tr>
	<tr><td>Movie Title</td><td><input type='text' name='movie'></td></tr>
	<tr><td>Genre </td><td><input type='text' name='genre'></td></tr>
	<tr><td>Review</td><td><textarea width='50px'></textarea>
	<tr><td>Do You Recommend (Yes/NO)</td><td><input type='text' name='rate'></td></tr>
	<tr><td><input type='submit' name='submit' value='Submit'></td>
</table>
</form>
<div class="ww">
<?php
include_once('connect.php');

	if(isset($_POST['submit'])){
		 $movie = $_POST['movie'];
		 $genre = $_POST['genre'];
		 $review = $_POST['review'];
		 $recommend = $_POST['recommend'];
		

		
		if($movie=='' || $genre=='' || $recommend = ''){
			echo 'Please enter all fields';
			exit();
		}
		
		$sql = $mysqli->prepare("INSERT INTO movie (title, genre, review, recommend) VALUES ('$movie', '$genre', '$review', '$recommend')");
		$sql->bind_param("ssss", $movie, $genre, $review, $recommend);
			$sql->execute();
			$sql->close();
		}
			if($query = $mysqli->query ("SELECT * FROM movie ORDER by id")){
		
		
		
				echo "<h2>Movie Rating List</h2>";
		
				echo "<table border='1' cellpadding='10'>";
				
				echo"<tr><th>Movie Title</th><th>Genre</th><th>Review</th><th>Recommend</th></tr>";
				
				while ($row = $query->fetch_object()){	
					echo "<tr>";
					echo "<td>" . $row->title . "</td>";
					echo "<td>" . $row->genre . "</td>";
					echo "<td>" . $row->review . "</td>";
					echo "<td>" . $row->recommend . "</td>";
					echo "</tr>";
				}
					echo "</table>";
		
			}
			else{
			echo "No results";
			}

?>
</div>
</body>
</html>
