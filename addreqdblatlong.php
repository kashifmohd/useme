<!DOCTYPE html>
<html>
<head>
<title>USE-ME</title>   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js">
              </script>
              <!-- Include the jQuery Mobile library -->
              <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
              </script>

</head>
<body>
<section id="page1" data-role="page">       
<header data-role="header" data-theme="b"><h1>Requirement stated</h1></header>  
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

$sql = "INSERT INTO `required`(`rlat`, `rlong`, `rcat`) VALUES ($lat,$long,'$type')";

if (mysqli_query($conn, $sql)) {
      echo "<ul  data-role='listview'><li><h1>Bin added successfully</h1></li></ul>";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<footer data-role="footer" data-theme="b"><h1></h1></footer>
</section>

</body>
</html>