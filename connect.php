<?php
ini_set('display_error', 'On');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "smrekera-db", "xosLsX3Z5Ij6KXLA", "smrekera-db");
if($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" .$mysqli->connect_errno. ")" .$mysqli->connect_error;
	}
	else{
	echo "connected";
	}
?>