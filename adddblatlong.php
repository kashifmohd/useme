<!DOCTYPE html>
<html>
<head>
<title>USE-ME</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css" />
<script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js">
</script>
</head>



<body>
     <section id="page1" data-role="page">
<div data-role="header" data-theme= "a"><h1>Status</h1></div>  

<?php

$lat=$_GET['lat'];
$long=$_GET['long'];
$type=$_GET['type'];
$servername = 'localhost';
$username = "useme";
$password = "useme123";
$dbname = "useme";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `product`(`plat`, `plong`, `pcat`) VALUES ($lat,$long,'$type')";

if (mysqli_query($conn, $sql)) {

   echo "<ul  data-role='listview'><li><h1>Bin added successfully</h1></li>
</ul>";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<div data-role="footer" data-theme="a"><h1></h1></div>
</section>



</body>
</html>