
<html>
<body>

<?php
$servername = "localhost";
$username = "useme";
$password = "useme123";
$dbname = "useme";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM product ";

$result = $conn->query($sql);
$i=0;
$positions = array(array(),array());

if ($result->num_rows > 0) {
    
     while($row = $result->fetch_assoc()) {

	
	
	$positions[0][$i] = $row["plat"];
	$positions[1][$i] = $row["plong"];	
     	$i++;
	
	}

} else {
     echo "0 results";
}


	for($i=0;$i<$result->num_rows;$i++) {
	
	
	echo $positions[0][$i] ."&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $positions[1][$i] ."</br>";


}








$conn->close();






?>  

</body>
</html>