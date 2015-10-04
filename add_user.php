<?php	
	$host = "localhost";
	$user = "useme";
	$pass = "useme123";
	$database = "useme";
	
	$con = mysql_connect($host, $user, $pass) or die("Cannot connect Database");
	mysql_select_db($database) or die("Cannot select Database.");
	
	$unum = $_POST["unum"];
	$uname = $_POST["uname"];

	
	$sql = "INSERT INTO users(unum, uname) VALUES('$unum', '$uname')";
	$result = mysql_query($sql, $con);
	if(!$result){
		die ('Error: '.mysql_error($con));
	}
	
	mysql_close($con);

?>